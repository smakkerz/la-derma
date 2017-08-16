<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_obat extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_obat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kategori_obat = $this->Kategori_obat_model->get_all();

        $data = array(
            'kategori_obat_data' => $kategori_obat
        );

        $this->template->load('template','kategori_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Kategori_obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kategori_obat' => $row->kategori_obat,
		'kategori' => $row->kategori,
	    );
        $this->template->load('template','kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_obat'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_obat/create_action'),
	    'kategori_obat' => set_value('kategori_obat'),
	    'kategori' => set_value('kategori'),
	);
        $this->template->load('template','kategori_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori_obat' => $this->input->post('kategori_obat',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_obat'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Kategori_obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_obat/update_action'),
		'kategori_obat' => set_value('kategori_obat', $row->kategori_obat),
		'kategori' => set_value('kategori', $row->kategori),
	    );
            $this->template->load('template','kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_obat'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'kategori_obat' => $this->input->post('kategori_obat',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
	    );

            $this->Kategori_obat_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_obat'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Kategori_obat_model->get_by_id($id);

        if ($row) {
            $this->Kategori_obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_obat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori_obat', 'kategori obat', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori.xls";
        $judul = "kategori";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");

	foreach ($this->Kategori_obat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kategori_obat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori.doc");

        $data = array(
            'kategori_data' => $this->Kategori_obat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kategori_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'kategori_data' => $this->Kategori_obat_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('kategori_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('kategori.pdf', 'D'); 
    }

}

