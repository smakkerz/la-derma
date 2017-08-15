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
				
				$antri = $antri+1;
				$d = date('d');
				$my = date('mY');
				$newfaktur = $d.".00".$antri.".".$my.".LD";
				return $newfaktur;
			

		}
		function next($data)
		{
			$query = $this->db->insert('transaksi',$data);
		}
		function step2($id)
		{
			$this->db->where('idTransaksi',$id);
			return $this->db->get('transaksi')->result();
		}
		function tx_list()
		{
			$this->db->order_by('idTransaksi', 'DESC');
			return $this->db->get('transaksi')->result();
		}
		function rincian_tx()
		{
			$id = $this->uri->segment(3);
			$this->db->select('*');
			$this->db->from('rincian');
			$this->db->join('k_obat','k_obat.id_obat = rincian.KodeBarang');
			$this->db->where('rincian.idTransaksi',$id);
			return $query = $this->db->get()->result();
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
		function updatestep3($id)
		{
			$this->db->where('idTransaksi',$id);
			$query = $this->db->get('transaksi')->result();
			foreach ($query as $data) {
				$status = $data->status;
			}
			if ($status == "Pending") {
				$this->db->set('status', "'Terjual'", FALSE);
				$this->db->where('idTransaksi', $id);
				$this->db->update('transaksi'); 
			}
		}
		function bayar($data)
		{
			$id = $data['idTransaksi'];
			$this->db->set($data, FALSE);
			$this->db->where('idTransaksi', $id);
			$this->db->update('transaksi'); 
		}
	}
?>