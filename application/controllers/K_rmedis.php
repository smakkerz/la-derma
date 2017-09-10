<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_rmedis extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_rmedis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'k_rmedis/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'k_rmedis/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'k_rmedis/index.html';
            $config['first_url'] = base_url() . 'k_rmedis/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->K_rmedis_model->total_rows($q);
        $k_rmedis = $this->K_rmedis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'k_rmedis_data' => $k_rmedis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','k_rmedis_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_rmedis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rmedis' => $row->id_rmedis,
		'id_tindakan' => $row->id_tindakan,
		'id_pasien' => $row->id_pasien,
		'diagnosa' => $row->diagnosa,
		'keluhan' => $row->keluhan,
		'resep' => $row->resep,
		'waktu' => $row->waktu,
		'keterangan' => $row->keterangan,
		'id_pengguna' => $row->id_pengguna,
	    );
            $this->template->load('template','k_rmedis_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_rmedis'));
        }
    }

    public function create()  //fungsi tambah data
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('k_rmedis/create_action'),
	    'id_rmedis' => set_value('id_rmedis'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'id_pasien' => set_value('id_pasien'),
	    'diagnosa' => set_value('diagnosa'),
	    'keluhan' => set_value('keluhan'),
	    'resep' => set_value('resep'),
	    'waktu' => set_value('waktu'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','k_rmedis_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $user = $this->ion_auth->user()->row();
        $id_pengguna = $user->email;
        $data = array(
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'diagnosa' => $this->input->post('diagnosa',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'resep' => $this->input->post('resep',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'id_pengguna' => $id_pengguna,
	    );

            $this->K_rmedis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_rmedis'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_rmedis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_rmedis/update_action'),
		'id_rmedis' => set_value('id_rmedis', $row->id_rmedis),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'diagnosa' => set_value('diagnosa', $row->diagnosa),
		'keluhan' => set_value('keluhan', $row->keluhan),
		'resep' => set_value('resep', $row->resep),
		'waktu' => set_value('waktu', $row->waktu),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','k_rmedis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_rmedis'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rmedis', TRUE));
        } else {
            $data = array(
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'diagnosa' => $this->input->post('diagnosa',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'resep' => $this->input->post('resep',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->K_rmedis_model->update($this->input->post('id_rmedis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_rmedis'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_rmedis_model->get_by_id($id);

        if ($row) {
            $this->K_rmedis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_rmedis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_rmedis'));
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

	$this->form_validation->set_rules('id_rmedis', 'id_rmedis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "k_rmedis.xls";
        $judul = "k_rmedis";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Diagnosa");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluhan");
	xlsWriteLabel($tablehead, $kolomhead++, "Resep");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pengguna");

	foreach ($this->K_rmedis_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->diagnosa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluhan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->resep);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pengguna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=k_rmedis.doc");

        $data = array(
            'k_rmedis_data' => $this->K_rmedis_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('k_rmedis_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'k_rmedis_data' => $this->K_rmedis_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('k_rmedis_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('k_rmedis.pdf', 'D'); 
    }

}

