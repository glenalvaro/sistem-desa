<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_bantuan_model extends CI_Model
{

    public $table = 'program_bantuan';
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

    function detail_program($where,$table)
    {        
        return $this->db->get_where($table,$where);
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama_program', $q);
	$this->db->or_like('sasaran_program', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('asal_dana', $q);
	$this->db->or_like('sdate', $q);
	$this->db->or_like('edate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_program', $q);
	$this->db->or_like('sasaran_program', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('asal_dana', $q);
	$this->db->or_like('sdate', $q);
	$this->db->or_like('edate', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function daftar_PesertaID($id)
    {
        $sql = "SELECT k.*, j.no_kk as nomor_kk, p.nama_program as program_nama, dk.nama_kelompok as kelompok_nama, l.nama_penduduk as ketua_kelompok, dk.kode_kelompok as kode_klpk
        FROM peserta_bantuan k 
        LEFT JOIN data_penduduk j ON k.id_anggota = j.id
        LEFT JOIN program_bantuan p ON k.id_program = p.id
        LEFT JOIN data_kelompok dk ON k.id_anggota = dk.id
        LEFT JOIN data_penduduk l ON dk.id_ketua = l.id
        WHERE k.id_program = $id
        ORDER BY k.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //kirim ke controller web
    function get_peserta_bantuan($nik)
    {
        $sql = "SELECT k.*, j.no_kk as nomor_kk, p.nama_program as program_nama, dk.nama_kelompok as kelompok_nama, l.nama_penduduk as ketua_kelompok, dk.kode_kelompok as kode_klpk
        FROM peserta_bantuan k 
        LEFT JOIN data_penduduk j ON k.id_anggota = j.id
        LEFT JOIN program_bantuan p ON k.id_program = p.id
        LEFT JOIN data_kelompok dk ON k.id_anggota = dk.id
        LEFT JOIN data_penduduk l ON dk.id_ketua = l.id
        WHERE k.nik_peserta = $nik
        ORDER BY k.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    function updatePesertaById($id)
    {
        $data = [
            'no_kartu'    => $this->input->post('no_kartu'),
            'nik_peserta'       => $this->input->post('nik_peserta'),
            'nama_peserta'         => $this->input->post('nama_peserta'),
            'tmp_lahir'    => $this->input->post('tmp_lahir'),
            'tgl_lahir'    => $this->input->post('tgl_lahir'),
            'jk'    => $this->input->post('jk'),
            'alamat_peserta'    => $this->input->post('alamat_peserta'),
            'keterangan'    => $this->input->post('keterangan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peserta_bantuan', $data);
    }

    function hapus_data_pes($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //tampilkan peserta bantuan hanya sasaran penduduk di modul administrasi penduduk
    function pes_bantuan_penduduk($userdata)
    {
        $sql = "SELECT k.*, j.no_kk as nomor_kk, p.nama_program as program_nama, dk.nama_kelompok as kelompok_nama, l.nama_penduduk as ketua_kelompok, dk.kode_kelompok as kode_klpk
        FROM peserta_bantuan k 
        LEFT JOIN data_penduduk j ON k.id_anggota = j.id
        LEFT JOIN program_bantuan p ON k.id_program = p.id
        LEFT JOIN data_kelompok dk ON k.id_anggota = dk.id
        LEFT JOIN data_penduduk l ON dk.id_ketua = l.id
        WHERE k.nik_peserta = $userdata
        AND k.id_sasaran=1
        ORDER BY k.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

}

/* End of file Program_bantuan_model.php */
/* Location: ./application/models/Program_bantuan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-14 13:17:05 */
/* http://harviacode.com */