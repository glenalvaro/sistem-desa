<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public $table = 'agenda';
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
}