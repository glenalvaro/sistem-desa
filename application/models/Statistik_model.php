<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistik_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_data($id)
    {
        $data['menu'] = $this->db->get_where('menu_statistik', ['id' => $id])->row_array();
        $tbl = $data['menu']['tbl'];
        $url = $data['menu']['url'];


        if ($id==7) {
              $this->db->select("COALESCE(COUNT(dp.".$url."), 0) as jumlah")
            ->select("pk.*,")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 1 THEN jk.id END) AS laki")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 2 THEN jk.id END) AS perempuan")
            ->from("".$tbl." pk")
            ->join("data_penduduk dp", "pk.nama=dp.{$url}", "left")
            ->join("tweb_penduduk_sex jk", "dp.jenis_kelamin = jk.id", "left")
            ->group_by("pk.id")
            ->order_by("pk.id");
        } elseif($id==9) {
             $this->db->select("COALESCE(COUNT(dp.".$url."), 0) as jumlah")
            ->select("pk.*, pk.suku as nama")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 1 THEN jk.id END) AS laki")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 2 THEN jk.id END) AS perempuan")
            ->from("".$tbl." pk")
            ->join("data_penduduk dp", "pk.id=dp.{$url}", "left")
            ->join("tweb_penduduk_sex jk", "dp.jenis_kelamin = jk.id", "left")
            ->group_by("pk.id")
            ->order_by("pk.id");
        } elseif($id==11) {
             $this->db->select("COALESCE(COUNT(dp.".$url."), 0) as jumlah")
            ->select("pk.*,")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 1 THEN jk.id END) AS laki")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 2 THEN jk.id END) AS perempuan")
            ->from("".$tbl." pk")
            ->join("data_penduduk dp", "pk.nama=dp.{$url}", "left")
            ->join("tweb_penduduk_sex jk", "dp.jenis_kelamin = jk.id", "left")
            ->group_by("pk.id")
            ->order_by("pk.id");
        } elseif($id==12) {
             $this->db->select("COALESCE(COUNT(dp.".$url."), 0) as jumlah")
            ->select("pk.*, pk.nama_dusun as nama")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 1 THEN jk.id END) AS laki")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 2 THEN jk.id END) AS perempuan")
            ->from("".$tbl." pk")
            ->join("data_penduduk dp", "pk.id=dp.{$url}", "left")
            ->join("tweb_penduduk_sex jk", "dp.jenis_kelamin = jk.id", "left")
            ->group_by("pk.id")
            ->order_by("pk.id");
        } else{
             $this->db->select("COALESCE(COUNT(dp.".$url."), 0) as jumlah")
            ->select("pk.*,")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 1 THEN jk.id END) AS laki")
            ->select("COUNT(CASE WHEN dp.jenis_kelamin = 2 THEN jk.id END) AS perempuan")
            ->from("".$tbl." pk")
            ->join("data_penduduk dp", "pk.id=dp.{$url}", "left")
            ->join("tweb_penduduk_sex jk", "dp.jenis_kelamin = jk.id", "left")
            ->group_by("pk.id")
            ->order_by("pk.id");
        }
        return $this->db->get()->result();
    }

    function jumlah_data($val)
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where {$val}");
        return $query->num_rows();
    }
    function jumlah_pria()
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where jenis_kelamin=1");
        return $query->num_rows();
    }
    function jumlah_wanita()
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where jenis_kelamin=2");
        return $query->num_rows();
    }
    function null_data($val)
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where {$val}=0");
        return $query->num_rows();
    }
    function null_pria($val)
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where {$val}=0 AND jenis_kelamin=1");
        return $query->num_rows();
    }
    function null_wanita($val)
    {
        $query = $this->db->query("SELECT * FROM data_penduduk where {$val}=0 AND jenis_kelamin=2");
        return $query->num_rows();
    }
    function total_data($val)
    {
        $data_jumlah = $this->jumlah_data($val);
        $data_null = $this->null_data($val);
        return $data_jumlah + $data_null;
    }
    function total_pria($val)
    {
        $data_jumlah = $this->jumlah_pria($val);
        $data_null = $this->null_pria($val);
        return $data_jumlah + $data_null;
    }
    function total_wanita($val)
    {
        $data_jumlah = $this->jumlah_wanita($val);
        $data_null = $this->null_wanita($val);
        return $data_jumlah + $data_null;
    }
    //End Statistik Kependudukan


}