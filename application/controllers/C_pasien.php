<?php
	/**
	* 
	*/
	class C_pasien extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('K_pesan_model');
			$this->load->model('Pasien_Login');
	        $this->load->model('K_prmedis_model');
		}
		function index()
		{
			$data = [
				'kunjungan' => $this->Pasien_Login->kunjungan(),
				'rmedis' => $this->Pasien_Login->rmedisfive(),
			];
			$this->template->load('template','Pasien/dashboard',$data);
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
		$this->template->load('template','Pasien/c_pesan_list', $data);
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
		$this->template->load('template','Pasien/c_pesan_list', $data);
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
		$this->template->load('template','Pasien/c_pesan_baca',$data);
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
		redirect('C_pasien/baca/'.$id_percakapan);
	}
	public function pesan_baru()
	{
		$this->template->load('template','Pasien/c_pesan_baru');
	}
	public function hapus()
	{
		$id = $this->uri->segment(3);
		$this->K_pesan_model->hapus($id);
		redirect('C_Pasien');
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
			redirect('C_pasien/baca/'.$newid);
}
			function Pasien_medis()
			{
				$k_rmedis = $this->K_prmedis_model->get_all();

        		$data = array(
            	'k_rmedis_data' => $k_rmedis
       			 );
				$this->template->load('template','Pasien/medis',$data);
			}
			function medis_detail(){
				$id = $this->uri->segment(3);
				$row = $this->K_prmedis_model->get_by_id($id);

				if ($row) {
            $data = array(
		'id_rmedis' => $row->id_rmedis,
		'id_tindakan' => $row->id_tindakan,
		'tindakan' => $row->tindakan,
		'id_pasien' => $row->id_pasien,
		'diagnosa' => $row->diagnosa,
		'keluhan' => $row->keluhan,
		'resep' => $row->resep,
		'waktu' => $row->waktu,
		'keterangan' => $row->keterangan,
		'id_pengguna' => $row->id_pengguna,
		'id_dokter' => $row->id_dokter,
	    );
            $this->template->load('template','Pasien/medis_detail',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('K_rmedis'));
        }
				
			}
		function profil()
		{
			$user = $this->ion_auth->user()->row();
			$data = $this->Pasien_Login->profil($user->email);
			if ($data) {
				$row = [
					'id_pasien' => $data->id_pasien,
					'identitas' => $data->identitas,
					'nama_pasien' => $data->nama,
					'alamat_pasien' => $data->alamat,
					'username_pasien' => $data->user,
					'jenis_kelamin' => $data->sex,
					'tanggal_lahir' => $data->birth_date,
					'no_hp' => $data->no_hp,
				];
			}
			$this->template->load('template','Pasien/profil',$row);
		}
		function jadwal()
		{
			$data['jadwal'] = $this->Pasien_Login->jadwal();
			$this->template->load('template','Pasien/jadwal',$data);

		}
}
?>