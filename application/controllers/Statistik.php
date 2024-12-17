<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Statistik_model', 'statistik');
    }

    public function kependudukan($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $list['statistik_menu'] = $this->db->get('menu_statistik')->result_array();

        $pendidikan_kk = $this->statistik->get_data($id);
        $data['menu'] = $this->db->get_where('menu_statistik', ['id' => $id])->row_array();
        $val  = $data['menu']['url'];
        $nama = $data['menu']['menu'];

        $data = [
            'pendidikan_kk' => $pendidikan_kk,
            'nama_table'    => $nama,
            'jumlah_data'   => $this->statistik->jumlah_data($val),
            'jumlah_pria'   => $this->statistik->jumlah_pria(),
            'jumlah_wanita' => $this->statistik->jumlah_wanita(),
            'jumlah_null'   => $this->statistik->null_data($val),
            'null_pria'     => $this->statistik->null_pria($val),
            'null_wanita'   => $this->statistik->null_wanita($val),
            'total_data'    => $this->statistik->total_data($val),
            'total_pria'    => $this->statistik->total_pria($val),
            'total_wanita'  => $this->statistik->total_wanita($val),
        ];

        $list['title'] = 'Statistik Kependudukan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('sid/statistik_penduduk/stat_kependudukan', $data);
        $this->load->view('templates/footer');
    }
}