<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_pesan_model extends CI_Model
{
	function get_all_admin(){
		return $this->db->get('percakapan')->result();
	}
	function inbox(){
		$usern = $this->ion_auth->user()->row();
		$user = $usern->email;
		$this->db->where('percakapan.untuk',$user);
		$this->db->order_by('id_percakapan','DESC');
		$query = $this->db->get('percakapan');
		return $query->result();
	}
	function outbox(){
		$usern = $this->ion_auth->user()->row();
		$user = $usern->email;
		$this->db->where('percakapan.dari',$user);
		$this->db->order_by('id_percakapan','DESC');
		$query = $this->db->get('percakapan');
		return $query->result();
	}
	function baca($id){
		$this->db->where('pesan.id_percakapan',$id);
		return $this->db->get('pesan')->result();
	}
	function get($id){
		$this->db->order_by('id_pesan','ASC');
		$this->db->limit(1);
		$query = $this->db->get('pesan');
		return $query->result();
	}
	function judul($id)
	{
		$this->db->where('id_percakapan',$id);
		return $this->db->get('percakapan')->result();
	}
	function kirim($data)
	{
		$this->db->insert('pesan',$data);
	}
	function buat_pesan($data)
	{
		$this->db->insert('percakapan',$data);
	}
	function hapus($id)
	{
		$tables = array('pesan', 'percakapan');
		$this->db->where('id_percakapan', $id);
		$this->db->delete($tables);
	}
}