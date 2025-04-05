<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_web_model extends CI_Model
{

    public $table = 'menu_web';
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

    function lock_menu($id = '', $val = 0)
    {
        $sql = "UPDATE menu_web SET status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

    function hapus($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function hapus_data_menu($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //sub menu join dengan menu
    function getSubMenuID($id)
    {       
        $this->db
        ->select('s.*')
        ->from('sub_menu_web s')
        ->join('menu_web m', 's.id_menu = m.id', 'left')
        ->where('s.id_menu', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function lock_sub_menu($id = '', $val = 0)
    {
        $sql = "UPDATE sub_menu_web SET aktif = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }
}