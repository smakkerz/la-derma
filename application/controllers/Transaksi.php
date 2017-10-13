<?php
class transaksi extends ci_controller{
    
        function __construct() {
        parent::__construct();
        $this->load->model(array('model_barang','model_transaksi'));
    }
    
    function index()
    {
        if(isset($_POST['submit']))
        {
            $this->model_transaksi->simpan_barang();
            redirect('transaksi');
        }
        else if (isset($_POST['selesai'])) {
            $users = $this->ion_auth->user()->row();
            $tanggal=date('Y-m-d');
            $user=  $users->email;
            $pasien = $this->input->post('pasien');
            $dokter = $this->input->post('dokter');
            $data=array('pasien_email' => $pasien,'dokter_email' => $dokter,'operator_id'=>$user,'tanggal_transaksi'=>$tanggal);
            $this->model_transaksi->selesai_belanja($data);
            redirect('transaksi');
        }
        else
        {
            $data['user']=  $this->ion_auth->users();
            $data['barang']=  $this->model_barang->tampil_data();
            $data['detail']=  $this->model_transaksi->tampilkan_detail_transaksi()->result();
            $this->load->view('admin/tema2');
            $this->load->view('transaksi/form_transaksi',$data);
        }
    }
    
    
    function hapusitem()
    {
        $id=  $this->uri->segment(3);
        $this->model_transaksi->hapusitem($id);
        redirect('transaksi');
    }
    
    
    function selesai_belanja()
    {
        $users = $this->ion_auth->user()->row();
        $tanggal=date('Y-m-d');
        $user=  $users->email;
        $data=array('pasien_email' => $pasien,'dokter_email' => $dokter,'operator_id'=>$user,'tanggal_transaksi'=>$tanggal);
        $this->model_transaksi->selesai_belanja($data);
        redirect('transaksi');
    }
    
    
    function laporan()
    {
        if(isset($_POST['submit']))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['record']=  $this->model_transaksi->laporan_periode($tanggal1,$tanggal2);
            $this->load->view('admin/tema2');
            $this->load->view('transaksi/laporan',$data);

        }
        else
        {
            $data['record']=  $this->model_transaksi->laporan_default();
            $this->load->view('admin/tema2');
            $this->load->view('transaksi/laporan',$data);
        }
    }
    
    
    function excel()
    {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record']=  $this->model_transaksi->laporan_default();
        $this->load->view('transaksi/laporan_excel',$data);
    }
    
    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_transaksi->laporan_default();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $r->tanggal_transaksi, 1,0);
            $pdf->Cell(30, 7, $r->nama_lengkap, 1,0);
            $pdf->Cell(38, 7, $r->total, 1,1);
            $no++;
            $total=$total+$r->total;
        }
        // end
        $pdf->Cell(67,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0);
        $pdf->Output();
    }
}