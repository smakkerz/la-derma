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
        $date = date('Y-m');
        $awal = $date."-01";
    	$query = $this->db->query("SELECT * FROM arus_kas WHERE keluar = '0' AND waktu BETWEEN $awal AND CURRENT_DATE()");
        return $query->result();
    }
    function pengeluaran(){
        $date = date('Y-m');
        $awal = $date."-01";
        $query = $this->db->query("SELECT idtransaksi,waktu,IdPengguna,keluar as masuk,keterangan FROM arus_kas WHERE masuk = '0' AND waktu BETWEEN $awal AND CURRENT_DATE()");
        return $query->result();
    }
    function priode($tgl1,$tgl2,$type){
        $query = $this->db->query("SELECT * FROM arus_kas WHERE $type = '0' AND waktu BETWEEN '$tgl1' AND '$tgl2'");
        return $query->result();
    }
	}
?>