<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan_surat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function daftar_persyaratan()
    {
        $query = $this->db->select('*')->order_by('id', 'desc')->get('daftar_persyaratan')->result_array();
        return $query;
    }

    function updatePersyaratanById($id)
    {
        $row = $this->input->post('nama');

        $data = [
            'nama' => $row
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('daftar_persyaratan', $data);
    }

    function hapus_data_persyaratan($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //tampilkan data penduduk di form surat
    function get_data_ajax($id)
    {
        $this->db
                ->select('u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status, p.nama AS pendidikan_kk, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan')
                ->from('data_penduduk u')
                ->join('penduduk_hubungan h', 'u.hubungan_keluarga_id = h.id', 'left')
                ->join('tweb_penduduk_sex k', 'u.jenis_kelamin = k.id', 'left')
                ->join('penduduk_agama a', 'u.agama_id = a.id', 'left')
                ->join('penduduk_status t', 'u.status_penduduk_id = t.id', 'left')
                ->join('penduduk_pendidikan_kk p', 'u.pendikan_kk_id = p.id', 'left')
                ->join('penduduk_pendidikan s', 'u.pendidikan_sedang_id = s.id', 'left')
                ->join('penduduk_pekerjaan e', 'u.pekerjaan_id = e.id', 'left')
                ->join('penduduk_suku su', 'u.suku = su.id', 'left')
                ->join('status_dasar sd', 'u.status_dasar_id = sd.id', 'left')
                ->join('wilayah_desa j', 'u.dusun_id = j.id', 'left')
                ->join('golongan_darah c', 'u.golongan_darah = c.id', 'left')
                ->where('u.id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    //tampilkan pada pratinjau surat
    function get_nik_pend($id_pend)
    {
        $this->db
                ->select('u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status, p.nama AS pendidikan_kk, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan')
                ->from('data_penduduk u')
                ->join('penduduk_hubungan h', 'u.hubungan_keluarga_id = h.id', 'left')
                ->join('tweb_penduduk_sex k', 'u.jenis_kelamin = k.id', 'left')
                ->join('penduduk_agama a', 'u.agama_id = a.id', 'left')
                ->join('penduduk_status t', 'u.status_penduduk_id = t.id', 'left')
                ->join('penduduk_pendidikan_kk p', 'u.pendikan_kk_id = p.id', 'left')
                ->join('penduduk_pendidikan s', 'u.pendidikan_sedang_id = s.id', 'left')
                ->join('penduduk_pekerjaan e', 'u.pekerjaan_id = e.id', 'left')
                ->join('penduduk_suku su', 'u.suku = su.id', 'left')
                ->join('status_dasar sd', 'u.status_dasar_id = sd.id', 'left')
                ->join('wilayah_desa j', 'u.dusun_id = j.id', 'left')
                ->join('golongan_darah c', 'u.golongan_darah = c.id', 'left')
                ->where('u.nik', $id_pend);

        $query = $this->db->get();
        return $query->row();
    }

}
