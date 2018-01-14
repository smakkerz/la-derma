<?php 
	/**
	* 
	*/
	class Hutang extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Hutang_model');
		}
		function index()
		{
			$this->load->view('admin/tema2');
			$this->load->view('admin/F3-26/hutang');
		}
		function proses()
		{
			$hutang = $this->input->post('hutang');
			$keterangan = $this->input->post('keterangan');
			$tanggal = $this->input->post('tanggal');
			$users = $this->ion_auth->user()->row();
			$user = $users->email;
			$data = [
				'transaksi' => 'Hutang',
				'IdPengguna' => $user,
				'waktu' => $tanggal,
				'keluar' => $hutang,
				'keterangan' => $keterangan,
				'verifikasi' => '1'
			];
			$this->Hutang_model->tambah('arus_kas',$data);
			redirect('Hutang','refresh');

		}
	}
?>