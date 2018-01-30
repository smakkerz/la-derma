<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawanld_model extends CI_Model
{

    public $table = 'karyawan';
    public $id = 'nik';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nik', $q);
	$this->db->or_like('nama_karyawan', $q);
	$this->db->or_like('email_karyawan', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('alamat_karyawan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nik', $q);
	$this->db->or_like('nama_karyawan', $q);
	$this->db->or_like('email_karyawan', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('alamat_karyawan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    // cek grup karyawan
    function cek_group($email)
    {
        $user = $this->db->get_where('users',array('email' => $email))->row();
        return $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
    }
}