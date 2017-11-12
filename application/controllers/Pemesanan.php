<?php 
	/**
	* 
	*/
	class Pemesanan extends CI_Controller
	{
		
		function __construct() {
        parent::__construct();
        $this->load->model(array('model_barang','model_pemesanan'));
    }
    
    function index()
    {
        if(isset($_POST['submit']))
        {
            $this->model_pemesanan->simpan_barang();
            redirect('Pemesanan');
        }
        else if (isset($_POST['selesai'])) {
            $users = $this->ion_auth->user()->row();
            $tanggal=date('Y-m-d');
            $user=  $users->email;
            $pasien = $this->input->post('pasien');
            $dokter = $this->input->post('dokter');
            $data=array('pasien_email' => $pasien,'dokter_email' => $dokter,'operator_id'=>$user,'tanggal_transaksi'=>$tanggal);
            $this->model_pemesanan->selesai_belanja($data);
            redirect('Pemesanan');
        }
        else
        {
            $data['pemesanan']=  $this->model_pemesanan->tampil_pesanan();
            $data['barang']=  $this->model_barang->tampil_data();
            $data['detail']=  $this->model_pemesanan->tampilkan_detail_transaksi()->result();
            $this->load->view('admin/tema2');
            $this->load->view('admin/F3-17/index',$data);
        }
    }
    
    
    function hapusitem()
    {
        $id=  $this->uri->segment(3);
        $this->model_pemesanan->hapusitem($id);
        redirect('Pemesanan');
    }
    
    
    function selesai_belanja()
    {
        $this->model_pemesanan->selesai_belanja($data);
        redirect('Pemesanan');
    }
    function set_lunas()
    {
    	$id = $this->uri->segment(3);
    	$this->model_pemesanan->lunas($id);
    	redirect('Pemesanan','refresh');
    }
    function set_batallunas()
    {
    	$id = $this->uri->segment(3);
    	$this->model_pemesanan->batal($id);
    	redirect('Pemesanan','refresh');
    }
	}
?>