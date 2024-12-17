<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_penduduk($userdata)
    {
      $this->db
             ->select('lp.*, dp.nama_penduduk as nama_pend, dp.foto as foto_pend, dp.jenis_kelamin as sex')
             ->from('layanan_penduduk lp')
             ->join('data_penduduk dp', 'lp.nik_pend = dp.nik', 'left')
             ->where('lp.nik_pend', $userdata);
       $query = $this->db->get();
       return $query->row_array();
    }
}