<?php
/**
* 
*/
class History extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('History_modul');
	}
	function HistoryTx()
	{
		$data = [
			'get_tx' => $this->History_modul->get_tx(),
		];
		$this->load->view('admin/tema2');
		$this->load->view('admin/history',$data);
	}
	function HistoryKj()
	{
		$data = [
			'get_kj' => $this->History_modul->get_kj(),
		];
		$this->load->view('admin/tema2');
		$this->load->view('admin/history_kj',$data);
	}
}