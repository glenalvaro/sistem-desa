<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

     // get data by id
    function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('dokumen_penduduk')->row();
    }

     //tampilkan di dokumen user penduduk
    function get_dok_user($userdata)
    {
        $sql = "SELECT k.*, j.nik as nomor_nik
        FROM dokumen_penduduk k 
        LEFT JOIN data_penduduk j ON k.id_penduduk = j.id
        WHERE j.nik = $userdata
        ORDER BY k.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //ambil data dokumen berdasarkan id penduduk tampil di data penduduk sistem utama
    function get_dok_id($id)
    {
        $this->db->where('id_penduduk', $id);
        return $this->db->get('dokumen_penduduk')->row();
    }

    //load data dokumen berdasarkan data id penduduk
    function daftar_dokumen($id)
    {
        $query = "SELECT * FROM dokumen_penduduk WHERE id_penduduk=$id ORDER BY id DESC";
        $result = $this->db->query($query)->result();
        return $result;
    }

    //untuk user
    function tambah_data()
    {
         //Siapkan nama gambar acak
        $convert_bytes1 = random_bytes(5);
        $bytes_rand1 = bin2hex($convert_bytes1);

        $id_penduduk = $this->input->post('id_penduduk');
        $nama = $this->input->post('nama');
        $file = $_FILES['file'];
        if ($file=''){
        }else{
            $config['upload_path']      = './folder_arsip/dokumen/';
            $config['allowed_types']    ='jpeg|jpg|pdf';
            $config['max_size']         = 1080;
            $config['file_name']        = $bytes_rand1;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 1 MB Type Jpg atau Pdf');
                redirect(site_url('/layanan/dokumen'));
            }else{
                $file = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'id_penduduk' => $id_penduduk,
            'nama' => $nama,
            'file' => $file
        );

        $this->db->insert('dokumen_penduduk', $data);  
    }

    function hapus_dok($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dokumen_penduduk');
    }

    //untuk admin
    function unggah_dk()
    {
         //Siapkan nama gambar acak
        $convert_bytes1 = random_bytes(5);
        $bytes_rand1 = bin2hex($convert_bytes1);

        $id_penduduk = $this->input->post('id_penduduk');
        $nama = $this->input->post('nama');
        $file = $_FILES['file'];
        if ($file=''){
        }else{
            $config['upload_path']      = './folder_arsip/dokumen/';
            $config['allowed_types']    ='jpeg|jpg|pdf';
            $config['max_size']         = 1080;
            $config['file_name']        = $bytes_rand1;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 1 MB Type Jpg atau Pdf');
                redirect(site_url('data_penduduk'));
            }else{
                $file = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'id_penduduk' => $id_penduduk,
            'nama' => $nama,
            'file' => $file
        );

        $this->db->insert('dokumen_penduduk', $data);  
    }
}