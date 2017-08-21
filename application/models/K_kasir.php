<?php
	/**
	* 
	*/
	class K_kasir extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function obt()
		{
			return $this->db->get('k_obat')->result();
		}
		function faktur()
		{
				$this->db->order_by('idTransaksi','DESC');
				$this->db->get_where('transaksi',array('date' => 'current_date' , ));
				$data = $this->db->get('transaksi')->result();

				foreach ($data as $row) {
					$tx = explode('.', $row->idTransaksi);
					$antri = $tx[1];
				}
				$date = date('Y-m-d');
				$cekantri = $this->db->query("SELECT COUNT(*) as jml FROM transaksi WHERE date = '$date'")->result();
				foreach ($cekantri as $cek) {
					if ($cek->jml == 0) {
						$antri = $cek->jml+1;
					}else{
						$antri = $antri+1;
					}
				}
				$d = date('d');
				$my = date('mY');
				$newfaktur = $d.".00".$antri.".".$my.".LD";
				return $newfaktur;
		}
		function tambah($data,$data2)
		{
			$this->db->insert('rincian',$data);
			$this->db->insert('transaksi',$data2);
		}
		function row($id)
		{
			$this->db->select('transaksi.*,transaksi.status as status_tx,rincian.*,pasien.nama as nama_pasien,pasien.*');
			$this->db->from('rincian');
			$this->db->join('k_obat','k_obat.id_obat = rincian.KodeBarang');
			$this->db->join('transaksi', 'rincian.idTransaksi = transaksi.idTransaksi');
			$this->db->join('pasien','transaksi.idPasien = pasien.id_pasien');
			$this->db->where('rincian.idTransaksi',$id);
			$this->db->limit(1);
			return $query = $this->db->get()->result();
		}
		function tx_list()
		{
			$this->db->order_by('idTransaksi', 'DESC');
			return $this->db->get('transaksi')->result();
		}
		function princian_addo($data)
		{
			$id = $data['idTransaksi'];
			$obt = $data['KodeBarang'];

			$query = $this->db->query("SELECT COUNT(*) as jml FROM rincian WHERE idTransaksi = '$id' AND KodeBarang = '$obt'")->result();
			foreach ($query as $row) {
				$num_row = $row->jml;
			
			if ($num_row == "0") {
				$this->db->insert('rincian',$data);
			}else{
				$this->db->set('qty', $data['qty'], FALSE);
				$this->db->where(array('idTransaksi' => $data['idTransaksi'], 'KodeBarang' => $data['KodeBarang']));
				$this->db->update('rincian'); 
			}
			}
		}
		function hapus_rinciano($data)
		{
			$this->db->delete('rincian', $data);
		}
		function bayar($data)
		{
			$id = $data['idTransaksi'];
			$this->db->set($data, FALSE);
			$this->db->where('idTransaksi', $id);
			$this->db->update('transaksi'); 
		}
		function harga($id_obat)
		{
			$q = $this->db->query("SELECT harga FROM k_obat WHERE id_obat = '$id_obat'");
			if ($q->num_rows() > 0) {
				foreach ($q->result() as $row) {
					$data[] = $row;
				}
			}else{
				$data = 0;
			}
			return $data;
		}
		function pasien()
		{
			return $this->db->get('pasien')->result();
		}
		function paket()
		{
			return $this->db->get('k_paket');
		}
		function rincian($faktur)
		{
			$this->db->select('*');
			$this->db->from('rincian');
			$this->db->join('k_obat','k_obat.id_obat = rincian.KodeBarang');
			$this->db->where('rincian.idTransaksi',$faktur);
			return $query = $this->db->get()->result();
		}
		function sum($tb,$fd,$wh,$whid)
		{
			return $this->db->query("SELECT SUM($fd) as jml FROM $tb WHERE $wh = '$whid'")->result();
		}
		function tambah2($data)
		{
			$this->db->insert('rincian',$data);
		}
	}
?>