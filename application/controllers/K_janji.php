<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_janji extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_janji_model');
        $this->load->library('form_validation');
       $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language','nuris_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->model('K_kasir');
    }

    public function index()
    {
        $k_janji = $this->K_janji_model->get_all();

        $data = array(
            'k_janji_data' => $k_janji,
            'a' => $this->K_kasir->pasien(),
        );

        $this->template->load('template','k_janji_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_janji_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kj' => $row->id_kj,
		'id_pasien' => $row->id_pasien,
		'idDokter' => $row->idDokter,
		'Tanggal' => $row->Tanggal,
		'Jam' => $row->Jam,
		'IdPengguna' => $row->IdPengguna,

	    );
            $this->template->load('template','k_janji_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_janji'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_janji/create_action'),
	    'id_kj' => set_value('id_kj'),
	    'id_pasien' => set_value('id_pasien'),
	    'idDokter' => set_value('idDokter'),
	    'Tanggal' => set_value('Tanggal'),
	    'Jam' => set_value('Jam'),
	    'IdPengguna' => set_value('IdPengguna'),
        'a' => $this->K_kasir->pasien(),
	);
        $this->template->load('template','k_janji_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'idDokter' => $this->input->post('idDokter',TRUE),
		'Tanggal' => $this->input->post('Tanggal',TRUE),
		'Jam' => $this->input->post('Jam',TRUE),
		'IdPengguna' => $this->input->post('IdPengguna',TRUE),
	    );

            $this->K_janji_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_janji'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_janji_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_janji/update_action'),
		'id_kj' => set_value('id_kj', $row->id_kj),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'idDokter' => set_value('idDokter', $row->idDokter),
		'Tanggal' => set_value('Tanggal', $row->Tanggal),
		'Jam' => set_value('Jam', $row->Jam),
		'IdPengguna' => set_value('IdPengguna', $row->IdPengguna),
        'a' => $this->K_kasir->pasien(),
	    );
            $this->template->load('template','k_janji_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_janji'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kj', TRUE));
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'idDokter' => $this->input->post('idDokter',TRUE),
		'Tanggal' => $this->input->post('Tanggal',TRUE),
		'Jam' => $this->input->post('Jam',TRUE),
		'IdPengguna' => $this->input->post('IdPengguna',TRUE),
	    );

            $this->K_janji_model->update($this->input->post('id_kj', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_janji'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_janji_model->get_by_id($id);

        if ($row) {
            $this->K_janji_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_janji'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_janji'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	$this->form_validation->set_rules('idDokter', 'iddokter', 'trim|required');
	$this->form_validation->set_rules('Tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('Jam', 'jam', 'trim|required');
	$this->form_validation->set_rules('IdPengguna', 'idpengguna', 'trim|required');

	$this->form_validation->set_rules('id_kj', 'id_kj', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "k_janji.xls";
        $judul = "k_janji";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "IdDokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam");
	xlsWriteLabel($tablehead, $kolomhead++, "IdPengguna");

	foreach ($this->K_janji_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idDokter);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Jam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->IdPengguna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
        $data = array(
            'k_janji_data' => $this->K_janji_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('k_janji_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('k_janji.pdf', 'D'); 
    }

}

