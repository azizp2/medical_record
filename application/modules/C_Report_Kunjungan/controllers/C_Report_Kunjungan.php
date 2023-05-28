<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Report_Kunjungan extends BaseController
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

		$param = $this->input->get();

		$from = $param['from'];
		$to = $param['to'];

		$data['from'] = $from;
		$data['to'] = $to;

		$data['titlePage'] = "Report Kunjungan";
		$this->db->select("a.*, a.id as norm, keluhan, c.*, diperiksa_oleh");
        $this->db->from('tb_pasien a');
        $this->db->join('tb_anamnesa b', 'a.nik = b.id_pasien', 'left');
        $this->db->join('tb_diagnosa c', 'a.nik = c.nik', 'left');
        $this->db->join('tb_resep d', 'a.nik = d.nik', 'left');
		if(!isset($param['from'])){
			$this->db->where('a.create_date', date("Y-m-d"));
		}else{
			$this->db->where("a.create_date between '$from' and '$to'",false, false);
		}
        $this->db->group_by("a.nik");
        $sql = $this->db->get()->result();
		$data['list'] =  $sql;


		$this->layout('index', $data);
	}

	public function ResumeDokter()
	{

		$param = $this->input->get();

		$from = $param['from'];
		$to = $param['to'];

		$data['from'] = $from;
		$data['to'] = $to;

		$data['titlePage'] = "Report Kunjungan";
		$this->db->select("a.*, a.id as norm, keluhan, c.*, diperiksa_oleh");
        $this->db->from('tb_pasien a');
        $this->db->join('tb_anamnesa b', 'a.nik = b.id_pasien', 'left');
        $this->db->join('tb_diagnosa c', 'a.nik = c.nik', 'left');
        $this->db->join('tb_resep d', 'a.nik = d.nik', 'left');
		if(!isset($param['from'])){
			$this->db->where('a.create_date', date("Y-m-d"));
		}else{
			$this->db->where("a.create_date between '$from' and '$to'",false, false);
		}
        $this->db->group_by("a.nik");
        $sql = $this->db->get()->result();
		$data['list'] =  $sql;


		$this->layout('resume', $data);
	}

	public function report_trans_obat()
	{

		$param = $this->input->get();

		$from = $param['from'];
		$to = $param['to'];

		$data['from'] = $from;
		$data['to'] = $to;

		$data['titlePage'] = "Report Kunjungan";


		$this->db->select("*");
        $this->db->from('tb_obat');
        $sql = $this->db->get()->result();

		$data['listObat'] =  $sql;

		$this->db->select("a.create_date, b.*")
			->from("tb_pasien a")
			->join("tb_resep b", "a.nik = b.nik");

		if (!isset($param['from'])) {
			$this->db->like('a.create_date', date("Y-m-d"));
		} else {
			$from = $param['from'];
			$to = $param['to'];

			$this->db->where("a.create_date BETWEEN '{$from} 00:00:00' AND '{$to} 23:59:59'");
		}

		$this->db->order_by('a.create_date desc');
		$sql2 = $this->db->get()->result();



		$data['listTrans'] =$sql2;

		// echo "<pre>";
		// print_r($data);
		// die;



		$this->layout('index-trans-obat', $data);
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
