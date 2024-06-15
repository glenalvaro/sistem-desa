<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bumindes extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Data_penduduk_model', 'penduduk');
	}

	public function buku_induk_penduduk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data penduduk
		$data['get_data'] = $this->penduduk->get_all();

		$data['title'] = 'Administrasi Penduduk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('buku_desa/bumindes/buku_induk/table', $data);
		$this->load->view('templates/footer');

	}

	public function cetak_buku_induk()
	{
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['list_penduduk'] = $this->penduduk->get_all();
        $this->load->view('buku_desa/bumindes/buku_induk/cetak', $data);
	}

	public function penduduk_sementara()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data penduduk
		$data['get_penduduk'] = $this->penduduk->get_penduduk_sementara();

		$data['title'] = 'Administrasi Penduduk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('buku_desa/bumindes/penduduk_sementara/table', $data);
		$this->load->view('templates/footer');

	}
}
