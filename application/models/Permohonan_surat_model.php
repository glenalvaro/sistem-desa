<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permohonan_surat_model extends CI_Model
{

    public $table = 'permohonan_surat';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // delete data 
    function hapus_permohonan($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    

    //get semua data sama dengan status sedang diperiksa
    function daftar_permohonan()
    {
        $sql = "SELECT p.*, s.nama as jenis_surat, st.nama as status, d.nik as nik_pemohon, d.nama_penduduk as nama_pemohon
        FROM permohonan_surat p 
        LEFT JOIN surat_master s ON p.id_surat = s.id
        LEFT JOIN status_surat st ON p.id_status = st.id
        LEFT JOIN data_penduduk d ON p.id_pemohon = d.id
        WHERE id_status =1
        ORDER BY p.id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //get by id
    function get_permohonan_by_id($id)
    {
        $sql = "SELECT p.*, s.nama as jenis_surat, st.nama as status, d.nik as nik_pemohon, s.url as link_surat,  s.singkatan as singkatan_surat
        FROM permohonan_surat p 
        LEFT JOIN surat_master s ON p.id_surat = s.id
        LEFT JOIN status_surat st ON p.id_status = st.id
        LEFT JOIN data_penduduk d ON p.id_pemohon = d.id
        WHERE p.id=$id
        ORDER BY p.id ASC";
        $result = $this->db->query($sql)->row();
        return $result;
    }


    //get semua data sama dengan status ditolak
    function daftar_permohonan_tolak()
    {
        $sql = "SELECT l.*, s.nama AS nama_surat, p.nama_penduduk as pemohon, st.nama as surat_status, p.nik as nik_pemohon
        FROM log_surat l 
        LEFT JOIN surat_master s ON l.id_surat = s.id
        LEFT JOIN data_penduduk p ON l.id_pend = p.id
        LEFT JOIN status_surat st ON l.id_status = st.id
        WHERE l.id_status = 3
        ORDER BY l.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //get semua data sama dengan status diterima
    function daftar_permohonan_diterima()
    {
        $sql = "SELECT p.*, s.nama as jenis_surat, st.nama as status, d.nik as nik_pemohon, d.nama_penduduk as nama_pemohon
        FROM permohonan_surat p 
        LEFT JOIN surat_master s ON p.id_surat = s.id
        LEFT JOIN status_surat st ON p.id_status = st.id
        LEFT JOIN data_penduduk d ON p.id_pemohon = d.id
        WHERE id_status !=3 AND id_status !=1
        ORDER BY p.id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function update_status($id = '', $val = 0)
    {
        $sql = "UPDATE permohonan_surat SET id_status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

}

/* End of file Informasi_publik_model.php */
/* Location: ./application/models/Informasi_publik_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-08 17:03:09 */
/* http://harviacode.com */