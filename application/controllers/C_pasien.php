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
			$this->load->model('Pasien_login');
	        $this->load->model('K_prmedis_model');
	        $this->load->model('Pasien_model');
		}
		function index()
		{
			$data = [
				'kunjungan' => $this->Pasien_login->kunjungan(),
				'rmedis' => $this->Pasien_login->rmedisfive(),
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
		$data = ['penerima' => $penerima = $this->K_pesan_model->penerima()];
		$this->template->load('template','Pasien/c_pesan_baru',$data);
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
			$pesan = $this->input->post('pesan');

			$this->K_pesan_model->buat_pesan($data,$pesan);
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
			$data = $this->Pasien_login->profil($user->email);
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
			$data['jadwal'] = $this->Pasien_login->jadwal();
			$this->template->load('template','Pasien/jadwal',$data);
		}
		function ubah_data()
		{
			$user = $this->ion_auth->user()->row();
			$id = $user->email;
			$row = $this->Pasien_login->profil($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Pasien/update_action'),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'identitas' => set_value('identitas', $row->identitas),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'user' => set_value('user', $row->user),
		'pass' => set_value('pass', $row->pass),
		'sex' => set_value('sex', $row->sex),
        'no_hp' => set_value('no_hp', $row->no_hp),
		'birth_date' => set_value('birth_date', $row->birth_date),
		'status' => set_value('status', $row->status),
	    );
			$this->template->load('template','Pasien/ubah',$row);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pasien'));
        }
		}
	public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

       // if ($this->form_validation->run() == FALSE) {
         //   $this->ubah_data($this->input->post('id_pasien', TRUE));
        //} else {
            $data = array(
		'identitas' => $this->input->post('identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'sex' => $this->input->post('sex',TRUE),
        'no_hp' => $this->input->post('no_hp',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pasien_model->update($this->input->post('id_pasien', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('C_pasien/profil'));
        //}
    }
	public function _rules() 
    {
	$this->form_validation->set_rules('identitas', 'identitas', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');
	$this->form_validation->set_rules('sex', 'sex', 'trim|required');
    $this->form_validation->set_rules('no_hp','no_hp','trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
?>