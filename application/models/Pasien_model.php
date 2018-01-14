<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien_model extends CI_Model
{

    public $table = 'pasien';
    public $id = 'id_pasien';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function idpasien()
    {
    	$cek = $this->db->query("SELECT MAX(id_pasien) as id, COUNT(id_pasien) as jml FROM pasien")->row();
        $tahun_now = date('Y');
        $bulan_now = date('m');
        $antrian = $cek->id;
        $pecah = explode('-', $antrian);
        
        $antri = substr($pecah[1],4,4);
        $antri = $antri+1;
        $antri = sprintf('%05s', $antri);

    	if ($cek->jml == 0) {
    		return $id = "LD-".$tahun_now."0001".$bulan_now;
    	}else{
            return $id = "LD-".$tahun_now.$antri.$bulan_now;
        }
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
        $this->db->like('id_pasien', $q);
	$this->db->or_like('identitas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('pass', $q);
	$this->db->or_like('sex', $q);
	$this->db->or_like('birth_date', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pasien', $q);
	$this->db->or_like('identitas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('pass', $q);
	$this->db->or_like('sex', $q);
	$this->db->or_like('birth_date', $q);
	$this->db->or_like('status', $q);
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

}