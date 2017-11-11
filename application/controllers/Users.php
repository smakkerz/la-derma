<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth')); 
		$this->data['informasi'] = $this->informasi->web();
		$this->lang->load('auth');
		if (!$this->ion_auth->is_admin()) {
			redirect('auth','refresh');
		}
    }

    public function index()
    {
        $this->data['users_data'] = $this->ion_auth->users(1)->result();
			foreach ($this->data['users_data'] as $k => $user)
			{
				$this->data['users_data'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
        $this->load->view('admin/tema2');
        $this->load->view('admin/F3-27/users_list',$this->data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ip_address' => $row->ip_address,
		'username' => $row->username,
		'password' => $row->password,
		'salt' => $row->salt,
		'email' => $row->email,
		'activation_code' => $row->activation_code,
		'forgotten_password_code' => $row->forgotten_password_code,
		'forgotten_password_time' => $row->forgotten_password_time,
		'remember_code' => $row->remember_code,
		'created_on' => $row->created_on,
		'last_login' => $row->last_login,
		'active' => $row->active,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'company' => $row->company,
		'phone' => $row->phone,
	    );
            $this->load->view('admin/tema2');
        $this->load->view('admin/F3-27/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	);
        $this->load->view('admin/tema2');
        $this->load->view('admin/F3-27/users_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$email = $this->input->post('username',TRUE);
		$additional_data = array(
								'first_name' => $this->input->post('first_name',TRUE),
								'last_name' => $this->input->post('last_name',TRUE),
								);
		$group = array('1'); // Sets user to admin.

		$this->ion_auth->register($username, $password, $email, $additional_data, $group);
            redirect('users','refresh');
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
	    );
        $this->load->view('admin/tema2');
        $this->load->view('admin/F3-27/users_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        
        $id = $this->input->post('id',TRUE);
		$data = array(
					'first_name' => $this->input->post('first_name',TRUE),
					'last_name' => $this->input->post('last_name',TRUE),
					'password' => $this->input->post('password',TRUE),
					 );
		$this->ion_auth->update($id, $data);
		redirect('users','refresh');
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ip_address', 'ip address', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('salt', 'salt', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('activation_code', 'activation code', 'trim|required');
	$this->form_validation->set_rules('forgotten_password_code', 'forgotten password code', 'trim|required');
	$this->form_validation->set_rules('forgotten_password_time', 'forgotten password time', 'trim|required');
	$this->form_validation->set_rules('remember_code', 'remember code', 'trim|required');
	$this->form_validation->set_rules('created_on', 'created on', 'trim|required');
	$this->form_validation->set_rules('last_login', 'last login', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('company', 'company', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
            $this->data['users_data'] = $this->ion_auth->users(1)->result();
			foreach ($this->data['users_data'] as $k => $user)
			{
				$this->data['users_data'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('admin/F3-27/users_pdf', $this->data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('users.pdf', 'D'); 
    }

}

