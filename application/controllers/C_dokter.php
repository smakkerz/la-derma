<?php 
	/**
	* Class controller untuk Dashboard Dokter
	*/
	class C_dokter extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->template->load('template','Dokter/dashboard');
		}
	}
?>