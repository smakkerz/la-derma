<?php 
	/**
	* Class controller untuk Dashboard Dokter
	*/
	class C_dokter extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Dokter_model');
			$this->load->model('K_pesan_model');
			$this->load->library('form_validation');

		}
		function index()
		{
			$user_data = $this->ion_auth->user()->row();
			$jadwal = $this->Dokter_model->jadwal();
			$pesan = $this->Dokter_model->pesan();
			$janji = $this->Dokter_model->janji();
			$data = [
				'user' => $user_data,
				'jadwal' => $jadwal,
				'pesan' => $pesan,
				'janji' => $janji,
			];
			$this->template->load('template','Dokter/dashboard',$data);
		}
		public function inbox()
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
		redirect('C_dokter/baca/'.$id_percakapan);
	}
	public function pesan_baru()
	{
		$this->template->load('template','c_pesan_baru');
	}
	public function hapus()
	{
		$id = $this->uri->segment(3);
		$this->K_pesan_model->hapus($id);
		redirect('C_dokter');
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
			redirect('C_dokter/baca/'.$newid);
}
	}
?>