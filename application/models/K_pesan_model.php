<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_pesan_model extends CI_Model
{
	function get_all_admin(){
		return $this->db->get('percakapan')->result();
	}
	//membuat id_percakapan
	function id_percakapan()
	{
		$query = $this->db->query("SELECT MAX(id_percakapan) as id FROM msg")->row();
		$id = $query->id;
		$id = $id+1;
		$id = sprintf('%032s', $id);

		return $id;
	}
	//Mengambil data penerima pesan != User Login
	function penerima()
	{
		$user = $this->ion_auth->user()->row();
		$email = $user->email;
		$query = $this->db->query("SELECT email,first_name,last_name FROM users WHERE email != '$email'");
		return $query->result();
	}
	//input model
	function insert($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}
	//ambil pesan
	function get_pesan($id)
	{
		$this->db->where('id_percakapan',$id);
		$this->db->order_by('id_pesan','DESC');
		return $this->db->get('pesan',10)->result();
	}
	//ambil list percakapan
	function list_percakapan()
	{
		$pengirim = $this->ion_auth->user()->row();
		$pengirim = $pengirim->email;
		return $this->db->query("SELECT id_percakapan,judul,dari,untuk FROM percakapan WHERE dari = '$pengirim' OR untuk ='$pengirim' GROUP BY id_percakapan ORDER BY id_percakapan DESC")->result();
	}
}