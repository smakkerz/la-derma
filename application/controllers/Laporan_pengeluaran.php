<?php
	/**
	* 
	*/
	class Laporan_pengeluaran extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Laporan');
		}
		function index(){
			$tgl = "
				<tr>
					<th>Dari Tanggal <input type='date' class='input-control iconic' name='tgl1'></th>
					<th>Sampai Tanggal <input type='date' class='input-control iconic' name='tgl2'></th>
					<th colspan='3'><input type='submit' class='button primary' value='Cek'></th>
				</tr>
			";
			$kapan = "Pengeluaran Bulan Ini";
			$cetak = "<tr>
                        <th><a href='".base_url('Laporan_pengeluaran/cetak')."' class='button primary'  target='_blank'>CETAK</a></th>
                    </tr>'";
			$data = [
				'pemasukan' => $this->Laporan->pengeluaran(),
				'cetak' => $cetak,
				'tgl' => $tgl,
				'kapan' => $kapan,
				'jenis' => 'Keluar'
			];
			$this->load->view('admin/tema2');
			$this->load->view('laporan',$data);
		}
		function cetak(){
			$cetak = "";
			$data = [
				'pemasukan' => $this->Laporan->pengeluaran(),
				'cetak' => $cetak,
				'kapan' => 'Bulan Ini',
				'tgl' => '',
				'jenis' => 'Keluar'
			];
			ini_set('memory_limit', '32M');
        	$html = $this->load->view('laporan', $data, true);
        	$this->load->library('pdf');
        	$pdf = $this->pdf->load();
        	$pdf->WriteHTML($html);
        	$pdf->Output('Laporan Pengeluaran.pdf', 'D');
		}
		function priode(){
			$tgl = "
				<tr>
					<th>Dari Tanggal <input type='date' class='input-control iconic' name='tgl1'></th>
					<th>Sampai Tanggal <input type='date' class='input-control iconic' name='tgl2'></th>
					<th colspan='3'><input type='submit' class='button primary' value='Cek'></th>
				</tr>
			";
			$tgl1 = $this->input->post('tgl1');
			$tgl2 = $this->input->post('tgl2');
			$kapan = "Pengeluaran Dari $tgl1 Sampai $tgl2";

			$cetak = "<tr>
                        <th><a href='".base_url('Laporan_pemasukan/cetak2/'.$tgl1."/".$tgl2)."' class='button primary'  target='_blank'>CETAK</a></th>
                    </tr>'";
			
			$data = [
				'pemasukan' => $this->Laporan->priode($tgl1,$tgl2,'masuk'),
								'cetak' => $cetak,
				'tgl' => $tgl,
				'kapan' => $kapan,
				'jenis' => 'Keluar'

			];
			$this->load->view('admin/tema2');
			$this->load->view('laporan',$data);
		}
		function cetak2(){
			$cetak = "";
			$tgl1 = $this->uri->segment(3);
			$tgl2 = $this->uri->segment(4);
			$data = [
				'pemasukan' => $this->Laporan->priode($tgl1,$tgl2,'masuk'),
				'cetak' => $cetak,
				'kapan' => "Pengeluaran Dari $tgl1 Sampai $tgl2",
				'tgl' => '',
				'jenis' => 'Keluar'
			];
			ini_set('memory_limit', '32M');
        	$html = $this->load->view('laporan', $data, true);
        	$this->load->library('pdf');
        	$pdf = $this->pdf->load();
        	$pdf->WriteHTML($html);
        	$pdf->Output('Laporan Pengeluaran.pdf', 'D');
		}
	}
?>