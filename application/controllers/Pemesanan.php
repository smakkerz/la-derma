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
            $data['pemesanan']=  $this->model_pemesanan->tampil_pesanan();
            $data['barang']=  $this->model_barang->tampil_data();
            $data['detail']=  $this->model_pemesanan->tampilkan_detail_transaksi()->result();
            $this->load->view('admin/tema2');
            $this->load->view('admin/F3-17/step1',$data);
        }
        function step1_next()
        {
            $dokter = $this->input->post('dokter');
            $pasien = $this->input->post('pasien');
            $this->session->set_userdata('dokter',$dokter);
            $this->session->set_userdata('pasien',$pasien);
            redirect('Pemesanan/step2');
        }
    function step2()
    {
        if(isset($_POST['submit']))
        {
            $this->model_pemesanan->simpan_barang();
            redirect('Pemesanan/step2');
        }
        else if (isset($_POST['selesai'])) {
            $faktur = $this->model_pemesanan->faktur();
            $users = $this->ion_auth->user()->row();
            $tanggal=date('Y-m-d');
            $user=  $users->email;
            $pasien = $this->input->post('pasien');
            $dokter = $this->input->post('dokter');
            $data=array('transaksi_id'=>$faktur,'pasien_email' => $pasien,'dokter_email' => $dokter,'operator_id'=>$user,'tanggal_transaksi'=>$tanggal,'jenis'=>'Pemesanan');
            $this->model_pemesanan->selesai_belanja($data);
            redirect('Pemesanan');
        }
        else
        {
            $data = [
                'dokter' => $this->session->userdata('dokter'),
                'pasien' => $this->session->userdata('pasien'),
                'jenis' => $this->session->userdata('jenis')
            ];
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
        redirect('Pemesanan/step2');
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
    function invoice()
    {
        $id = $this->uri->segment(3);
        $data = [
            'data' => $this->model_pemesanan->invoice($id)
        ];
        $this->load->view('transaksi');
    }
	}
?>