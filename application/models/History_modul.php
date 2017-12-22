<?php
	/**
	* 
	*/
	class History_modul extends CI_Model
	{
		
		function __construct()
		{
			# code...
		}
		function get_tx()
		{
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('transaksi_detail','transaksi.transaksi_id = transaksi_detail.transaksi_id');
			$this->db->join('arus_kas','transaksi.transaksi_id = arus_kas.idtransaksi');
			$tglnow = date('Y-m-d');
			//$this->db->where('transaksi.tanggal_transaksi <', $tglnow);
			return $query = $this->db->get()->result();
		}
		function get_kj()
		{
			$this->db->select('*');
			$this->db->from('k_janji');
			$tglnow = date('Y-m-d');
			$this->db->where('Tanggal <', $tglnow);
			return $query = $this->db->get()->result();
		}
	}
?>