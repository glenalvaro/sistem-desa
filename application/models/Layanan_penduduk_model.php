<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan_penduduk_model extends CI_Model
{

    public $table = 'layanan_penduduk';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $sql = "SELECT lp.*, dp.nama_penduduk as nama_pend
        FROM layanan_penduduk lp 
        LEFT JOIN data_penduduk dp ON lp.nik_pend = dp.nik
        ORDER BY lp.id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('nik_pend', $q);
    	$this->db->or_like('pin', $q);
    	$this->db->or_like('no_telepon', $q);
    	$this->db->or_like('tgl_buat', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
         $this->db
             ->select('lp.*, dp.nama_penduduk as nama_pend')
             ->from('layanan_penduduk lp')
             ->join('data_penduduk dp', 'lp.nik_pend = dp.nik', 'left')
             ->order_by($this->id, $this->order)
             ->like('nik_pend', $q)
             ->limit($limit, $start);

        return $this->db->get()->result();
    }

    // insert data
    function create()
    {
        //Siapkan pin acak
        $new_pin = random_int(100000, 999999);

        if (!$this->input->post('pin')){
            $key = [
                'nik_pend' => $this->input->post('nik_pend'),
                'pin' => $new_pin 
            ];
             $data = [
                'nik_pend'  => $this->input->post('nik_pend'),
                'pin'  => password_hash($new_pin, PASSWORD_DEFAULT),
                'tgl_buat' => time()    
            ];
            $this->db->insert($this->table, $data);
            $this->session->set_flashdata("pesan",$key);
        } else {
            $val = [
                'nik_pend' => $this->input->post('nik_pend'),
                'pin' => $this->input->post('pin') 
            ];
            $data = [
                'nik_pend'  => $this->input->post('nik_pend'),
                'pin' => password_hash($this->input->post('pin'), 
                 PASSWORD_DEFAULT),  
                'tgl_buat' => time()      
            ];
            $this->db->insert($this->table, $data);
            $this->session->set_flashdata("pesan",$val);
        }
    }
    
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Layanan_penduduk_model.php */
/* Location: ./application/models/Layanan_penduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-30 08:13:27 */
/* http://harviacode.com */