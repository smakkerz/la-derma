<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelola_pesan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Percakapan_model');
        $this->load->library('form_validation');
        $this->load->model('K_pesan_model');

    }

    public function index()
    {
        $kelola_pesan = $this->Percakapan_model->get_all();

        $data = array(
            'kelola_pesan_data' => $kelola_pesan
        );

        $this->load->view('admin/tema2');
        $this->load->view('percakapan_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->Percakapan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_percakapan' => $row->id_percakapan,
		'judul' => $row->judul,
		'dari' => $row->dari,
		'untuk' => $row->untuk,
        'baca' => $this->K_pesan_model->get_pesan($id)
	    );
            $this->load->view('admin/tema2');
            $this->load->view('percakapan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kelola_pesan'));
        }
    }
        
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->Percakapan_model->get_by_id($id);

        if ($row) {
            $this->Percakapan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Kelola_pesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kelola_pesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('dari', 'dari', 'trim|required');
	$this->form_validation->set_rules('untuk', 'untuk', 'trim|required');

	$this->form_validation->set_rules('id_percakapan', 'id_percakapan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

