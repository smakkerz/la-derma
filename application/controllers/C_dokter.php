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
	}
?>