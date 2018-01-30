<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_rmedis_model extends CI_Model
{

    public $table = 'k_rmedis';
    public $id = 'k_rmedis.id_rmedis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('k_tindakan','k_tindakan.id_tindakan = k_rmedis.id_tindakan');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('k_tindakan','k_tindakan.id_tindakan = k_rmedis.id_tindakan');

        $this->db->where($this->id, $id);
               
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_rmedis', $q);
	$this->db->or_like('id_tindakan', $q);
	$this->db->or_like('id_pasien', $q);
	$this->db->or_like('diagnosa', $q);
	$this->db->or_like('keluhan', $q);
	$this->db->or_like('resep', $q);
	$this->db->or_like('waktu', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('id_pengguna', $q);
	$this->db->or_like('id_dokter', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_rmedis', $q);
	$this->db->or_like('id_tindakan', $q);
	$this->db->or_like('id_pasien', $q);
	$this->db->or_like('diagnosa', $q);
	$this->db->or_like('keluhan', $q);
	$this->db->or_like('resep', $q);
	$this->db->or_like('waktu', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('id_pengguna', $q);
	$this->db->or_like('id_dokter', $q);
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
    function tindakan()
    {
        return $this->db->get('k_tindakan')->result();
    }

}