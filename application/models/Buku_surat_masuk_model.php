<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_surat_masuk_model extends CI_Model
{

    public $table = 'buku_surat_masuk';
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

    function get_surat_masuk()
    {
        $sql = "SELECT s.*, j.nama as pegawai_disposisi
        FROM buku_surat_masuk s 
        LEFT JOIN jabatan_perangkat j ON s.disposisi_ke = j.id
        ORDER BY s.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function detail_surat($where,$table)
    {        
        return $this->db->get_where($table,$where);
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('nama_surat', $q);
    	$this->db->or_like('tgl_terima', $q);
    	$this->db->or_like('no_surat', $q);
    	$this->db->or_like('tgl_surat', $q);
    	$this->db->or_like('pengirim_surat', $q);
    	$this->db->or_like('perihal', $q);
    	$this->db->or_like('disposisi_ke', $q);
    	$this->db->or_like('isi_disposisi', $q);
    	$this->db->or_like('file_surat_masuk', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('nama_surat', $q);
    	$this->db->or_like('tgl_terima', $q);
    	$this->db->or_like('no_surat', $q);
    	$this->db->or_like('tgl_surat', $q);
    	$this->db->or_like('pengirim_surat', $q);
    	$this->db->or_like('perihal', $q);
    	$this->db->or_like('disposisi_ke', $q);
    	$this->db->or_like('isi_disposisi', $q);
    	$this->db->or_like('file_surat_masuk', $q);
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

     //add data surat masuk
    function tambah_surat_masuk()
    {
        $nama_surat = $this->input->post('nama_surat');
        $tgl_terima = $this->input->post('tgl_terima');
        $no_surat = $this->input->post('no_surat');
        $tgl_surat = $this->input->post('tgl_surat');
        $pengirim_surat = $this->input->post('pengirim_surat');
        $perihal = $this->input->post('perihal');
        $disposisi_ke = $this->input->post('disposisi_ke');
        $isi_disposisi = $this->input->post('isi_disposisi');
        $file = $_FILES['file'];
        if ($file=''){
        }else{
            $config['allowed_types']    = 'pdf|jpg|jpeg|png';
            $config['upload_path']      = './folder_arsip/surat_masuk/';
            $config['max_size']         = 4000;
            $config['file_name']        = $this->input->post('no_surat', true);

            $this->load->library('upload',$config);

            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'Type Atau Ukuran File Tidak Sesuai');
                redirect(site_url('buku_surat_masuk'));
            }else{
                $file = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'nama_surat' => $nama_surat,
            'tgl_terima' => $tgl_terima,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'pengirim_surat' => $pengirim_surat,
            'perihal' => $perihal,
            'disposisi_ke' => $disposisi_ke,
            'isi_disposisi' => $isi_disposisi,
            'file_surat_masuk' => $file
            );
        $this->db->insert($this->table, $data);
    }

    function update_surat_masuk($id)
    {
        $data['surat_masuk'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $upload_file1 = $_FILES['file'];

        if ($upload_file1) {
             $config['upload_path']     ='./folder_arsip/surat_masuk/';
            $config['allowed_types']    ='pdf|jpg|png';
            $config['max_size']         = 4000;
            $config['file_name']        = $data['surat_masuk']['no_surat'];

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['surat_masuk']['file_surat_masuk'];
                $path = './folder_arsip/surat_masuk/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('file_surat_masuk', $new_file);
            } else {

                $data = [
                    'nama_surat'        => $this->input->post('nama_surat',TRUE),
                    'tgl_terima'      => $this->input->post('tgl_terima',TRUE),
                    'no_surat'      => $this->input->post('no_surat',TRUE),
                    'tgl_surat'         => $this->input->post('tgl_surat',TRUE),
                    'pengirim_surat'            => $this->input->post('pengirim_surat',TRUE),
                    'perihal'       => $this->input->post('perihal',TRUE),
                    'disposisi_ke'      => $this->input->post('disposisi_ke',TRUE),
                    'isi_disposisi'      => $this->input->post('isi_disposisi',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
            'nama_surat'        => $this->input->post('nama_surat',TRUE),
            'tgl_terima'      => $this->input->post('tgl_terima',TRUE),
            'no_surat'      => $this->input->post('no_surat',TRUE),
            'tgl_surat'         => $this->input->post('tgl_surat',TRUE),
            'pengirim_surat'    => $this->input->post('pengirim_surat',TRUE),
            'perihal'       => $this->input->post('perihal',TRUE),
            'disposisi_ke'      => $this->input->post('disposisi_ke',TRUE),
            'isi_disposisi'      => $this->input->post('isi_disposisi',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

}

/* End of file Buku_surat_masuk_model.php */
/* Location: ./application/models/Buku_surat_masuk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-13 05:21:46 */
/* http://harviacode.com */