<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_surat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Arsip_surat_model', 'arsip');
	}

	public function index()
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['surat_log'] = $this->arsip->get_all();

        $list['title'] = 'Arsip Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('arsip/arsip_surat', $data);
        $this->load->view('templates/footer');
	}

	public function edit($id)
    {
        $this->arsip->update_arsip($id);
        $this->session->set_flashdata('flash', 'Data Diupdate!');
        redirect('arsip_surat');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->arsip->hapus_arsip($where, 'log_surat');
        $this->session->set_flashdata('flash', 'Data Dihapus!');
        redirect('arsip_surat');
    }

    public function graph_surat()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $data['list_surat'] = $this->arsip->count_surat();

        $list['title'] = 'Grafik Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('arsip/grafik_surat', $data);
        $this->load->view('templates/footer');
    }
}