<?php
	/**
	* POS V.3 Controller
	*/
	class Pos3 extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Pos3_model');
		}
		function index()
		{
			redirect('Pos3/step1');
		}
		function step1()
		{
			$this->load->view('admin/tema2');
			$this->load->view('admin/POSV3/step1');
		}
		function step1_next()
		{
			$dokter = $this->input->post('dokter');
			$pasien = $this->input->post('pasien');
			$jenis = $this->input->post('jenis');
			$this->session->set_userdata('dokter',$dokter);
			$this->session->set_userdata('pasien',$pasien);
			$this->session->set_userdata('jenis',$jenis);
			redirect('transaksi');
		}
		function step2()
		{
			$data = [
				'dokter' => $this->session->userdata('dokter'),
				'pasien' => $this->session->userdata('pasien'),
				'jenis'	=> $this->session->userdata('jenis')
			];
			$this->load->view('admin/tema2');
			$this->load->view('admin/POSV3/step2',$data);
		}
	}
?>