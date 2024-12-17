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

    function get_all()
    {
        $sql = "SELECT l.*, s.nama AS nama_surat, p.nama_penduduk as pemohon 
        FROM log_surat l 
        LEFT JOIN surat_master s ON l.id_surat = s.id
        LEFT JOIN data_penduduk p ON l.id_pend = p.id
        ORDER BY l.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

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

    function hapus_arsip($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}