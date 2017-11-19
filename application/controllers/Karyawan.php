<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $karyawan = $this->Karyawan_model->get_all();

        $data = array(
            'karyawan_data' => $karyawan
        );

        $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Karyawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nik' => $row->nik,
		'nama_karyawan' => $row->nama_karyawan,
		'email_karyawan' => $row->email_karyawan,
		'jk' => $row->jk,
		'alamat_karyawan' => $row->alamat_karyawan,
		'jabatan' => $row->jabatan,
	    );
            $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('karyawan/create_action'),
	    'nik' => $this->Karyawan_model->nik(),
	    'nama_karyawan' => set_value('nama_karyawan'),
	    'email_karyawan' => set_value('email_karyawan'),
	    'jk' => set_value('jk'),
	    'alamat_karyawan' => set_value('alamat_karyawan'),
	    'jabatan' => set_value('jabatan'),
	);
        $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'email_karyawan' => $this->input->post('email_karyawan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat_karyawan' => $this->input->post('alamat_karyawan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Karyawan_model->insert($data);
            $username = $this->input->post('email_karyawan', TRUE);
            $password = $this->input->post('password', TRUE);
            $additional_data = array(
            'first_name' => $this->input->post('nama_karyawan',TRUE));

            if ($this->input->post('jabatan') == "Admin") {
                $g = "1";
            }elseif ($this->input->post('jabatan') == "Dokter") {
                $g = "3";
            }elseif ($this->input->post('jabatan') == "Owner") {
                $g = "4";
            }
            $group = array($g);

        $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('karyawan/update_action'),
		'nik' => set_value('nik', $row->nik),
		'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
		'email_karyawan' => set_value('email_karyawan', $row->email_karyawan),
		'jk' => set_value('jk', $row->jk),
		'alamat_karyawan' => set_value('alamat_karyawan', $row->alamat_karyawan),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
            $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'email_karyawan' => $this->input->post('email_karyawan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat_karyawan' => $this->input->post('alamat_karyawan',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Karyawan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('karyawan'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Karyawan_model->get_by_id($id);

        if ($row) {
            $this->Karyawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('karyawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	$this->form_validation->set_rules('email_karyawan', 'email karyawan', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('alamat_karyawan', 'alamat karyawan', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "karyawan.xls";
        $judul = "karyawan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jk");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");

	foreach ($this->Karyawan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->alamat_karyawan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jabatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
        $data = array(
            'karyawan_data' => $this->Karyawan_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('karyawan_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('karyawan.pdf', 'D'); 
    }

}

