<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class K_obat extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('K_obat_model');
        $this->load->model('Kategori_obat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $k_obat = $this->K_obat_model->get_all();

        $data = array(
            'k_obat_data' => $k_obat
        );

        $this->template->load('template','k_obat_list', $data);
    }

    public function read($id) //fungsi tampil data
    {
        $row = $this->K_obat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_obat' => $row->id_obat,
		'nama' => $row->nama,
		'kategori_obat' => $row->kategori_obat,
		'deskripsi' => $row->deskripsi,
		'stock' => $row->stock,
		'manufaktur' => $row->manufaktur,
		'harga' => $row->harga,
		'status' => $row->status,
		'expired' => $row->expired,
	    );
            $this->template->load('template','k_obat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_obat'));
        }
    }

    public function create()  //fungsi tambah data
    {   
        $kategori_obat = $this->Kategori_obat_model->get_all();
        
        $data = array(
            'kategori_obat_data' => $kategori_obat,
            'button' => 'Create',
            'action' => site_url('k_obat/create_action'),
	    'id_obat' => set_value('id_obat'),
	    'nama' => set_value('nama'),
	    'kategori_obat' => set_value('kategori_obat'),
	    'deskripsi' => set_value('deskripsi'),
	    'stock' => set_value('stock'),
	    'manufaktur' => set_value('manufaktur'),
	    'harga' => set_value('harga'),
	    'status' => set_value('status'),
	    'expired' => set_value('expired'),
	);
        $this->template->load('template','k_obat_form', $data);
    }
    
    public function create_action() //fungsi validasi sebelum ditambah data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'kategori_obat' => $this->input->post('kategori_obat',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'manufaktur' => $this->input->post('manufaktur',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'expired' => $this->input->post('expired',TRUE),
	    );

            $this->K_obat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('k_obat'));
        }
    }
    
    public function update($id)  //fungsi perbarui data
    {
        $row = $this->K_obat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('k_obat/update_action'),
		'id_obat' => set_value('id_obat', $row->id_obat),
		'nama' => set_value('nama', $row->nama),
		'kategori_obat' => set_value('kategori_obat', $row->kategori_obat),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'stock' => set_value('stock', $row->stock),
		'manufaktur' => set_value('manufaktur', $row->manufaktur),
		'harga' => set_value('harga', $row->harga),
		'status' => set_value('status', $row->status),
		'expired' => set_value('expired', $row->expired),
	    );
            $this->template->load('template','k_obat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_obat'));
        }
    }
    
    public function update_action() //fungsi validasi sebelum diperbarui data
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_obat', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'kategori_obat' => $this->input->post('kategori_obat',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'manufaktur' => $this->input->post('manufaktur',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'status' => $this->input->post('status',TRUE),
		'expired' => $this->input->post('expired',TRUE),
	    );

            $this->K_obat_model->update($this->input->post('id_obat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('k_obat'));
        }
    }
    
    public function delete($id)  //fungsi hapus data
    {
        $row = $this->K_obat_model->get_by_id($id);

        if ($row) {
            $this->K_obat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('k_obat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('k_obat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kategori_obat', 'kategori obat', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('stock', 'stock', 'trim|required');
	$this->form_validation->set_rules('manufaktur', 'manufaktur', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('expired', 'expired', 'trim|required');

	$this->form_validation->set_rules('id_obat', 'id_obat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()  //fungsi untuk export data ke format excel
    {
        $this->load->helper('exportexcel');
        $namaFile = "k_obat.xls";
        $judul = "k_obat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Stock");
	xlsWriteLabel($tablehead, $kolomhead++, "Manufaktur");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Expired");

	foreach ($this->K_obat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kategori_obat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stock);
	    xlsWriteLabel($tablebody, $kolombody++, $data->manufaktur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expired);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=k_obat.doc");

        $data = array(
            'k_obat_data' => $this->K_obat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('k_obat_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'k_obat_data' => $this->K_obat_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('k_obat_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('k_obat.pdf', 'D'); 
    }

}

