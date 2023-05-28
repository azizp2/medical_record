<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Mst_Layanan extends BaseController
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

		$data['titlePage'] = "List Layanan";

		$data['list'] = $this->db->get('tb_layanan')->result();


		$this->layout('index', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();
			
			if(strlen($param['nama_layanan']) ==0){
				echo $this->httpResponseCode("400", "nama layanan tidak boleh kosong");
				return;
			}
			if(strlen($param['harga']) ==0){
				echo $this->httpResponseCode("400", "harga tidak boleh kosong");
				return;
			}
			if(strlen($param['satuan']) ==0){
				echo $this->httpResponseCode("400", "satuan tidak boleh kosong");
				return;
			}

			if($param['id'] > 0)
			{
				$this->db->where('id', $param['id']);
				$save = $this->db->update('tb_layanan', $param);	
				$action = "Update";			
			}else{
				$save = $this->db->insert('tb_layanan', $param);				
				$action = "Save";			
			}

			if ($save) {
				echo $this->httpResponseCode("200", "$action Data Successfully");
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
		$sql = $this->db->delete('tb_layanan');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
		}
	}
	

}
