<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arsip_surat_model extends CI_Model
{

    public $table = 'log_surat';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     // get data by id
    function get_arsip_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_all()
    {
       $sql = "SELECT l.*, s.nama AS nama_surat, p.nama_penduduk as pemohon, st.nama as surat_status
        FROM log_surat l 
        LEFT JOIN surat_master s ON l.id_surat = s.id
        LEFT JOIN data_penduduk p ON l.id_pend = p.id
        LEFT JOIN status_surat st ON l.id_status = st.id
        ORDER BY l.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //hitung data surat tampilkan di arsip grafik surat
    function count_surat()
    {
        $this->db->select("COALESCE(COUNT(s.id), 0) as jumlah_surat")
            ->select("l.*,")
            ->select("s.nama as nama_surat")
            ->from("log_surat l")
            ->join("surat_master s", "l.id_surat=s.id", "left")
            ->group_by("l.id_surat")
            ->order_by("l.id_surat");
        return $this->db->get()->result();
    }

    function update_arsip($id)
    {
        $row = $this->input->post('keterangan');

        $data = [
            'keterangan' => $row
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('log_surat', $data);
    }

     // delete data
    function delete($id)
    {
        helper_log("delete", "Menghapus data arsip surat");
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}