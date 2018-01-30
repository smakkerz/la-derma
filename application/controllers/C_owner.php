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
		function laporan()
		{
			$data['graph'] = $this->Owner_model->graph();
			$this->template->load('template','Owner/laporan',$data);
		}
		function stok()
		{
			$data['graph'] = $this->Owner_model->stok();
			$this->template->load('template','Owner/stok',$data);
		}
		function laporan_priode()
		{
			if (!$this->input->post('dari') || !$this->input->post('sd')) {
				redirect('C_owner/laporan','refresh');
			}else{
				$dari = $this->input->post('dari');
				$sd = $this->input->post('sd');
				$data['graph'] = $this->Owner_model->graph_priode($dari,$sd);
				$this->template->load('template','Owner/laporan2',$data);
			}
		}
		function laporan_tabel()
		{
			$data = [
				'data' => $this->Owner_model->transaksi()
			];
			$this->template->load('template','Owner/laporan3',$data);
		}
		function laporan_tabel_priode()
		{
			$tgl1 = $this->input->post('dari');
			$tgl2 = $this->input->post('sd');
			$data = [
				'data' => $this->Owner_model->priode($tgl1,$tgl2)
			];
			$this->template->load('template','Owner/laporan3',$data);
		}
	}
?>