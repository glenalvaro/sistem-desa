<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Halaman_statis_model extends CI_Model
{

    public $table = 'halaman_statis';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

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

    function hapus_data_statis($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function lock_data($id = '', $val = 0)
    {
        $sql = "UPDATE halaman_statis SET status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

}