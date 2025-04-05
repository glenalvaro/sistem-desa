<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sambutan_model extends CI_Model
{

    public $table = 'sambutan_kepala';
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

    //kirim ke controller web
    function get_data_sambutan()
    {
        $query = $this->db->select('*')->limit(1)->get('sambutan_kepala')->row_array();
        return $query;
    }
}