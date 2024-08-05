<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bumindes extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Data_penduduk_model', 'penduduk');
		$this->load->model('Wilayah_desa_model', 'wilayah');
	}

	public function index()
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

	public function rekap_penduduk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data wilayah desa
		$data['get_wilayah'] = $this->wilayah->get_all();

		$data['title'] = 'Administrasi Penduduk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('buku_desa/bumindes/rekapitulasi_penduduk/table', $data);
		$this->load->view('templates/footer');
	}

	public function penduduk_asuransi()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data penduduk
		$data['ambil_data'] = $this->penduduk->get_data_asuransi();

		$data['title'] = 'Administrasi Penduduk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('buku_desa/bumindes/asuransi_penduduk/table', $data);
		$this->load->view('templates/footer');
	}

	public function buku_ktp_kk()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data penduduk
		$data['get_data'] = $this->penduduk->get_data_buku_ktp_kk();

		$data['title'] = 'Administrasi Penduduk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('buku_desa/bumindes/buku_ktp_kk/table', $data);
		$this->load->view('templates/footer');
	}
}
