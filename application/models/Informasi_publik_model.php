<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_publik_model extends CI_Model
{

    public $table = 'informasi_publik';
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
    	$this->db->or_like('judul_dokumen', $q);
    	$this->db->or_like('kategori', $q);
    	$this->db->or_like('tahun', $q);
    	$this->db->or_like('aktif', $q);
    	$this->db->or_like('tgl_muat', $q);
    	$this->db->or_like('dokumen', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('judul_dokumen', $q);
    	$this->db->or_like('kategori', $q);
    	$this->db->or_like('tahun', $q);
    	$this->db->or_like('aktif', $q);
    	$this->db->or_like('tgl_muat', $q);
    	$this->db->or_like('dokumen', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert()
    {
         //Siapkan nama dokumen acak
        $rand_dok = random_bytes(5);
        $name_dok = bin2hex($rand_dok);

        $judul_dokumen = $this->input->post('judul_dokumen');
        $kategori = $this->input->post('kategori');
        $tahun = $this->input->post('tahun');
       
        $dokmen = $_FILES['file'];
        if ($dokmen=''){
        }else{
            $config['upload_path']      ='./folder_arsip/informasi_publik';
            $config['allowed_types']    ='pdf';
            $config['max_size']         = 4000;
            $config['file_name']        = $name_dok;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 4 MB Type Pdf');
                redirect(site_url('informasi_publik'));
            }else{
                $dokmen = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'judul_dokumen' => $judul_dokumen,
            'kategori' => $kategori,
            'tahun' => $tahun,
            'aktif' => 1,
            'tgl_muat' => time(),
            'dokumen' => $dokmen
            );
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id)
    {
          //Siapkan nama dokumen acak
        $dok_rand = random_bytes(5);
        $dok_name = bin2hex($dok_rand);

        $data['informasi_publik'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $update_dok = $_FILES['file'];

        if ($update_dok) {
             $config['upload_path']     ='./folder_arsip/informasi_publik/';
            $config['allowed_types']    ='pdf';
            $config['max_size']         = 4000;
            $config['file_name']        = $dok_name;

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['informasi_publik']['dokumen'];
                $path = './folder_arsip/informasi_publik/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('dokumen', $new_file);
            } else {

                $data = [
                    'judul_dokumen' => $this->input->post('judul_dokumen',TRUE),
                    'kategori'      => $this->input->post('kategori',TRUE),
                    'tahun'         => $this->input->post('tahun',TRUE),
                    'aktif'         => $this->input->post('aktif',TRUE),
                    'tgl_muat'      => $this->input->post('tgl_muat',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
            'judul_dokumen' => $this->input->post('judul_dokumen',TRUE),
            'kategori'      => $this->input->post('kategori',TRUE),
            'tahun'         => $this->input->post('tahun',TRUE),
            'aktif'         => $this->input->post('aktif',TRUE),
            'tgl_muat'      => $this->input->post('tgl_muat',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function lock_informasi($id = '', $val = 0)
    {
        $sql = "UPDATE informasi_publik SET aktif = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

}

/* End of file Informasi_publik_model.php */
/* Location: ./application/models/Informasi_publik_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-08 17:03:09 */
/* http://harviacode.com */