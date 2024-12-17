<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_mandiri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Setting_mandiri_model', 'st_mandiri');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        //tampil data dari table identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();

        $data['setting'] = $this->db->get('setting')->result_array();

        $data['mandiri'] = $this->st_mandiri->getDataMandiri();

        $data['title'] = 'Pengaturan Layanan Mandiri';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('setting_mandiri/view', $data);
        $this->load->view('templates/footer');
    }

    public function update_man($id)
    {
        $this->st_mandiri->editDataMandiri($id);
        $this->session->set_flashdata('flash', 'Pengaturan Layanan Diupdate!');
        redirect('setting_mandiri');
    }

}