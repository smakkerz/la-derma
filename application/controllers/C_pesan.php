<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
        $this->load->model('K_pesan_model');
        $this->load->library('form_validation');
	}
	public function index()
	{
		
		if ($this->ion_auth->is_admin()) {
			$pesan = $this->K_pesan_model->get_all_admin();
		}else{
			$pesan = $this->K_pesan_model->inbox();
		}

		$data = [
			'k_pesan' => $pesan
		];
		$this->template->load('template','c_pesan_list', $data);
	}
	public function outbox()
	{
		
		if ($this->ion_auth->is_admin()) {
			$pesan = $this->K_pesan_model->get_all_admin();
		}else{
			$pesan = $this->K_pesan_model->outbox();
		}

		$data = [
			'k_pesan' => $pesan
		];
		$this->template->load('template','c_pesan_list', $data);
	}
	public function baca()
	{
		$id = $this->uri->segment(3);
		$pesan = $this->K_pesan_model->baca($id);
		$judl = $this->K_pesan_model->judul($id);
		$data = [
			'baca' => $pesan,
			'judul' => $judl,
		];
		$this->template->load('template','c_pesan_baca',$data);
	}
	public function kirim_pesan()
	{
		$usern = $this->ion_auth->user()->row();
		$user = $usern->email;
		$id_percakapan = $this->input->post('id_percakapan');
		$pesan = $this->input->post('pesan');
		$data = [
			'id_percakapan' => $id_percakapan,
			'dari' => $user,
			'pesan' => $pesan,
		];

		$this->K_pesan_model->kirim($data);
		redirect('c_pesan/baca/'.$id_percakapan);
	}
	public function pesan_baru()
	{
		$this->template->load('template','c_pesan_baru');
	}
	public function tambah_pesan()
	{
		$this->db->order_by('id_percakapan','DESC');
			$this->db->limit(1);
			$query = $this->db->get('percakapan')->result();
			foreach ($query as $data) {
				$newid = $data->id_percakapan;
				$newid = $newid+1;
			}

			$usern = $this->ion_auth->user()->row();
			$user = $usern->email;

			$data = [
				'judul' => $this->input->post('judul'),
				'dari' => $user,
				'untuk' => $this->input->post('untuk')
			];

			$this->K_pesan_model->buat_pesan($data);
			redirect('c_pesan/baca/'.$newid);
	}
}