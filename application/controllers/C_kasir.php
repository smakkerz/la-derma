<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class C_kasir extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language','nuris_helper'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
        $this->load->model('K_kasir');
        $this->load->library('form_validation');
		}
		public function index()
		{
			$data = [
			'obat' => $this->K_kasir->obt(),
			'a' => $this->K_kasir->pasien()
			];
			$this->template->load('template','kasir_form',$data);
		}
		public function p()
		{
			$get = $this->uri->segment(3);
			$data = [
			'rows' => $this->K_kasir->row($get),
			'obat' => $this->K_kasir->obt(),
			'a' => $this->K_kasir->pasien(),
			'rinci' => $this->K_kasir->rincian($get),
			];
			$this->template->load('template','p',$data);
		}
		public function tx_list()
		{
			$data = [
				'list' => $this->K_kasir->tx_list(),

			];
			$this->template->load('template','tx_list',$data);
		}
		public function tmbh()
		{
			$user = $this->ion_auth->user()->row();
			$users = $user->email;
			$faktur = $this->K_kasir->faktur();
			$data2 = [
				'idTransaksi' => $faktur,
				'idPasien' => $this->input->post('kd_pasien'),
				'idDokter' => $this->input->post('kd_dokter'),
				'status' => 'Pending',
				'idCreate' => $users,
				'date' => date('Y-m-d'),
			];

			$data = [
				'idTransaksi' => $faktur,
				'KodeBarang' => $this->input->post('id_obat'),
				'qty' => $this->input->post('qty_produk'),
				'subtotal' => $this->input->post('totalharga_produk')
			];
			$this->K_kasir->tambah($data,$data2);
			redirect ('c_kasir/p/'.$faktur);
		}
		public function get_harga()
		{
			$id_obat = $this->input->post('id_obat');
			$HargaObat = $this->K_kasir->harga($id_obat);
			foreach ($HargaObat as $obatH) {
				echo "<input type='text' name='harga' id='harga' value='$obatH->harga' class='form-control a2'>";
			}
		}
		public function tambh()
		{	
			$data = [
				'idTransaksi' => $this->input->post('faktur'),
				'KodeBarang' => $this->input->post('id_obat'),
				'qty' => $this->input->post('qty_produk'),
				'subtotal' => $this->input->post('totalharga_produk')
			];
			$this->K_kasir->tambah2($data);
			redirect ('c_kasir/p/'.$this->input->post('faktur'));
		}
		public function bayar()
		{
			$faktur =  $this->input->post('faktur');

			if ($this->input->post('btn') == "Bayar") {
				$status = "Lunas";
				$data = [
				'idTransaksi' => $faktur,
				'total_bayar' => $this->input->post('ubayar'),
				'metode' => $this->input->post('metode_pembayaran'),
				'status' => $status,
			];
			$this->K_kasir->bayar($data);
			redirect('c_kasir/cetak/'.$faktur);
			}else{
				$status = "Pending";
				$data = [
					'idTransaksi' => $faktur,
					'status' => $status,
					'total_bayar' => 0,
				];
			$this->K_kasir->bayar($data);
			redirect('c_kasir');
			}
		}
		public function cetak()
		{
			$get = $this->uri->segment(3);
			$data = [
			'rows' => $this->K_kasir->row($get),
			'obat' => $this->K_kasir->obt(),
			'a' => $this->K_kasir->pasien(),
			'rinci' => $this->K_kasir->rincian($get),
			];
			$this->load->view('cetak',$data);
		}
	}
?>