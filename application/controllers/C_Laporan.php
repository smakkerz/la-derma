<?php

/**
* Laporan
*/
class C_Laporan extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language','nuris_helper'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
        $this->load->model('K_kasir');
        $this->load->model('laporan');
        $this->load->library('form_validation');
	}
	public function index()
	{
  
		$data2 = [
			'lap' => $this->laporan->graphobt(),
			'data' => $this->laporan->pemasukan(),
		];
		$this->template->load('template','laporan',$data2);
	}
}