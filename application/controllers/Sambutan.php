<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Sambutan_model', 'sambutan');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_sambutan'] = $this->sambutan->get_all();

		$data['title'] = 'Sambutan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('artikel/sambutan/data', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->sambutan->get_by_id($id);

        $data = array(
        	'id' => set_value('id', $row->id),
        	'isi_sambutan' => set_value('isi_sambutan', $row->isi_sambutan),
        );

        $list['title'] = 'Edit Sambutan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('artikel/sambutan/edit', $data);
       	$this->load->view('templates/footer');
	}

	public function edit_data($id)
	{
		$data = [
			'isi_sambutan'     	=> $this->input->post('isi_sambutan'),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('sambutan_kepala', $data);
		$this->session->set_flashdata('flash', 'Data Berhasil Diubah!');
       	redirect('sambutan');
	}
}