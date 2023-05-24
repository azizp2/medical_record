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

	public function stok()
	{

		$data['titlePage'] = "Report Stok Obat";

		$data['listObat'] = $this->Obat->getAll();

		$this->layout('stok', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();
			
			if(strlen($param['kode_obat']) ==0){
				echo $this->httpResponseCode("400", "kode obat tidak boleh kosong");
				return;
			}

			if(strlen($param['nama_obat']) ==0){
				echo $this->httpResponseCode("400", "nama obat tidak boleh kosong");
				return;
			}
			if(strlen($param['jenis_obat']) ==0){
				echo $this->httpResponseCode("400", "nama depan tidak boleh kosong");
				return;
			}
			if(strlen($param['harga']) ==0){
				echo $this->httpResponseCode("400", "harga belakang tidak boleh kosong");
				return;
			}
			if(strlen($param['stok']) ==0){
				echo $this->httpResponseCode("400", "stok tidak boleh kosong");
				return;
			}

			if($param['id']>0)
			{
				$this->db->where('id', $param['id']);
				$exec = $this->db->update('tb_obat', $param);
			}else{
				$exec = $this->db->insert('tb_obat',$param);
			}

			if ($exec) {
				$lable = $param['id'] > 0 ? "Update" : "Save";
				echo $this->httpResponseCode("200", "$lable Data Successfully");
			} else {
				echo $this->httpResponseCode("400", "Database Error");
			}
		} catch (\Throwable $th) {
			echo $this->httpResponseCode(400, $th->getMessage());
		}
	}

	function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$sql = $this->db->delete('tb_obat');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
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
