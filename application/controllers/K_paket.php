<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_paket extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_paket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_paket/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_paket/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_paket/index.html';
            $config['first_url'] = base_url() . 'k_paket/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_paket_model->total_rows($q);
        $k_paket = $this->K_paket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_paket_data' => $k_paket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_paket_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_paket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_paket' => $row->id_paket,
		'layanan' => $row->layanan,
		'deskripsi' => $row->deskripsi,
		'harga' => $row->harga,
	    );
            $this->template->load('template','k_paket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_paket'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_paket/create_action'),
	    'id_paket' => set_value('id_paket'),
	    'layanan' => set_value('layanan'),
	    'deskripsi' => set_value('deskripsi'),
	    'harga' => set_value('harga'),
	);
        $this->template->load('template','k_paket_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'layanan' => $this->input->post('layanan',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->K_paket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_paket'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_paket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_paket/update_action'),
		'id_paket' => set_value('id_paket', $row->id_paket),
		'layanan' => set_value('layanan', $row->layanan),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->template->load('template','k_paket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_paket'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_paket', TRUE));
        } else {
            $data = array(
		'layanan' => $this->input->post('layanan',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->K_paket_model->update($this->input->post('id_paket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_paket'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_paket_model->get_by_id($id);

        if ($row) {
            $this->K_paket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_paket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_paket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('layanan', 'layanan', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_paket', 'id_paket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

