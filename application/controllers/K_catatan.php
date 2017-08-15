<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_catatan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_catatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_catatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_catatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_catatan/index.html';
            $config['first_url'] = base_url() . 'k_catatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_catatan_model->total_rows($q);
        $k_catatan = $this->K_catatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_catatan_data' => $k_catatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_catatan_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_catatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_catatan' => $row->id_catatan,
		'catatan' => $row->catatan,
		'id_pengguna' => $row->id_pengguna,
		'id_pasien' => $row->id_pasien,
		'status_catatan' => $row->status_catatan,
	    );
            $this->template->load('template','k_catatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_catatan'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_catatan/create_action'),
	    'id_catatan' => set_value('id_catatan'),
	    'catatan' => set_value('catatan'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'id_pasien' => set_value('id_pasien'),
	    'status_catatan' => set_value('status_catatan'),
	);
        $this->template->load('template','k_catatan_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'catatan' => $this->input->post('catatan',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'status_catatan' => $this->input->post('status_catatan',TRUE),
	    );

            $this->K_catatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_catatan'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_catatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_catatan/update_action'),
		'id_catatan' => set_value('id_catatan', $row->id_catatan),
		'catatan' => set_value('catatan', $row->catatan),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'status_catatan' => set_value('status_catatan', $row->status_catatan),
	    );
            $this->template->load('template','k_catatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_catatan'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_catatan', TRUE));
        } else {
            $data = array(
		'catatan' => $this->input->post('catatan',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'status_catatan' => $this->input->post('status_catatan',TRUE),
	    );

            $this->K_catatan_model->update($this->input->post('id_catatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_catatan'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_catatan_model->get_by_id($id);

        if ($row) {
            $this->K_catatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_catatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_catatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');
	$this->form_validation->set_rules('id_pengguna', 'id pengguna', 'trim|required');
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	$this->form_validation->set_rules('status_catatan', 'status catatan', 'trim|required');

	$this->form_validation->set_rules('id_catatan', 'id_catatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

