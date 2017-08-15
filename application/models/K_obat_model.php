<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_obat_model extends CI_Model
{

    public $table = 'k_obat';
    public $id = 'id_obat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('kategori', 'k_obat.kategori_obat = kategori.kategori_obat');
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
        $this->db->like('id_obat', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kategori_obat', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('manufaktur', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('expired', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_obat', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('kategori_obat', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('stock', $q);
	$this->db->or_like('manufaktur', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('expired', $q);
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