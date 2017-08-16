<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_tindakan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_tindakan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_tindakan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_tindakan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_tindakan/index.html';
            $config['first_url'] = base_url() . 'k_tindakan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_tindakan_model->total_rows($q);
        $k_tindakan = $this->K_tindakan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_tindakan_data' => $k_tindakan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_tindakan_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_tindakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tindakan' => $row->id_tindakan,
		'tindakan' => $row->tindakan,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','k_tindakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_tindakan'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_tindakan/create_action'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'tindakan' => set_value('tindakan'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','k_tindakan_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tindakan' => $this->input->post('tindakan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->K_tindakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_tindakan'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_tindakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_tindakan/update_action'),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'tindakan' => set_value('tindakan', $row->tindakan),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','k_tindakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_tindakan'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tindakan', TRUE));
        } else {
            $data = array(
		'tindakan' => $this->input->post('tindakan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->K_tindakan_model->update($this->input->post('id_tindakan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_tindakan'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_tindakan_model->get_by_id($id);

        if ($row) {
            $this->K_tindakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_tindakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_tindakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tindakan', 'tindakan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_tindakan', 'id_tindakan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

