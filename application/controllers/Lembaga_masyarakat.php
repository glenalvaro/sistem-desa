<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga_masyarakat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Lembaga_masyarakat_model', 'lembaga');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_lembaga'] = $this->lembaga->get_all();

		$data['title'] = 'Lembaga Masyarakat';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('lembaga_masyarakat/table', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['title'] = 'Lembaga Masyarakat';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('lembaga_masyarakat/form', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data = [
				'nama'     	=> $this->input->post('nama'),
				'user'    	=> $this->input->post('user'),
				'isi'		=> $this->input->post('isi'),
				'tgl_buat' 	=> time(),
		];
		$this->db->insert('lembaga_masyarakat', $data);
		$this->session->set_flashdata('flash', 'Data Ditambahkan!');
       	redirect('lembaga_masyarakat');
	}

	public function edit($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->lembaga->get_by_id($id);

        $data = array(
        	'id' => set_value('id', $row->id),
        	'nama' => set_value('nama', $row->nama),
        	'isi' => set_value('isi', $row->isi),
        	'user' => set_value('user', $row->user),
        	'tgl_buat' => set_value('tgl_buat', $row->tgl_buat),
        );

        $list['title'] = 'Lembaga Masyarakat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('lembaga_masyarakat/edit', $data);
       	$this->load->view('templates/footer');
	}

	public function edit_data($id)
	{
		$data = [
			'nama'     	=> $this->input->post('nama'),
			'user'    	=> $this->input->post('user'),
			'isi'		=> $this->input->post('isi'),
			'tgl_buat' 	=> time(),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('lembaga_masyarakat', $data);
		$this->session->set_flashdata('flash', 'Data Berhasil Diubah!');
       	redirect('lembaga_masyarakat');
	}

	public function detail($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->lembaga->get_by_id($id);

        $data = array(
        	'id' 		=> $row->id,
        	'nama' 		=> $row->nama,
        	'isi' 		=> $row->isi,
        	'user' 		=> $row->user,
        	'tgl_buat' 	=> $row->tgl_buat,
        );

        $list['title'] = 'Lembaga Masyarakat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('lembaga_masyarakat/detail', $data);
       	$this->load->view('templates/footer');
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->lembaga->hapus_lembaga($where, 'lembaga_masyarakat');
		$this->session->set_flashdata('flash', 'Data Lembaga dihapus');
		redirect('lembaga_masyarakat');
	}

}