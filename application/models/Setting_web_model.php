<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_web_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        return $this->db->get('setting_web')->result_array();
    }

    //kirim ke web controller
    public function get_all()
    {
        $query = $this->db->select('*')->limit(1)->get('setting_web')->row_array();
        return $query;
    }

    public function edit_data($id)
    {
         $data = [
            'layout_gambar'       => $this->input->post('layout_gambar'),
            'tampil_statistik'    => $this->input->post('tampil_statistik'),
            'tema_warna'          => $this->input->post('tema_warna'),
            'teks_warna'          => $this->input->post('teks_warna'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('setting_web', $data);
    }
}