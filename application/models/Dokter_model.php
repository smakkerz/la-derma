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
			$data = $this->db->get_where('k_janji',array('idDokter' => $email))->result();
			foreach ($data as $janji) {
				$pasien = $janji->id_pasien;
				$query = $this->db->query("SELECT k_janji.* , users.last_name FROM k_janji,users WHERE users.email = '$pasien' ORDER BY k_janji.Tanggal DESC LIMIT 5")->result();
			}
			return $query;
		}
	}
?>