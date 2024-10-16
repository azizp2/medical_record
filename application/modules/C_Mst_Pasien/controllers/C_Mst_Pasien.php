<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_Mst_Pasien extends BaseController
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

		$data['titlePage'] = "List Pasien";

		$data['list'] = $this->db->get_where('tb_pasien', ['is_active' => 1])->result();

		$this->layout('index', $data);
	}

	function save()
	{
		try {
			$param = $this->input->post();

			$pasien = $this->db->get_where('tb_pasien', ['no_rkm' => $param['no_rkm']])->row();
			if (!empty($pasien)) {
				echo $this->httpResponseCode("400", "nik sudah pernah digunakan");
				return;
			}

			if (strlen($param['nama_depan']) == 0) {
				echo $this->httpResponseCode("400", "nama depan tidak boleh kosong");
				return;
			}

			if (strlen($param['no_rkm']) == 0) {
				echo $this->httpResponseCode("400", "no rkm tidak boleh kosong");
				return;
			}

			if ($param['id'] > 0) {
				$this->db->where('idx', $param['id']);
				$exec = $this->db->update('tb_pasien', $param);
			} else {
				$param['is_active'] = 1;
				$exec = $this->db->insert('tb_pasien', $param);
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
		$this->db->where('idx', $this->input->post('id'));
		$sql = $this->db->delete('tb_pasien');
		if ($sql) {
			echo $this->httpResponseCode("200", "Delete Data Successfully");
		} else {
			echo $this->httpResponseCode("400", "Database Error");
		}
	}


	public function get_list()
	{
		$draw = intval($this->input->post('draw'));
		$start = intval($this->input->post('start'));
		$length = intval($this->input->post('length'));

		$users = $this->db->get("tb_pasien")->result();
		$totalRecords = $this->db->count_all('tb_pasien');

		$data = [];
		foreach ($users as $key => $val) {
			$data[] = [
				'no' => $start + $key + 1,
				'no_rkm' => $val->no_rkm,
				'fullname' => $val->nama_depan . " " . $val->nama_belakang,
				'nik' => $val->nik,
				'tgl_lahir' => $val->tgl_lahir,
				'gender' => $val->gender,
				'golongan_darah' => $val->golongan_darah,
				'alamat' => $val->alamat,
				'umur' => $this->calculate_age($val->tgl_lahir) . ' Tahun',
				'action' => "<button class='btn btn-danger' onclick='deleted(" . $val->id . ")'>Delete</button>
                             <button class='btn btn-primary open-modal'>Edit</button>"
			];
		}

		$response = [
			"draw" => $draw,
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $totalRecords,
			"data" => $data
		];

		echo json_encode($response);
	}

	private function calculate_age($dob)
	{
		return date_diff(date_create($dob), date_create('today'))->y;
	}
}
