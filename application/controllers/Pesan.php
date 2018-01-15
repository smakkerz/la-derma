<?php
	/**
	* Controller Pesan
	*/
	class Pesan extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('K_pesan_model');
		}
		//inbox
		function index()
		{
			$data = [
				'list_percakapan' => $this->K_pesan_model->list_percakapan(),
			];
			$this->template->load('template','c_pesan_list',$data);
		}
		//new convensation
		function baru()
		{
			$data = [
				'penerima' => $this->K_pesan_model->penerima(),
			];
			$this->template->load('template','c_pesan_baru',$data);
		}
		//send new convensation
		function kirim_baru()
		{
			$pengirim = $this->ion_auth->user()->row();
			$pengirim = $pengirim->email;
			$jam = date('Y-m-d H:i:s');
			$data1 = [
				'judul' => $this->input->post('judul', TRUE),
				'dari' => $pengirim,
				'untuk' => $this->input->post('penerima',TRUE),
			];
			$max = $this->db->query("SELECT MAX(id_percakapan) as last FROM percakapan")->row();
			$id_percakapan = $max->last;
			$id_percakapan = $id_percakapan+1;
			$data2 = [
				'id_percakapan' => $id_percakapan,
				'dari' => $pengirim,
				'pesan' => $this->input->post('pesan',TRUE),
				'jam' => $jam,
			];
			$this->K_pesan_model->insert('percakapan',$data1);
			$this->K_pesan_model->insert('pesan',$data2);
			redirect('Pesan/chat/'.$id_percakapan,'refresh');
		}
		//chatroom
		function chat()
		{
			$id = $this->uri->segment(3);
			$data = [
				'list_percakapan' => $this->K_pesan_model->list_percakapan(),
				'pesan' => $this->K_pesan_model->get_pesan($id),
				//'reply' => $this->K_pesan_model->reply($id),
			];
			$this->template->load('template','c_pesan_baca',$data);
		}
		//balas pesan
		function balas_pesan()
		{
			$id_percakapan = $this->input->post('id_percakapan',TRUE);
			$jam = date('Y-m-d H:i:s');
			$dari = $this->input->post('dari',TRUE);
			$pesan = $this->input->post('pesan',TRUE);
			$data = [
				'id_percakapan' => $id_percakapan,
				'jam' => $jam,
				'dari' => $dari,
				'pesan' => $pesan,
			];
			$this->K_pesan_model->insert('pesan',$data);
			redirect('Pesan/chat/'.$id_percakapan,'refresh');
		}

		//validation
		public function _rules() 
    	{
			$this->form_validation->set_rules('judul', 'judul', 'trim|required');
			$this->form_validation->set_rules('pengirim','pengirim','trim|required');
			$this->form_validation->set_rules('penerima','penerima','trim|required');
			$this->form_validation->set_rules('pesan','pesan','trim|required');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   		}
	}
?>