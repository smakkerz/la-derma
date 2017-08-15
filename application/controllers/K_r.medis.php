<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_r.medis extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_r.medis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_r.medis/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_r.medis/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_r.medis/index.html';
            $config['first_url'] = base_url() . 'k_r.medis/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_r.medis_model->total_rows($q);
        $k_r.medis = $this->K_r.medis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_r.medis_data' => $k_r.medis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_r.medis_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_r.medis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_r.medis' => $row->id_r.medis,
		'id_tindakan' => $row->id_tindakan,
		'id_pasien' => $row->id_pasien,
		'diagnosa' => $row->diagnosa,
		'keluhan' => $row->keluhan,
		'resep' => $row->resep,
		'waktu' => $row->waktu,
		'keterangan' => $row->keterangan,
		'id_pengguna' => $row->id_pengguna,
	    );
            $this->template->load('template','k_r.medis_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_r.medis'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_r.medis/create_action'),
	    'id_r.medis' => set_value('id_r.medis'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'id_pasien' => set_value('id_pasien'),
	    'diagnosa' => set_value('diagnosa'),
	    'keluhan' => set_value('keluhan'),
	    'resep' => set_value('resep'),
	    'waktu' => set_value('waktu'),
	    'keterangan' => set_value('keterangan'),
	    'id_pengguna' => set_value('id_pengguna'),
	);
        $this->template->load('template','k_r.medis_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'diagnosa' => $this->input->post('diagnosa',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'resep' => $this->input->post('resep',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
	    );

            $this->K_r.medis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_r.medis'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_r.medis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_r.medis/update_action'),
		'id_r.medis' => set_value('id_r.medis', $row->id_r.medis),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'diagnosa' => set_value('diagnosa', $row->diagnosa),
		'keluhan' => set_value('keluhan', $row->keluhan),
		'resep' => set_value('resep', $row->resep),
		'waktu' => set_value('waktu', $row->waktu),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
	    );
            $this->template->load('template','k_r.medis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_r.medis'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_r.medis', TRUE));
        } else {
            $data = array(
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'diagnosa' => $this->input->post('diagnosa',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'resep' => $this->input->post('resep',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
	    );

            $this->K_r.medis_model->update($this->input->post('id_r.medis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_r.medis'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_r.medis_model->get_by_id($id);

        if ($row) {
            $this->K_r.medis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_r.medis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_r.medis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tindakan', 'id tindakan', 'trim|required');
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	$this->form_validation->set_rules('diagnosa', 'diagnosa', 'trim|required');
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
	$this->form_validation->set_rules('resep', 'resep', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('id_pengguna', 'id pengguna', 'trim|required');

	$this->form_validation->set_rules('id_r.medis', 'id_r.medis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

