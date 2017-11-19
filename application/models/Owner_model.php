<?php
	/**
	* Class Model Owner
	*/
	class Owner_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function transaksi_trakhir()
		{
			$this->db->order_by('tanggal_transaksi','DESC');
			return $this->db->get('transaksi', 10)->result();
		}
		function keuntungan()
		{
			$this->db->select_sum('masuk');
			return $this->db->get('arus_kas')->result();
		}
		function hutang()
		{
			$this->db->select_sum('keluar');
			return $this->db->get_where('arus_kas',array('transaksi'=>'Hutang'))->result();
		}
		function last_login()
		{
			$this->db->order_by('last_login','DESC');
			return $this->db->get('users',10)->result();
		}
	}
?>