<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_Jadwal extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $c_jadwal = $this->Jadwal_model->get_all();

        $data = array(
            'c_jadwal_data' => $c_jadwal
        );

        $this->load->view('admin/tema2');
        $this->load->view('jadwal_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idJadwal' => $row->idJadwal,
		'idDokter' => $row->idDokter,
        'tanggal' => $row->tanggal,
		'DariJam' => $row->DariJam,
		'SampaiJam' => $row->SampaiJam,
	    );
           $this->load->view('admin/tema2');
        $this->load->view('jadwal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Jadwal'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('C_Jadwal/create_action'),
	    'idJadwal' => set_value('idJadwal'),
	    'idDokter' => '',
        'tanggal' => set_value('tanggal'),
	    'DariJam' => set_value('DariJam'),
	    'SampaiJam' => set_value('SampaiJam'),
	);
        $this->load->view('admin/tema2');
        $this->load->view('jadwal_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idDokter' => $this->input->post('idDokter',TRUE),
        'tanggal' => $this->input->post('tanggal', TRUE), 
		'DariJam' => $this->input->post('DariJam',TRUE),
		'SampaiJam' => $this->input->post('SampaiJam',TRUE),
	    );

            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('C_Jadwal'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('C_Jadwal/update_action'),
		'idJadwal' => set_value('idJadwal', $row->idJadwal),
		'idDokter' => set_value('idDokter', $row->idDokter),
        'tanggal' => set_value('tanggal', $row->tanggal),
		'DariJam' => set_value('DariJam', $row->DariJam),
		'SampaiJam' => set_value('SampaiJam', $row->SampaiJam),
	    );
            $this->load->view('admin/tema2');
        $this->load->view('jadwal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Jadwal'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idJadwal', TRUE));
        } else {
            $data = array(
		'idDokter' => $this->input->post('idDokter',TRUE),
        'tanggal' => $this->input->post('tanggal',TRUE),
		'DariJam' => $this->input->post('DariJam',TRUE),
		'SampaiJam' => $this->input->post('SampaiJam',TRUE),
	    );

            $this->Jadwal_model->update($this->input->post('idJadwal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('C_Jadwal'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('C_Jadwal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('C_Jadwal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idDokter', 'iddokter', 'trim|required');
    $this->form_validation->set_rules('tanggal','tanggal','trim|required');
	$this->form_validation->set_rules('DariJam', 'darijam', 'trim|required');
	$this->form_validation->set_rules('SampaiJam', 'sampaijam', 'trim|required');

	$this->form_validation->set_rules('idJadwal', 'idJadwal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "jadwal.xls";
        $judul = "jadwal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "IdDokter");
	xlsWriteLabel($tablehead, $kolomhead++, "Hari, Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "DariJam");
	xlsWriteLabel($tablehead, $kolomhead++, "SampaiJam");

	foreach ($this->Jadwal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idDokter);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Hari, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DariJam);
	    xlsWriteLabel($tablebody, $kolombody++, $data->SampaiJam);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

