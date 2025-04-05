<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Agenda_model', 'agenda');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_agenda'] = $this->agenda->get_all();

		$data['title'] = 'Agenda';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('artikel/agenda/data', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data = [
				'nama_agenda'     		=> $this->input->post('nama_agenda'),
				'tgl_agenda'    		=> $this->input->post('tgl_agenda'),
				'jam'    				=> $this->input->post('jam'),
				'kordinator_lapangan'	=> $this->input->post('kordinator_lapangan'),
				'lokasi_kegiatan' 		=> $this->input->post('lokasi_kegiatan'),
		];
		$this->db->insert('agenda', $data);
		$this->session->set_flashdata('flash', 'Data Ditambahkan!');
       	redirect('agenda');
	}

	public function edit_data($id)
	{
		$data = [
				'nama_agenda'     		=> $this->input->post('nama_agenda'),
				'tgl_agenda'    		=> $this->input->post('tgl_agenda'),
				'jam'    				=> $this->input->post('jam'),
				'kordinator_lapangan'	=> $this->input->post('kordinator_lapangan'),
				'lokasi_kegiatan' 		=> $this->input->post('lokasi_kegiatan'),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('agenda', $data);
		$this->session->set_flashdata('flash', 'Data Berhasil Diubah!');
       	redirect('agenda');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->agenda->hapus($where, 'agenda');
		$this->session->set_flashdata('flash', 'Data Agenda dihapus');
		redirect('agenda');
	}
}