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
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_janji/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_janji/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_janji/index.html';
            $config['first_url'] = base_url() . 'k_janji/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_janji_model->total_rows($q);
        $k_janji = $this->K_janji_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_janji_data' => $k_janji,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_janji_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_janji_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kj' => $row->id_kj,
		'waktu_janji' => $row->waktu_janji,
		'id_pengguna' => $row->id_pengguna,
		'id_pasien' => $row->id_pasien,
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
	    'waktu_janji' => set_value('waktu_janji'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'id_pasien' => set_value('id_pasien'),
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
		'waktu_janji' => $this->input->post('waktu_janji',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
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
		'waktu_janji' => set_value('waktu_janji', $row->waktu_janji),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
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
		'waktu_janji' => $this->input->post('waktu_janji',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
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
	$this->form_validation->set_rules('waktu_janji', 'waktu janji', 'trim|required');
	$this->form_validation->set_rules('id_pengguna', 'id pengguna', 'trim|required');
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');

	$this->form_validation->set_rules('id_kj', 'id_kj', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

