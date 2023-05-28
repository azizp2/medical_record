<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Medical_Record extends BaseController
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

		$data['titlePage'] = "Medical Record";
		$data['listObat'] = $this->Obat->getAll();
		$data['listLayanan'] = $this->db->get('tb_layanan')->result();
		$data['listKunjungan'] = $this->MedicalRecord->getAllKunjungan();
		$data['listKamar'] = $this->db->get('tb_mst_kamar')->result();
		$data['listDokter'] = $this->db->get('tb_mst_dokter')->result();

		$this->layout('index', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();


			if(strlen($param['nik']) ==0){
				echo $this->httpResponseCode("400", "nik tidak boleh kosong");
				return;
			}
			if(strlen($param['nama_depan']) ==0){
				echo $this->httpResponseCode("400", "nama depan tidak boleh kosong");
				return;
			}
			if(strlen($param['nama_belakang']) ==0){
				echo $this->httpResponseCode("400", "nama belakang tidak boleh kosong");
				return;
			}
			if(strlen($param['gender']) ==0){
				echo $this->httpResponseCode("400", "jenis kelamin tidak boleh kosong");
				return;
			}

			if(strlen($param['diperiksa_oleh']) ==0){
				echo $this->httpResponseCode("400", "diperiksa oleh tidak boleh kosong");
				return;
			}


			$save = $this->MedicalRecord->store($param);

			if ($save) {
				echo $this->httpResponseCode("200", "Save Data Successfully");
			} else {
				echo $this->httpResponseCode("400", "Database Error");
			}
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

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
}
