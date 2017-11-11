<?php
	/**
	* 
	*/
	class Laporan_pemasukan extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Laporan');
		}
		function index(){
			$tgl = "
				<tr>
					<th>Dari Tanggal <input type='date' name='tgl1'></th>
					<th>Sampai Tanggal <input type='date' name='tgl2'></th>
					<th><input type='submit' value='Cek'></th>
				</tr>
			";
			$kapan = "Bulan Ini";
			$cetak = "<tr>
                        <th><a href='".base_url('Laporan_pemasukan/cetak')."' class='button button-primary'  target='_blank'>CETAK</a></th>
                    </tr>'";
			$data = [
				'pemasukan' => $this->Laporan->pemasukan(),
				'cetak' => $cetak,
				'tgl' => $tgl,
				'kapan' => $kapan
			];
			$this->load->view('admin/tema2');
			$this->load->view('laporan',$data);
		}
		function cetak(){
			$cetak = "";
			$data = [
				'pemasukan' => $this->Laporan->pemasukan(),
				'cetak' => $cetak,
				'kapan' => 'Bulan Ini'
			];
			echo "<script>window.print()</script>";
			$this->load->view('laporan',$data);
		}
		function priode(){
			$tgl = "
				<tr>
					<th>Dari Tanggal <input type='date' name='tgl1'></th>
					<th>Sampai Tanggal <input type='date' name='tgl2'></th>
					<th><input type='submit' value='Cek'></th>
				</tr>
			";
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			$kapan = "Dari $tgl1 Sampai $tgl2";

			$cetak = "<tr>
                        <th><a href='".base_url('Laporan_pemasukan/cetak2/'.$tgl1."/".$tgl2)."' class='button button-primary'  target='_blank'>CETAK</a></th>
                    </tr>'";
			
			$data = [
				'pemasukan' => $this->Laporan->priode($tgl1,$tgl2,'keluar'),
								'cetak' => $cetak,
				'tgl' => $tgl,
				'kapan' => $kapan

			];
			$this->load->view('admin/tema2');
			$this->load->view('laporan',$data);
		}
		function cetak2(){
			$cetak = "";
			$tgl1 = $this->uri->segment(3);
			$tgl2 = $this->uri->segment(4);
			$data = [
				'pemasukan' => $this->Laporan->priode($tgl1,$tgl2,'keluar'),
				'cetak' => $cetak,
				'kapan' => "Dari $tgl1 Sampai $tgl2",
				'tgl' => ''
			];
			echo "<script>window.print()</script>";
			$this->load->view('laporan',$data);
		}
	}
?>