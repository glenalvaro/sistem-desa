<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Setting_model', 'setting');
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//tampil data dari table setting
		$data['setting'] = $this->setting->getDataSetting();

		//get file log
		$data['log_app'] = file_get_contents(base_url().'/assets/log/log_aplikasi.txt');

		$data['title'] = 'Aplikasi';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('aplikasi/view', $data);
		$this->load->view('templates/footer');

	}

	public function update_app($id)
	{
		$this->setting->editSettingById($id);
        $this->session->set_flashdata('flash', 'Data Pengaturan Diupdate!');
        redirect('aplikasi');
	}
}