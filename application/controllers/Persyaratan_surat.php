<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_surat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Layanan_surat_model');
	}

	public function index()
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['list_persyaratan'] = $this->Layanan_surat_model->daftar_persyaratan();

        $list['title'] = 'Daftar Persyaratan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('layanan_surat/daftar_persyaratan', $data);
        $this->load->view('templates/footer');
	}

	public function tambah_persyaratan()
    {
        $this->db->insert('daftar_persyaratan', ['nama' => $this->input->post('nama')]);
        $this->session->set_flashdata('flash', 'Data Ditambahkan!');
        redirect('persyaratan_surat');
    }

    public function update_persyaratan($id)
    {
        $this->Layanan_surat_model->updatePersyaratanById($id);
        $this->session->set_flashdata('flash', 'Data Diupdate!');
        redirect('persyaratan_surat');
    }

    public function hapus_persyaratan($id)
    {
        $where = array('id' => $id);
        $this->Layanan_surat_model->hapus_data_persyaratan($where, 'daftar_persyaratan');
        $this->session->set_flashdata('flash', 'Data Dihapus!');
        redirect('persyaratan_surat');
    }

}