<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masuk_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cek_pend($nik_pend)
    {
      $this->db
             ->select('lp.*, dp.nama_penduduk as nama_pend')
             ->from('layanan_penduduk lp')
             ->join('data_penduduk dp', 'lp.nik_pend = dp.nik', 'left')
             ->where('lp.nik_pend', $nik_pend);
       $query = $this->db->get();
       return $query->row();
    }
}