<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_surat_keluar_model extends CI_Model
{

    public $table = 'buku_surat_keluar';
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('nama_surat', $q);
    	$this->db->or_like('file_surat', $q);
    	$this->db->or_like('no_surat_kel', $q);
    	$this->db->or_like('tgl_surat', $q);
    	$this->db->or_like('tujuan', $q);
    	$this->db->or_like('isi_singkat', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('nama_surat', $q);
    	$this->db->or_like('file_surat', $q);
    	$this->db->or_like('no_surat_kel', $q);
    	$this->db->or_like('tgl_surat', $q);
    	$this->db->or_like('tujuan', $q);
    	$this->db->or_like('isi_singkat', $q);
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

    //add data surat keluar 
    function tambah_surat_keluar()
    {
        $nama_surat = $this->input->post('nama_surat');
        $no_surat_kel = $this->input->post('no_surat_kel');
        $tgl_surat = $this->input->post('tgl_surat');
        $tujuan = $this->input->post('tujuan');
        $isi_singkat = $this->input->post('isi_singkat');
        $file = $_FILES['file'];
        if ($file=''){
        }else{
            $config['upload_path']      ='./folder_arsip/surat_keluar';
            $config['allowed_types']    ='pdf';
            $config['max_size']         = 4000;
            $config['file_name']        = $this->input->post('no_surat_kel', true);

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 4 MB Type Pdf');
                redirect(site_url('buku_surat_keluar'));
            }else{
                $file = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'nama_surat' => $nama_surat,
            'no_surat_kel' => $no_surat_kel,
            'tgl_surat' => $tgl_surat,
            'tujuan' => $tujuan,
            'isi_singkat' => $isi_singkat,
            'file_surat' => $file
            );
        $this->db->insert($this->table, $data);
    }


    function update_surat_keluar($id)
    {
        $data['surat_keluar'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $upload_file = $_FILES['file'];

        if ($upload_file) {
             $config['upload_path']     ='./folder_arsip/surat_keluar/';
            $config['allowed_types']    ='pdf';
            $config['max_size']         = 4000;
            $config['file_name']        = $data['surat_keluar']['no_surat_kel'];

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['surat_keluar']['file_surat'];
                $path = './folder_arsip/surat_keluar/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('file_surat', $new_file);
            } else {

                $data = [
                    'nama_surat'        => $this->input->post('nama_surat',TRUE),
                    'no_surat_kel'      => $this->input->post('no_surat_kel',TRUE),
                    'tgl_surat'         => $this->input->post('tgl_surat',TRUE),
                    'tujuan'            => $this->input->post('tujuan',TRUE),
                    'isi_singkat'       => $this->input->post('isi_singkat',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
            'nama_surat'        => $this->input->post('nama_surat',TRUE),
            'no_surat_kel'      => $this->input->post('no_surat_kel',TRUE),
            'tgl_surat'         => $this->input->post('tgl_surat',TRUE),
            'tujuan'            => $this->input->post('tujuan',TRUE),
            'isi_singkat'       => $this->input->post('isi_singkat',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

}

/* End of file Buku_surat_keluar_model.php */
/* Location: ./application/models/Buku_surat_keluar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-11 08:22:25 */
/* http://harviacode.com */