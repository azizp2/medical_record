<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Mst_Kamar extends BaseController
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

		$data['titlePage'] = "List Kamar";

		$data['list'] = $this->db->get('tb_mst_kamar')->result();

		$this->layout('index', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();
			
			if(strlen($param['nomor_kamar']) ==0){
				echo $this->httpResponseCode("400", "no kamar tidak boleh kosong");
				return;
			}

			if(strlen($param['jenis_kamar']) ==0){
				echo $this->httpResponseCode("400", "jenis kamar tidak boleh kosong");
				return;
			}

			if($param['id']>0)
			{
				$this->db->where('id', $param['id']);
				$exec = $this->db->update('tb_mst_kamar', $param);
			}else{
				$exec = $this->db->insert('tb_mst_kamar',$param);
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
		$sql = $this->db->delete('tb_mst_kamar');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
		}
	}
	
}
