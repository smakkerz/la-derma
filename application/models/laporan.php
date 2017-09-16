<?php
	/**
	* 
	*/
	class Laporan extends CI_Model
	{
		
		function __construct()
    {
        parent::__construct();
    }
    function graphobt(){
    	$data = $this->db->get('k_obat');
    	return $data->result();
    }
    function pemasukan(){
    	 $this->db->select('*');
        $this->db->like('date','2017-');
        $this->db->order_by('date','asc');
        return $this->db->get('transaksi')->result();
    }
	}
?>