<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_web extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Setting_web_model', 'setting_web');
		$this->load->model('Slider_model', 'slider');
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_setting'] = $this->setting_web->get_data();
		$data['gbr_slide'] 	= $this->slider->get_all();

		$data['title'] = 'Pengaturan Website';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('setting_web/data', $data);
		$this->load->view('templates/footer');
	}

	public function update_data($id)
	{
		$this->setting_web->edit_data($id);
        $this->session->set_flashdata('flash', 'Pengaturan Diupdate!');
        redirect('setting_web');
	}
}