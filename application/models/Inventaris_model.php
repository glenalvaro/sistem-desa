<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inventaris_model extends CI_Model
{

    public $table = 'inventaris';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

     // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function hapus($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('jenis_barang', $q);
        $this->db->or_like('kode_barang', $q);
        $this->db->or_like('identitas_barang', $q);
        $this->db->or_like('apb_desa', $q);
        $this->db->or_like('perolehan_lain', $q);
        $this->db->or_like('kekayaan_desa', $q);
        $this->db->or_like('tgl_perolehan', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}