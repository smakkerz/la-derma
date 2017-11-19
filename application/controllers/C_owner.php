<?php
	/**
	* Class controller untuk Dashboard Owner
	*/
	class C_owner extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Owner_model');
		}
		function index()
		{
			$data = [
				'transaksi_trakhir' => $this->Owner_model->transaksi_trakhir(),
				'keuntungan' => $this->Owner_model->keuntungan(),
				'hutang' => $this->Owner_model->hutang()
			];
			$this->template->load('template','Owner/dashboard',$data);
		}
	}
?>