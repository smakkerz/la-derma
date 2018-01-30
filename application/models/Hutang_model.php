<?php
	/**
	* 
	*/
	class Hutang_model extends CI_Model
	{
		
		function __construct()
		{
			# code...
		}
		function tambah($tabel,$data)
		{
			$this->db->insert($tabel,$data);
		}		

	}
?>