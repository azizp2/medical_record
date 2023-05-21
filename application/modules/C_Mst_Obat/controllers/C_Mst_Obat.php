<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Mst_Obat extends BaseController
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
		$this->load->model("Obat", "Obat");
	}

	/**
	 * [index description]
	 *
	 * @method index
	 *
	 * @return [type] [description]
	 */
	public function index()
	{

		$data['titlePage'] = "List Obat";

		$data['listObat'] = $this->Obat->getAll();

		$this->layout('index', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();
			
			if(strlen($param['nama_depan']) ==0){
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
}
