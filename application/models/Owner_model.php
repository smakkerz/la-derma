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
		function transaksi()
		{
			$this->db->order_by('tanggal_transaksi','DESC');
			return $this->db->get('transaksi')->result();
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
		function pengeluaran()
		{
			$this->db->select_sum('keluar');
			return $this->db->get('arus_kas')->result();
		}
		function hutang()
		{
			$this->db->select_sum('keluar');
			return $this->db->get_where('arus_kas',array('transaksi'=>'Hutang'))->result();
		}
		function graph()
		{
		$data = $this->db->query("SELECT *,SUM(masuk) as pemasukan, SUM(keluar) as pengeluaran FROM arus_kas");
			return $data->result();
		}
		function graph_priode($dari,$sd)
		{
		$data = $this->db->query("SELECT *,SUM(masuk) as pemasukan, SUM(keluar) as pengeluaran FROM arus_kas WHERE waktu BETWEEN '$dari' AND '$sd'");
			return $data->result();
		}
		function last_login()
		{
			$this->db->order_by('last_login','DESC');
			return $this->db->get('users',10)->result();
		}
		function stok()
		{
			return $this->db->query("SELECT * FROM barang JOIN kategori_barang ON barang.kategori_id = kategori_barang.kategori_id WHERE kategori_barang.nama_kategori != 'Pelayanan'")->result();
		}
		function priode($tgl1,$tgl2){
        $query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_transaksi BETWEEN '$tgl1' AND '$tgl2'");
        return $query->result();
    }
	}
?>