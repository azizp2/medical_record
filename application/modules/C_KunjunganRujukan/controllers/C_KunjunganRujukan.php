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

		if($id != null)
		{
			$data['row'] = $this->MedicalRecord->getKunjunganById($id);
			$data['edit'] = true;
			$data['id'] = $id;
		}

		$rujukanList = $this->db
		->select('tb_rujukan.*, tb_pasien.* ') // Pilih kolom yang diinginkan
		->from('tb_rujukan')
		->join('tb_pasien', 'tb_pasien.idx = tb_rujukan.pasien_id') // Memperbaiki sintaks join
		->get()
		->result();


		// Ambil semua rujukan
		$data['listRujukan'] = $rujukanList;


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
		$row = $this->db->join('tb_obat a','a.id = b.id_obat')->get('tb_temp_cart b')->result();
		echo json_encode($row);
	}

	function getLayanan()
	{
		$row = $this->db->join('tb_layanan a','a.id = b.id_layanan')->get('tb_temp_layanan b')->result();
		echo json_encode($row);
	}

	function deleteCart()
	{
		$id = $this->input->get('id');

		$exec = $this->MedicalRecord->deleteCart($id);

		if($exec){
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

		if($exec){
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
        if($row->stok - $param['qty'] < 0)
        {
            echo $this->httpResponseCode(400, "Stok Obat Tidak Cukup");
			return;
        }

		$exec = $this->MedicalRecord->addCart($param);

		if($exec){
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

		if($exec){
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



	// -----------------------------------------------------------------------------------

	public function getPasienById($id) {
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
 