<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Home_model', 'home');
		$this->load->model('Setting_model', 'setting');
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['total_penduduk'] = $this->home->jmlPenduduk();
		$data['total_kk'] = $this->home->jmlKK();
		$data['total_kelompok'] = $this->home->jmlKelompok();
		$data['total_wilayah'] = $this->home->jmlWilayah();
		$data['total_pengguna'] = $this->home->jmlPengguna();

		$data['title'] = 'Home';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
	
}