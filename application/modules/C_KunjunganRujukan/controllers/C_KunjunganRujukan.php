<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_KunjunganRujukan extends BaseController
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	/**
	 * [__construct description]
	 *
	 * @method __construct
	 */
	public function __construct()
	{
		// Load the constructer from MY_Controller
		parent::__construct();
		$this->load->model("Medical_Record", "MedicalRecord");
		$this->load->model("Obat", "Obat");
	}

	/**
	 * [index description]
	 *
	 * @method index
	 *
	 * @return [type] [description]
	 */
	public function index($id = null)
	{
		$data['titlePage'] = "List Of Data Rujukan";

		if ($id != null) {
			$data['row'] = $this->MedicalRecord->getKunjunganById($id);
			$data['edit'] = true;
			$data['id'] = $id;
		}

		$rujukanList = $this->db
			->select('tb_rujukan.*, tb_rujukan.id as rujukan_id, tb_pasien.*, tb_mst_diagnosa.diagnosa as nama_diagnosa ') // Pilih kolom yang diinginkan
			->from('tb_rujukan')
			->join('tb_pasien', 'tb_pasien.idx = tb_rujukan.pasien_id', 'LEFT') // Memperbaiki sintaks join
			->join('tb_mst_diagnosa', 'tb_rujukan.diagnosa_awal = tb_mst_diagnosa.id', 'LEFT') // Memperbaiki sintaks join
			->get()
			->result();


		// Ambil semua rujukan
		$data['listRujukan'] = $rujukanList;
		$data['listDiagnosa'] = $this->db->get('tb_mst_diagnosa')->result();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
		$data['listObat'] = $this->db->get('tb_obat')->result();

		$data['listPerawat'] = $this->db->get('tb_mst_perawat')->result();

		$data['listLayanan'] = $this->db->get('tb_layanan')->result();



		// $data['titlePage'] = "Medical Record";
		// $data['listObat'] = $this->Obat->getAll();
		// $data['listLayanan'] = $this->db->get('tb_layanan')->result();
		// $data['listKunjungan'] = $this->MedicalRecord->getAllKunjungan();
		// $data['listKamar'] = $this->db->get('tb_mst_kamar')->result();
		// $data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
		// $data['listMstDiagnosa'] = $this->db->get('tb_mst_diagnosa')->result();
		$data['listPasien'] = $this->db->get('tb_pasien')->result();

		// echo json_encode($data);
		// die;


		$this->layout('index', $data);
	}

	public function save()
	{
		try {
			$param = $this->input->post();

			$save = $this->db->insert('tb_rujukan', $param);

			if ($save) {
				echo $this->httpResponseCode("200", "Save data successfully");
			} else {
				echo $this->httpResponseCode("400", "Save data failed");
			}
		} catch (Exception $e) {
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	public function saveTriase()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();



			// Check if data already exists
			$this->db->where('rujukan_id', $param['rujukan_id']);
			$query = $this->db->get('tb_rujukan_triase');

			$data = [
				"cara_pasien_datang" => $param['cara_pasien_datang'],
				"keluhan_utama" => $param['keluhan_utama'],
				"trauma" => !empty($param['trauma']) ? implode(', ', $param['trauma']) : null,
				"waktu_pasien_datang" => $param['waktu_pasien_datang'],
				"riwayat_penyakit_sebelumnya" => $param['riwayat_penyakit_sebelumnya'],
			];

			if ($query->num_rows() > 0) {
				// Data exists, update it
				$this->db->where('rujukan_id', $param['rujukan_id']);
				$this->db->update('tb_rujukan_triase', $data);
				$triaseId = $query->row()->id;
			} else {
				// Data does not exist, insert new record
				$data['rujukan_id'] = $param["rujukan_id"];
				$this->db->insert('tb_rujukan_triase', $data);
				$triaseId = $this->db->insert_id();
			}


			$this->db->delete('tb_triase_det', ['triase_id' => $triaseId]);

			foreach ($param['type'] as $item) {

				if ($item == "AIRWAY") {
					$dataTriase = [
						"triase_id"        => $triaseId,
						"type"             => "AIRWAY",
						"hijau"           => $param['lbl_hijau_airway'],
						"kuning"          => $param['lbl_kuning_airway'],
						"merah"           => $param['lbl_merah_airway'],
						"hitam"           => $param['response_time_airway'],
						"bb"              => $param['bb_airway'],
					];

					$this->db->insert('tb_triase_det', $dataTriase);
				}


				if ($item == "Breathing") {
					$dataTriase = [
						"triase_id"        => $triaseId,
						"type"             => "Breathing",
						"hijau"           => $param['lbl_hijau_breathing'],
						"kuning"          => $param['lbl_kuning_breathing'],
						"merah"           => $param['lbl_merah_breathing'],
						"hitam"           => $param['response_time_breathing'],
						"td"           => $param['td_breathing'],
						"hr"           => $param['hr_breathing'],
						"rr"           => $param['rr_breathing'],
						"temo"           => $param['temo_breathing'],
					];
					$this->db->insert('tb_triase_det', $dataTriase);
				}


				if ($item == "Circulation") {
					$dataTriase = [
						"triase_id"        => $triaseId,
						"type"             => "Circulation",
						"hijau"           => $param['lbl_kuning_circulation'],
						"kuning"          => $param['lbl_kuning_circulation'],
						"merah"           => $param['lbl_merah_circulation'],
						"hitam"           => $param['response_time_circulation'],

						"imunisasi"           => $param['imunisasi_anak'],
						"riwayat_alergi"           => $param['riwayat_alergi'],
						"makanan"           => $param['makanan'],
						"obat"           => $param['obat'],
						"lainnya"           => $param['lainnya'],
					];
					$this->db->insert('tb_triase_det', $dataTriase);
				}
				if ($item == "Disability") {
					$dataTriase = [
						"triase_id"        => $triaseId,
						"type"             => "Disability",
						"hijau"           => $param['lbl_hijau_disability'],
						"kuning"          => $param['lbl_kuning_disability'],
						"merah"           => $param['lbl_merah_disability'],
					];
					$this->db->insert('tb_triase_det', $dataTriase);
				}
			}


			$this->db->delete('tb_triase_skrining', ['triase_id' => $triaseId]);

			$dataSkrining = [
				"triase_id"     => $triaseId,
				"nyeri" 		=> $param["nyeri"],
				"jenis" 		=> $param["jenis"],
				"lokasi_nyeri" 	=> $param["lokasi_nyeri"],
				"skor_nyeri" 	=> $param["skor_nyeri"]
			];

			$this->db->insert('tb_triase_skrining', $dataSkrining);


			$this->db->delete('tb_triase_resiko_jatuh', ['triase_id' => $triaseId]);

			$dataResikoJatuh = [
				"triase_id"     		=> $triaseId,
				"resiko_jatuh" 			=> $param["resiko_jatuh"],
				"diagnosa_sementara" 	=> $param["diagnosa_sementara"],
				"rencana_tindak_lanjut" => $param["rencana_tindak_lanjut"],
				"tanggal" 				=> $param["tanggal"]
			];

			$this->db->insert('tb_triase_resiko_jatuh', $dataResikoJatuh);


			$this->db->delete('tb_triase_serah_terima', ['triase_id' => $triaseId]);

			$dataSerahTerima = [
				"triase_id"     		=> $triaseId,
				"dokter_triase" 		=> $param["dokter_triase"],
				"dokter_jaga" 			=> $param["dokter_jaga"],
				"perawat_triase" 		=> $param["perawat_triase"],
				"perawat_jaga" 			=> $param["perawat_jaga"],
				"edukasi_pasien" 		=> $param["edukasi_pasien"],
				"tanggal" 				=> $param["tanggal"],
				"keluarga_pasien" 		=> $param["keluarga_pasien"],
				"infomasi_by" 			=> $param["infomasi_by"],
			];

			$this->db->insert('tb_triase_serah_terima', $dataSerahTerima);

			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}


	public function saveEvaluasi()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();



			// Check if data already exists
			$this->db->where('rujukan_id', $param['rujukan_id']);
			$query = $this->db->get('tb_rujukan_triase');

			$triaseId = $query->row()->id;

			$this->db->delete('tb_triase_pasien_terintegrasi', ['triase_id' => $triaseId]);

			$data = [
				'triase_id' 		=> $triaseId,
				'autoanamnesa' 		=> $param['autoanamnesa'],
				'alloanamnesa' 		=> $param['alloanamnesa'],
				'rpo' 				=> $param['rpo'],
				'status_psikologis' => !empty($param['status_psikologis']) ? implode(', ', $param['status_psikologis']) : null,
				'status_pernikahan' => $param['status_pernikahan'],
				'hub_pasien_dengan_anggota_keluarga' => $param['hub_pasien_dengan_anggota_keluarga'],
				'kegiatan_keagamaan_yang_diikuti' 	 => $param['kegiatan_keagamaan_yang_diikuti'],
				'penanggung_jawab' 					 => $param['penanggung_jawab'],
				'keadaan_umum' 		=> $param['keadaan_umum'],
				'td' 				=> $param['td'],
				'rr' 				=> $param['rr'],
				'gcs' 				=> $param['gcs'],
				'tb' 				=> $param['tb'],
				'hr' 				=> $param['hr'],
				'temp' 				=> $param['temp'],
				'spo2' 				=> $param['spo2'],
				'bb' 				=> $param['bb'],
				'kepala' 			=> $param['kepala'],
				'leher' 			=> $param['leher'],
				'thorax' 			=> $param['thorax'],
				'abdomen' 			=> $param['abdomen'],
				'extremitas' 		=> $param['extremitas'],
				'genitalia' 		=> $param['genitalia'],
				'laboratorium' 		=> $param['laboratorium'],
				'radiologi' 		=> $param['radiologi'],
				'ekg' 				=> $param['ekg'],
				'lainnya' 			=> $param['lainnya'],
				'rencana_tindak_lanjut' => $param['rencana_tindak_lanjut'],
				'dokter' 				=> $param['dokter'],
				'modified_at' => $param['modified_at']
			];

			$this->db->insert('tb_triase_pasien_terintegrasi', $data);

			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}


	public function saveTT()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();

			$this->db->delete('tb_rujukan_tatalaksana', ['rujukan_id' => $param['rujukan_id']]);


			$data = [
				'rujukan_id' => $param['rujukan_id'],
				'instruksi_lainnya' => $param['instruksi_lainnya'],
				'edukasi' => $param['edukasi'],
				'pasien_atau_wali' => $param['pasien_atau_wali'],
				'waktu' => $param['waktu'],
				'petugas' => $param['petugas']
			];

			$this->db->insert('tb_rujukan_tatalaksana', $data);
			$tatalaksanaId = $this->db->insert_id();


			$this->db->delete('tb_rujukan_tatalaksana_det', ['tatalaksana_id' => $tatalaksanaId]);

			foreach ($param['obat_cairan'] as $key => $val) {
				$dataTT = [
					'tatalaksana_id' => $tatalaksanaId,
					'waktu' => $param['waktu'][$key],
					'waktu_pembelian' => $param['waktu_pembelian'][$key],
					'cara_pembelian' => $param['cara_pembelian'][$key],
					'obat_cairan' => $param['obat_cairan'][$key],
					'dosis' => $param['dosis'][$key],
					'dokter' => $param['dokter'][$key],
					'ttd_perawat' => $param['ttd_perawat'][$key],
				];

				$this->db->insert('tb_rujukan_tatalaksana_det', $dataTT);
			}

			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	public function saveCPPT()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();


			$this->db->delete('tb_rujukan_cppt', ['rujukan_id' => $param['rujukan_id']]);

			foreach ($param['waktu'] as $key => $val) {
				$data = [
					'rujukan_id' => $param['rujukan_id'],
					'waktu' => $param['waktu'][$key],
					'profesional' => $param['profesional'][$key],
					'asesmen' => $param['asesmen'][$key],
					'instruksi' => $param['instruksi'][$key],
					'verifikasi' => $param['verifikasi'][$key],
				];
				$this->db->insert('tb_rujukan_cppt', $data);
			}



			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	public function saveFarmasi()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();


			$this->db->delete('tb_rujukan_farmasi', ['rujukan_id' => $param['rujukan_id']]);

			foreach ($param['obat_id'] as $key => $val) {
				$getObat = $this->db->get_where('tb_obat', ['id' => $val])->row();
				$data = [
					'rujukan_id' => $param['rujukan_id'],
					'obat_id' => $param['obat_id'][$key],
					'dosis' => $param['dosis'][$key],
					'tanggal' => $param['tanggal'][$key],
					'jumlah' => $param['jumlah'][$key],
					'nama_obat' => $getObat->nama_obat,
				];
				$this->db->insert('tb_rujukan_farmasi', $data);
			}



			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	public function saveSelesai()
	{
		$this->db->trans_begin();
		try {
			$param = $this->input->post();

			$this->db->delete('tb_rujukan_selesai', ['rujukan_id' => $param['rujukan_id']]);

			$data = [
				'tgl_keluar' => $param['tgl_keluar'],
				'tgl_masuk' => $param['tgl_masuk'],
				'rujukan_id' => $param['rujukan_id'],
				'ruang_rawat' => $param['ruang_rawat'],
				'penanggung_pembayaran' => $param['penanggung_pembayaran'],
				'riwayat_penyakit' => $param['riwayat_penyakit'],
				'pemeriksaan_fisik' => $param['pemeriksaan_fisik'],
				'pemeriksaan_penunjang' => $param['pemeriksaan_penunjang'],
				'terapi_pengobatan' => $param['terapi_pengobatan'],
				'diagnosa_utama' => $param['diagnosa_utama'],
				'dokter_penanggung_jawab' => $param['dokter_penanggung_jawab'],
			];
			$this->db->insert('tb_rujukan_selesai', $data);
			$selesaiId = $this->db->insert_id();



			if (isset($param['obat_id'])) {
				$this->db->delete('tb_rujukan_selesai_det', ['rujukan_selesai_id' => $selesaiId]);
				foreach ($param['obat_id'] as $key => $val) {
					$getObat = $this->db->get_where('tb_obat', ['id' => $val])->row();
					$dataDet = [
						'rujukan_selesai_id' => $selesaiId,
						'obat_id' => $param['obat_id'][$key],
						'jumlah' => $param['jumlah'][$key],
						'dosis' => $param['dosis'][$key],
						'frekuensi' => $param['frekuensi'][$key],
						'cara_pembelian' => $param['cara_pembelian'][$key],
						'nama_obat' => $getObat->nama_obat,
					];
					$this->db->insert('tb_rujukan_selesai_det', $dataDet);
				}
			}

			if (isset($param['layanan_id'])) {
				$this->db->delete('tb_rujukan_selesai_det_layanan', ['rujukan_selesai_id' => $selesaiId]);

				foreach ($param['layanan_id'] as $key => $val) {
					$getLayanan = $this->db->get_where('tb_layanan', ['id' => $val])->row();
					$dataLayanan = [
						'rujukan_selesai_id' => $selesaiId,
						'layanan_id' => $param['layanan_id'][$key],
						'ket' => $param['ket'][$key],
						'qty' => $param['qty'][$key],
						'harga' => $getLayanan->harga,
						'subtotal' => $param['qty'][$key] * $getLayanan->harga,
						'nama_layanan' => $getLayanan->nama_layanan,
					];
					$this->db->insert('tb_rujukan_selesai_det_layanan', $dataLayanan);
				}
			}



			$this->db->trans_commit();
			echo $this->httpResponseCode("200", "Save data successfully");
		} catch (Error $e) {
			http_response_code(400);
			$this->db->trans_rollback();
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}


	// function save()
	// {
	// 	try {
	// 		$param = $this->input->post();

	// 		$save  = $this->db->insert('tb_rujukan', $param);

	// 		if($save)
	// 		{
	// 			echo $this->httpResponseCode("200", "Save data successfully");
	// 			return;
	// 		}else{}


	// 		echo $this->httpResponseCode("400", "Save data failed");
	// 		return;


	// 		echo json_encode($param);
	// 		die;


	// 		// if(strlen($param['nik']) ==0){
	// 		// 	echo $this->httpResponseCode("400", "nik tidak boleh kosong");
	// 		// 	return;
	// 		// }
	// 		if(strlen($param['nama_depan']) ==0){
	// 			echo $this->httpResponseCode("400", "nama depan tidak boleh kosong");
	// 			return;
	// 		}
	// 		// if(strlen($param['nama_belakang']) ==0){
	// 		// 	echo $this->httpResponseCode("400", "nama belakang tidak boleh kosong");
	// 		// 	return;
	// 		// }
	// 		// if(strlen($param['gender']) ==0){
	// 		// 	echo $this->httpResponseCode("400", "jenis kelamin tidak boleh kosong");
	// 		// 	return;
	// 		// }

	// 		// if(strlen($param['diperiksa_oleh']) ==0){
	// 		// 	echo $this->httpResponseCode("400", "diperiksa oleh tidak boleh kosong");
	// 		// 	return;
	// 		// }


	// 		$save = $this->MedicalRecord->store($param);

	// 		if ($save) {
	// 			echo $this->httpResponseCode("200", "Save Data Successfully");
	// 		} else {
	// 			echo $this->httpResponseCode("400", "Database Error");
	// 		}
	// 	} catch (\Throwable $th) {
	// 		echo $this->httpResponseCode(400, $th->getMessage());
	// 	}
	// }

	function getChart()
	{
		$row = $this->db->join('tb_obat a', 'a.id = b.id_obat')->get('tb_temp_cart b')->result();
		echo json_encode($row);
	}

	function getLayanan()
	{
		$row = $this->db->join('tb_layanan a', 'a.id = b.id_layanan')->get('tb_temp_layanan b')->result();
		echo json_encode($row);
	}

	function deleteCart()
	{
		$id = $this->input->get('id');

		$exec = $this->MedicalRecord->deleteCart($id);

		if ($exec) {
			echo $this->httpResponseCode(200, "Delete Cart Success");
			return;
		}
		echo $this->httpResponseCode(400, "Wrong Queries");
		return;
	}

	function deleteLayanan()
	{
		$id = $this->input->get('id');

		$exec = $this->MedicalRecord->deleteLayanan($id);

		if ($exec) {
			echo $this->httpResponseCode(200, "Delete Layanan Success");
			return;
		}
		echo $this->httpResponseCode(400, "Wrong Queries");
		return;
	}


	function addCart()
	{
		$param = $this->input->post();

		$param = array_merge($param, ['created_by' => $this->userId]);

		$row = $this->db->get_where("tb_obat", ['id' => $param['id_obat']])->row();
		if ($row->stok - $param['qty'] < 0) {
			echo $this->httpResponseCode(400, "Stok Obat Tidak Cukup");
			return;
		}

		$exec = $this->MedicalRecord->addCart($param);

		if ($exec) {
			echo $this->httpResponseCode(200, "Delete Cart Success");
			return;
		}
		echo $this->httpResponseCode(400, "Wrong Queries");
		return;
	}

	function addLayanan()
	{
		$param = $this->input->post();

		$data = [
			'id_layanan' => $param['id_layanan'],
			'qty' => $param['qty_layanan'],
		];

		$exec = $this->MedicalRecord->addLayanan($data);

		if ($exec) {
			echo $this->httpResponseCode(200, "Add Layanan Success");
			return;
		}
		echo $this->httpResponseCode(400, "Wrong Queries");
		return;
	}

	function getAllAjax()
	{
		$param = $this->input->post();

		$data['getOutward'] = $this->Container->getAllOutwardByParam($param);
		$contid = $data['getOutward']['contHdr']->contid;
		$data['containerReceived'] = $this->Container->getContainerReceived(true, $contid);
		$isNotReceived = $this->Container->getContainerReceived(false, $contid);
		$data['disabledButton'] = "";
		$data['message'] = "";

		if (count($isNotReceived) == 0) {
			$data['disabledButton'] = "disabled";
			$data['message'] = 'All containers have been received';
		}


		if ($contid == null) {
			echo $this->httpResponseCode("400", "Data Not Found");
			die;
		}
		$data['containerNotReceived'] = count($isNotReceived);



		$this->load->view("_data/loadOutwardAjax", $data);
	}

	function cetak($id)
	{
		$data['row'] = $this->MedicalRecord->getKunjunganById($id);
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('cetak', $data);
	}
	function cetak_dokter($id)
	{
		$data['row'] = $this->MedicalRecord->getKunjunganById($id);
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view('cetak-dokter', $data);
	}


	// Form Triase
	function getFormTriase($pasienId)
	{
		// echo $pasienId;
		// die;
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
		$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
		$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
		$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

		// get diagnosa sementara

		$getDiagnosaAwal = $this->db
			->select("diagnosa AS nama_diagnosa")
			->from('tb_mst_diagnosa')
			->where('id', $data['getRujukan']->diagnosa_awal)
			->get()
			->row();

		if ($getDiagnosaAwal != null) {

			$data['getDianosaSementara'] = $getDiagnosaAwal->nama_diagnosa;
		} else {
			$data['getDianosaSementara'] = '';
		}




		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
		$data['listPerawat'] = $this->db->get('tb_mst_perawat')->result();

		$data['pasienId'] = $pasienId;


		// echo json_encode($data['getTriaseDet']);
		// die;

		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();
		$this->load->view('form-triase', $data);
	}

	function getFormEvaluasi($pasienId)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
		$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
		$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
		$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

		$data['getEvaluasi'] = $this->db->get_where('tb_triase_pasien_terintegrasi', ["triase_id" => $data['getTriase']->id])->row();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();

		$data['pasienId'] = $pasienId;


		// echo json_encode($data['getTriaseDet']);
		// die;

		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();
		$this->load->view('form-evaluasi', $data);
	}

	function getFormTatalaksana($pasienId)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();


		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

		$data['getTatalaksana'] = $this->db->get_where('tb_rujukan_tatalaksana', ['rujukan_id' => $data['getRujukan']->id])->row();

		$data['getTatalaksanaDet'] = $this->db->get_where('tb_rujukan_tatalaksana_det', ['tatalaksana_id' => $data['getTatalaksana']->id])->result();
		$data['pasienId'] = $pasienId;


		// echo json_encode($data);
		// die;
		$this->load->view('form-tatalaksana', $data);
	}

	function getFormCPPT($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getCPPT'] = $this->db->get_where('tb_rujukan_cppt', ['rujukan_id' => $data['getRujukan']->id])->result();

			$data['pasienId'] = $pasienId;

			$data['listPerawat'] = $this->db->get('tb_mst_perawat')->result();



			// echo json_encode($data);
			// die;
			$this->load->view('form-cppt', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	function getFormFarmasi($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getFarmasi'] = $this->db->get_where('tb_rujukan_farmasi', ['rujukan_id' => $data['getRujukan']->id])->result();

			$data['listObat'] = $this->db->get('tb_obat')->result();

			$data['pasienId'] = $pasienId;

			// echo json_encode($data);
			// die;
			$this->load->view('form-farmasi', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	function getFormSelesai($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getSelesai'] = $this->db->get_where('tb_rujukan_selesai', ['rujukan_id' => $data['getRujukan']->id])->row();
			$data['getSelesaiDet'] = $this->db->get_where('tb_rujukan_selesai_det', ['rujukan_selesai_id' => $data['getSelesai']->id])->result();
			$data['getSelesaiDetLyanan'] = $this->db->get_where('tb_rujukan_selesai_det_layanan', ['rujukan_selesai_id' => $data['getSelesai']->id])->result();

			$data['listObat'] = $this->db->get('tb_obat')->result();

			$data['listDiagnosa'] = $this->db->get('tb_mst_diagnosa')->result();
			$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
			$data['pasienId'] = $pasienId;

			$data['listLayanan'] = $this->db->get('tb_layanan')->result();



			$getDiagnosaAwal = $this->db
				->select("diagnosa AS nama_diagnosa")
				->from('tb_mst_diagnosa')
				->where('id', $data['getRujukan']->diagnosa_awal)
				->get()
				->row();

			if ($getDiagnosaAwal != null) {

				$data['getDianosaSementara'] = $getDiagnosaAwal->nama_diagnosa;
			} else {
				$data['getDianosaSementara'] = '';
			}

			// echo json_encode($data['getSelesai']);
			// die;
			$this->load->view('form-selesai', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	function getFormPerincian($pasienId)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
		$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
		$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
		$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

		$data['getEvaluasi'] = $this->db->get_where('tb_triase_pasien_terintegrasi', ["triase_id" => $data['getTriase']->id])->row();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();

		$data['pasienId'] = $pasienId;


		$dataSelesai = $this->db->get_where('tb_rujukan_selesai', ['rujukan_id' => $data['getRujukan']->id])->row();

		// echo json_encode($data['getTriaseDet']);
		// die;


		$data['listPemakaianObat'] = $this->db->select('a.id, a.harga, a.nama_obat, SUM(b.jumlah) as total_qty') // Ganti nama_obat dengan kolom yang relevan
			->from('tb_obat a')
			->join('tb_rujukan_farmasi b', 'a.id = b.obat_id')
			->where('b.rujukan_id', $data['getRujukan']->id)
			->group_by('a.id') // Group by berdasarkan id obat
			->get()
			->result();

		$data['listBiayaLayanan'] = $this->db->get_where('tb_rujukan_selesai_det_layanan', ["rujukan_selesai_id" => $dataSelesai->id])->result();


		// echo json_encode($data['listBiayaLayanan']);
		// die;


		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();
		$this->load->view('form-perincian', $data);
	}



	function printFormTriase($pasienId, $fragment)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
		$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
		$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
		$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

		// get diagnosa sementara

		$getDiagnosaAwal = $this->db
			->select("diagnosa AS nama_diagnosa")
			->from('tb_mst_diagnosa')
			->where('id', $data['getRujukan']->diagnosa_awal)
			->get()
			->row();

		if ($getDiagnosaAwal != null) {

			$data['getDianosaSementara'] = $getDiagnosaAwal->nama_diagnosa;
		} else {
			$data['getDianosaSementara'] = '';
		}





		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
		$data['listPerawat'] = $this->db->get('tb_mst_perawat')->result();
		$data['fragment'] = $fragment;


		// echo json_encode($data['getTriaseDet']);
		// die;

		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();
		$this->load->view('form-triase-print', $data);
	}



	function printFormEvaluasi($pasienId)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
		$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
		$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
		$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
		$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

		$data['getEvaluasi'] = $this->db->get_where('tb_triase_pasien_terintegrasi', ["triase_id" => $data['getTriase']->id])->row();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();

		$data['pasienId'] = $pasienId;


		// echo json_encode($data['getTriaseDet']);
		// die;

		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();
		$this->load->view('form-evaluasi-print', $data);
	}

	function printFormTatalaksana($pasienId)
	{
		$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();


		$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

		$data['getTatalaksana'] = $this->db->get_where('tb_rujukan_tatalaksana', ['rujukan_id' => $data['getRujukan']->id])->row();

		$data['getTatalaksanaDet'] = $this->db->get_where('tb_rujukan_tatalaksana_det', ['tatalaksana_id' => $data['getTatalaksana']->id])->result();
		$data['pasienId'] = $pasienId;


		// echo json_encode($data);
		// die;
		$this->load->view('form-tatalaksana-print', $data);
	}


	function printFormCPPT($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getCPPT'] = $this->db->get_where('tb_rujukan_cppt', ['rujukan_id' => $data['getRujukan']->id])->result();
			$data['pasienId'] = $pasienId;


			// echo json_encode($data);
			// die;
			$this->load->view('form-cppt-print', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}


	function printFormFarmasi($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getFarmasi'] = $this->db->get_where('tb_rujukan_farmasi', ['rujukan_id' => $data['getRujukan']->id])->result();

			$data['listObat'] = $this->db->get('tb_obat')->result();

			$data['pasienId'] = $pasienId;

			// echo json_encode($data);
			// die;
			$this->load->view('form-farmasi-print', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	function printFormSelesai($pasienId)
	{
		try {
			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();

			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$data['getSelesai'] = $this->db->get_where('tb_rujukan_selesai', ['rujukan_id' => $data['getRujukan']->id])->row();
			$data['getSelesaiDet'] = $this->db->get_where('tb_rujukan_selesai_det', ['rujukan_selesai_id' => $data['getSelesai']->id])->result();

			$data['listObat'] = $this->db->get('tb_obat')->result();

			$data['listDiagnosa'] = $this->db->get('tb_mst_diagnosa')->result();
			$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();
			$data['pasienId'] = $pasienId;



			$getDiagnosaAwal = $this->db
				->select("diagnosa AS nama_diagnosa")
				->from('tb_mst_diagnosa')
				->where('id', $data['getRujukan']->diagnosa_awal)
				->get()
				->row();

			if ($getDiagnosaAwal != null) {

				$data['getDianosaSementara'] = $getDiagnosaAwal->nama_diagnosa;
			} else {
				$data['getDianosaSementara'] = '';
			}

			$this->load->view('form-selesai-print', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}


	function printFormPerincian($pasienId)
	{
		try {

			$data['getRujukan'] = $this->db->get_where('tb_rujukan', ["pasien_id" => $pasienId])->row();
			$data['getTriase'] = $this->db->get_where('tb_rujukan_triase', ["rujukan_id" => $data['getRujukan']->id])->row();
			$data['getTriaseDet'] = $this->db->get_where('tb_triase_det', ["triase_id" => $data['getTriase']->id])->result();
			$data['getTriaseSkrining'] = $this->db->get_where('tb_triase_skrining', ["triase_id" => $data['getTriase']->id])->row();
			$data['getTriaseResikoJatuh'] = $this->db->get_where('tb_triase_resiko_jatuh', ["triase_id" => $data['getTriase']->id])->row();
			$data['getTriaseSerahTerima'] = $this->db->get_where('tb_triase_serah_terima', ["triase_id" => $data['getTriase']->id])->row();

			$data['getEvaluasi'] = $this->db->get_where('tb_triase_pasien_terintegrasi', ["triase_id" => $data['getTriase']->id])->row();

			$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();

			$data['pasienId'] = $pasienId;


			$dataSelesai = $this->db->get_where('tb_rujukan_selesai', ['rujukan_id' => $data['getRujukan']->id])->row();

			// echo json_encode($data['getTriaseDet']);
			// die;


			$data['listPemakaianObat'] = $this->db->select('a.id, a.harga, a.nama_obat, SUM(b.jumlah) as total_qty') // Ganti nama_obat dengan kolom yang relevan
				->from('tb_obat a')
				->join('tb_rujukan_farmasi b', 'a.id = b.obat_id')
				->where('b.rujukan_id', $data['getRujukan']->id)
				->group_by('a.id') // Group by berdasarkan id obat
				->get()
				->result();

			$data['listBiayaLayanan'] = $this->db->get_where('tb_rujukan_selesai_det_layanan', ["rujukan_selesai_id" => $dataSelesai->id])->result();


			// echo json_encode($data['listBiayaLayanan']);
			// die;


			$data['getPasien'] = $this->db->get_where('tb_pasien', ['idx' => $pasienId])->row();

			$this->load->view('form-perincian-print', $data);
		} catch (Error $e) {
			$this->db->trans_rollback();
			http_response_code(400);
			echo $this->httpResponseCode("400", "Specific error: " . $e->getMessage());
		} catch (Exception $e) {
			$this->db->trans_rollback();
			http_response_code(400);

			echo $this->httpResponseCode("500", "Internal server error: " . $e->getMessage());
		}
	}

	// -----------------------------------------------------------------------------------

	public function getPasienById($id)
	{
		// Tambahkan header CORS
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");

		// Ambil data pasien berdasarkan ID
		$pasien = $this->db->get_where('tb_pasien', ['idx' => $id])->row();

		// Cek apakah pasien ditemukan
		if ($pasien) {
			echo json_encode($pasien);
		} else {
			http_response_code(404);
			echo json_encode(['message' => 'Pasien tidak ditemukan']);
		}
	}
}
