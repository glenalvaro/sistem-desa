<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permohonan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_permohonan($userdata)
    {
        $sql = "SELECT p.*, s.nama as jenis_surat, st.nama as status, d.nik as nik_pemohon
        FROM permohonan_surat p 
        LEFT JOIN surat_master s ON p.id_surat = s.id
        LEFT JOIN status_surat st ON p.id_status = st.id
        LEFT JOIN data_penduduk d ON p.id_pemohon = d.id
        WHERE d.nik=$userdata
        AND id_status != 3
        ORDER BY p.id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function tambah_data()
    {
        $id_pemohon = $this->input->post('id_pemohon');
        $id_surat = $this->input->post('id_surat');
        $keperluan = $this->input->post('keperluan');
        $no_hp_aktif = $this->input->post('no_hp_aktif');

        $data = array(
            'id_pemohon' => $id_pemohon,
            'id_surat' => $id_surat,
            'id_status' => 1,
            'keperluan' => $keperluan,
            'no_hp_aktif' => $no_hp_aktif,
            'tgl_buat' => time(),
            );
        $this->db->insert('permohonan_surat', $data);
    }

    function get_riwayat($userdata)
    {
        $sql = "SELECT l.*, s.nama AS nama_surat, p.nama_penduduk as pemohon, st.nama as surat_status
        FROM log_surat l 
        LEFT JOIN surat_master s ON l.id_surat = s.id
        LEFT JOIN data_penduduk p ON l.id_pend = p.id
        LEFT JOIN status_surat st ON l.id_status = st.id
        WHERE l.id_status != 0
        AND p.nik = $userdata
        ORDER BY l.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }


}