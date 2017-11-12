<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arus_kas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Arus_kas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $arus_kas = $this->Arus_kas_model->get_all();

        $data = array(
            'arus_kas_data' => $arus_kas
        );

        $this->load->view('admin/tema2');
        $this->load->view('admin/arus_kas/arus_kas_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Arus_kas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'transaksi' => $row->transaksi,
		'idtransaksi' => $row->idtransaksi,
		'IdPengguna' => $row->IdPengguna,
		'waktu' => $row->waktu,
		'masuk' => $row->masuk,
		'keluar' => $row->keluar,
		'keterangan' => $row->keterangan,
		'verifikasi' => $row->verifikasi,
	    );
            $this->load->view('admin/tema2');
            $this->load->view('admin/arus_kas/arus_kas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arus_kas'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('arus_kas/create_action'),
	    'id' => set_value('id'),
	    'transaksi' => set_value('transaksi'),
	    'idtransaksi' => set_value('idtransaksi'),
	    'IdPengguna' => set_value('IdPengguna'),
	    'waktu' => set_value('waktu'),
	    'masuk' => set_value('masuk'),
	    'keluar' => set_value('keluar'),
	    'keterangan' => set_value('keterangan'),
	    'verifikasi' => set_value('verifikasi'),
	);
        $this->load->view('admin/tema2');
        $this->load->view('admin/arus_kas/arus_kas_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'transaksi' => $this->input->post('transaksi',TRUE),
		'idtransaksi' => $this->input->post('idtransaksi',TRUE),
		'IdPengguna' => $this->input->post('IdPengguna',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'masuk' => $this->input->post('masuk',TRUE),
		'keluar' => $this->input->post('keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'verifikasi' => $this->input->post('verifikasi',TRUE),
	    );

            $this->Arus_kas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('arus_kas'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Arus_kas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('arus_kas/update_action'),
		'id' => set_value('id', $row->id),
		'transaksi' => set_value('transaksi', $row->transaksi),
		'idtransaksi' => set_value('idtransaksi', $row->idtransaksi),
		'IdPengguna' => set_value('IdPengguna', $row->IdPengguna),
		'waktu' => set_value('waktu', $row->waktu),
		'masuk' => set_value('masuk', $row->masuk),
		'keluar' => set_value('keluar', $row->keluar),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'verifikasi' => set_value('verifikasi', $row->verifikasi),
	    );
            $this->load->view('admin/tema2');
            $this->load->view('admin/arus_kas/arus_kas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arus_kas'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'transaksi' => $this->input->post('transaksi',TRUE),
		'idtransaksi' => $this->input->post('idtransaksi',TRUE),
		'IdPengguna' => $this->input->post('IdPengguna',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'masuk' => $this->input->post('masuk',TRUE),
		'keluar' => $this->input->post('keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'verifikasi' => $this->input->post('verifikasi',TRUE),
	    );

            $this->Arus_kas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('arus_kas'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Arus_kas_model->get_by_id($id);

        if ($row) {
            $this->Arus_kas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('arus_kas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arus_kas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('transaksi', 'transaksi', 'trim|required');
	$this->form_validation->set_rules('idtransaksi', 'idtransaksi', 'trim|required');
	$this->form_validation->set_rules('IdPengguna', 'idpengguna', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('masuk', 'masuk', 'trim|required|numeric');
	$this->form_validation->set_rules('keluar', 'keluar', 'trim|required|numeric');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('verifikasi', 'verifikasi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "arus_kas.xls";
        $judul = "arus_kas";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Idtransaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "IdPengguna");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluar");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Verifikasi");

	foreach ($this->Arus_kas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idtransaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdPengguna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
	    xlsWriteNumber($tablebody, $kolombody++, $data->masuk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->keluar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->verifikasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
        $data = array(
            'arus_kas_data' => $this->Arus_kas_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('arus_kas_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('arus_kas.pdf', 'D'); 
    }

}

