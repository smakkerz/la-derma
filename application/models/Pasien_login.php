<?php
	/**
	* 
	*/
	class Pasien_login extends CI_Model
	{
		function kunjungan()
		{
			$user = $this->ion_auth->user()->row();
			$this->db->where('id_pasien',$user->email);
			$this->db->order_by('id_kj','DESC');
			return $this->db->get('k_janji',5)->result();
		}
		function dokter_kunjungan($id){
			$get = $this->db->get_where('users',array('email' => $id ))->row();
			return $get->first_name." ".$get->last_name;
		}
		function rmedisfive()
		{

			$user = $this->ion_auth->user()->row();
			$this->db->where('id_pasien',$user->email);
			$this->db->order_by('id_rmedis','DESC');
			$this->db->join('k_tindakan','k_tindakan.id_tindakan = k_rmedis.id_tindakan');

			return $this->db->get('k_rmedis',5)->result();
		}
		function rmedis()
		{
			$user = $this->ion_auth->user()->row();
			$this->db->where('id_pasien',$user->email);
			$this->db->order_by('id_rmedis','DESC');
			return $this->db->get('k_rmedis',5)->result();
		}
		function medis_detail()
		{
			$id = $this->uri->segment(3);
			$this->db->where('id_rmedis',$id);
			return $this->db->get('k_rmedis');
		}
		function profil($id)
		{
			$this->db->where('user',$id);
			return $this->db->get('pasien')->row();
		}
		function jadwal()
		{
			$this->db->where('tanggal>=',date('Y-m-d'));
			$this->db->join('users','users.email = jadwal.idDokter');
			return $this->db->get('jadwal')->result();
		}
	}
?>