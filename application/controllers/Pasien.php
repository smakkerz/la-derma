<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pasien/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pasien/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pasien/index.html';
            $config['first_url'] = base_url() . 'pasien/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pasien_model->total_rows($q);
        $pasien = $this->Pasien_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pasien_data' => $pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/tema2');
        $this->load->view('pasien_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pasien' => $row->id_pasien,
		'identitas' => $row->identitas,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'user' => $row->user,
		'pass' => $row->pass,
		'sex' => $row->sex,
		'birth_date' => $row->birth_date,
		'status' => $row->status,
	    );
            $this->load->view('admin/tema2');
            $this->load->view('pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pasien/create_action'),
	    'id_pasien' => set_value('id_pasien'),
	    'identitas' => set_value('identitas'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'user' => set_value('user'),
	    'pass' => set_value('pass'),
	    'sex' => set_value('sex'),
	    'birth_date' => set_value('birth_date'),
	    'status' => set_value('status'),
	);
        $this->load->view('admin/tema2');
        $this->load->view('pasien_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'identitas' => $this->input->post('identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );
        $username = $this->input->post('user',TRUE);
        $password = $this->input->post('pass',TRUE);
        $email = $this->input->post('user',TRUE);
        $additional_data = array(
                                'first_name' => $this->input->post('identitas', TRUE),
                                'last_name' => $this->input->post('nama', TRUE),
                                );
        $group = array('5'); // Sets user to pasien.

        $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            $this->Pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pasien'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasien/update_action'),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'identitas' => set_value('identitas', $row->identitas),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'user' => set_value('user', $row->user),
		'pass' => set_value('pass', $row->pass),
		'sex' => set_value('sex', $row->sex),
		'birth_date' => set_value('birth_date', $row->birth_date),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('admin/tema2');
            $this->load->view('pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pasien', TRUE));
        } else {
            $data = array(
		'identitas' => $this->input->post('identitas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pasien_model->update($this->input->post('id_pasien', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasien'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $this->Pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('identitas', 'identitas', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');
	$this->form_validation->set_rules('sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "pasien.xls";
        $judul = "pasien";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Identitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "User");
	xlsWriteLabel($tablehead, $kolomhead++, "Pass");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "Birth Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->identitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pass);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sex);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birth_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pasien.doc");

        $data = array(
            'pasien_data' => $this->Pasien_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pasien_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'pasien_data' => $this->Pasien_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('pasien_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('pasien.pdf', 'D'); 
    }

}

