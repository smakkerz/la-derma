<?php
	/**
	* Class Model Dokter
	*/
	class Dokter_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function jadwal()
		{
			$user_data = $this->ion_auth->user()->row();
			$email = $user_data->email;
			return $this->db->get_where('jadwal',array('idDokter' => $email))->result();
		}
		function pesan()
		{
			$user_data = $this->ion_auth->user()->row();
			$email = $user_data->email;
			return $this->db->get_where('percakapan',array('untuk' => $email))->result();
		}
		function janji()
		{
			$user_data = $this->ion_auth->user()->row();
			$email = $user_data->email;
			return $data = $this->db->get_where('k_janji',array('idDokter' => $email))->result();
		}
	}
?>