<?php
	/**
	* 
	*/
	class C_kasir extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
        $this->load->model('K_kasir');
        $this->load->library('form_validation');
		}
		public function index()
		{
			$data = [
			'obat' => $this->K_kasir->obt(),
			];
			$this->template->load('template','kasir_form',$data);
		}
		public function next()
		{
			$faktur = $this->K_kasir->faktur();
			$pasien = $this->input->post('kd_pasien');
			$dokter = $this->input->post('kd_dokter');
			$create = $this->ion_auth->user()->row();
			$user =  $create->email;
			$date = date('Y-m-d');

			$data = [
				'idTransaksi' => $faktur,
				'idPasien' => $pasien,
				'idDokter' => $dokter,
				'idCreate' => $user,
				'status' => "Pending",
				'date' => $date
			];
			$this->K_kasir->next($data);
			redirect("c_kasir/step2/".$faktur);
		}
		public function step2()
		{
			$data = [
				'faktur' => $this->uri->segment(3),
				'data2' => $this->K_kasir->step2($this->uri->segment(3)),
				'obat' => $this->K_kasir->obt(),
				'data3' => $this->K_kasir->rincian_tx(),
			];

			$this->template->load('template','kasir_step2',$data);
		}
		public function tx_list()
		{
			$data = [
				'list' => $this->K_kasir->tx_list(),

			];
			$this->template->load('template','tx_list',$data);
		}
		public function princian_add()
		{
			$data = [
				'idTransaksi' => $this->input->post('idtx'),
				'KodeBarang' => $this->input->post('t_obt'),
				'qty' => $this->input->post('qty'),
			];
			$this->K_kasir->princian_addo($data);
			redirect('c_kasir/step2/'.$this->input->post('idtx'));
		}
		public function hapus_rincian(){
			$data = ['id' => $this->uri->segment(3)];
			$this->K_kasir->hapus_rinciano($data);
			redirect('c_kasir/step2/'.$this->uri->segment(4));
		}
		public function step3(){
			$this->K_kasir->updatestep3($this->uri->segment(3));
			$data = [
				'faktur' => $this->uri->segment(3),
				'data2' => $this->K_kasir->step2($this->uri->segment(3)),
				'obat' => $this->K_kasir->obt(),
				'data3' => $this->K_kasir->rincian_tx(),
			];
			$this->template->load('template','kasir_step3',$data);
		}
		public function bayar()
		{
			$data = [
				'idTransaksi' => $this->input->post('idTransaksi'),
				'total_bayar' => $this->input->post('byar'),
				'status' => 'Lunas',
			];
			$this->K_kasir->bayar($data);
			redirect('c_kasir/step3/'.$this->input->post('idTransaksi'));
		}
	}
?>