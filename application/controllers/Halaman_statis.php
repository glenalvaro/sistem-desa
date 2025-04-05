<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Halaman_statis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Halaman_statis_model', 'halaman_statis');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        //tampil data dari table identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();

        //ambil data pengaturan dari table setting
        $data['setting'] = $this->db->get('setting')->result_array();

        $data['statis_list'] = $this->halaman_statis->get_all();

        $data['title'] = 'Halaman Statis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('artikel/halaman_statis/table', $data);
        $this->load->view('templates/footer');
    }

    public function lock_statis($id = '')
    {
        $this->halaman_statis->lock_data($id, 0);
        $this->session->set_flashdata('flash', 'Artikel Dinon-aktifkan');
        redirect('halaman_statis');
    }

    public function unlock_statis($id = '')
    {
        $this->halaman_statis->lock_data($id, 1);
        $this->session->set_flashdata('flash', 'Artikel Diaktifkan');
        redirect('halaman_statis');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        //tampil data dari table identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();

        //ambil data pengaturan dari table setting
        $data['setting'] = $this->db->get('setting')->result_array();

        $data['title'] = 'Tambah Halaman Statis';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('artikel/halaman_statis/form', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $data = [
                'judul'         => $this->input->post('judul'),
                'user'          => $this->input->post('user'),
                'isi'           => $this->input->post('isi'),
                'status'        => 1,
                'tgl_posting'   => time(),
        ];
        $this->db->insert('halaman_statis', $data);
        $this->session->set_flashdata('flash', 'Artikel Ditambahkan!');
        redirect('halaman_statis');
    }

    public function update($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->halaman_statis->get_by_id($id);

        $data = array(
            'id' => set_value('id', $row->id),
            'judul' => set_value('judul', $row->judul),
            'isi' => set_value('isi', $row->isi),
            'tgl_posting' => set_value('tgl_posting', $row->tgl_posting),
        );

        $list['title'] = 'Edit Halaman Statis';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('artikel/halaman_statis/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data($id)
    {
        $data = [
            'judul'         => $this->input->post('judul'),
            'user'          => $this->input->post('user'),
            'isi'           => $this->input->post('isi'),
            'tgl_posting'   => time(),
        ];
        
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('halaman_statis', $data);
        $this->session->set_flashdata('flash', 'Artikel Berhasil Diubah!');
        redirect('halaman_statis');
    }

    public function lihat($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->halaman_statis->get_by_id($id);

        $data = array(
            'id'            => $row->id,
            'judul'         => $row->judul,
            'isi'           => $row->isi,
            'user'          => $row->user,
            'tgl_posting'   => $row->tgl_posting,
        );

        $list['title'] = 'Lembaga Masyarakat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('artikel/halaman_statis/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->halaman_statis->hapus_data_statis($where, 'halaman_statis');
        $this->session->set_flashdata('flash', 'Data artikel dihapus');
        redirect('halaman_statis');
    }
}