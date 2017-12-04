<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Karyawanld extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawanld_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $Karyawanld = $this->Karyawanld_model->get_all();

        $data = array(
            'Karyawanld_data' => $Karyawanld
        );

        $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Karyawanld_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nik' => $row->nik,
		'nama_karyawan' => $row->nama_karyawan,
		'email_karyawan' => $row->email_karyawan,
		'jk' => $row->jk,
		'alamat_karyawan' => $row->alamat_karyawan,
	    );
            $this->load->view('admin/tema2');
        $this->load->view('admin/karyawan/karyawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawanld'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $groups=$this->ion_auth->groups()->result_array();        
        $data = array(
        'currentGroups' => 'Pilih Jabatan',
        'groups' => $groups,
            'button' => 'Create',
            'action' => site_url('Karyawanld/create_action'),
	    'nik' => set_value('nik'),
	    'nama_karyawan' => set_value('nama_karyawan'),
	    'email_karyawan' => set_value('email_karyawan'),
	    'jk' => set_value('jk'),
	    'alamat_karyawan' => set_value('alamat_karyawan'),
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
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'email_karyawan' => $this->input->post('email_karyawan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat_karyawan' => $this->input->post('alamat_karyawan',TRUE),
	    );

            $this->Karyawanld_model->insert($data);
            $username = $this->input->post('email_karyawan',TRUE);
        $password = $this->input->post('password',TRUE);
        $email = $this->input->post('email_karyawan',TRUE);
        $additional_data = array(
                                'first_name' => $this->input->post('nama_karyawan',TRUE));
        $g = $this->input->post('groups');
        $group = array($g);

        $this->ion_auth->register($username, $password, $email, $additional_data, $group);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Karyawanld'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Karyawanld_model->get_by_id($id);

        if ($row) {
            $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();
        $data = array(
        'groups' => $groups,
        'currentGroups' => $currentGroups,
                'button' => 'Update',
                'action' => site_url('Karyawanld/update_action'),
		'nik' => set_value('nik', $row->nik),
		'nama_karyawan' => set_value('nama_karyawan', $row->nama_karyawan),
		'email_karyawan' => set_value('email_karyawan', $row->email_karyawan),
		'jk' => set_value('jk', $row->jk),
		'alamat_karyawan' => set_value('alamat_karyawan', $row->alamat_karyawan),
	    );
            $this->load->view('admin/tema2');
            $this->load->view('admin/karyawan/edit_karyawan', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawanld'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik', TRUE));
        } else {
            $data = array(
		'nama_karyawan' => $this->input->post('nama_karyawan',TRUE),
		'email_karyawan' => $this->input->post('email_karyawan',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'alamat_karyawan' => $this->input->post('alamat_karyawan',TRUE),
	    );
            $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }

                    }
            $this->Karyawanld_model->update($this->input->post('nik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Karyawanld'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Karyawanld_model->get_by_id($id);

        if ($row) {
            $this->Karyawanld_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Karyawanld'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Karyawanld'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_karyawan', 'nama karyawan', 'trim|required');
	$this->form_validation->set_rules('email_karyawan', 'email karyawan', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('alamat_karyawan', 'alamat karyawan', 'trim|required');

	$this->form_validation->set_rules('nik', 'nik', 'trim');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Karyawan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jk");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Karyawan");

	foreach ($this->Karyawanld_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_karyawan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_karyawan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
        $data = array(
            'karyawan_data' => $this->Karyawanld_model->get_all(),
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

