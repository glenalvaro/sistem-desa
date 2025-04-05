<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

    public $table = 'artikel';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //ambil artikel kirim ke view web
    function get_artikel()
    {
        $sql = "SELECT * FROM artikel ORDER BY id DESC LIMIT 6";
        $result = $this->db->query($sql)->result();
        return $result;
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
    	$this->db->or_like('judul', $q);
    	$this->db->or_like('isi', $q);
    	$this->db->or_like('user', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tgl_created', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('judul', $q);
    	$this->db->or_like('isi', $q);
    	$this->db->or_like('user', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tgl_created', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function tambah_artikel()
    {
         //Siapkan nama gambar acak
        $gbr_bit = random_bytes(5);
        $gbr_nm = bin2hex($gbr_bit);

        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $user = $this->input->post('user');
       
        $gbr = $_FILES['file'];
        if ($gbr=''){
        }else{
            $config['upload_path']      ='./assets/img/foto_artikel/';
            $config['allowed_types']    ='jpg|png|jpeg';
            $config['max_size']         = 4048;
            $config['file_name']        = $gbr_nm;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'Gambar yang diunggah maksimal 4 MB Type JPG Atau PNG');
                redirect(site_url('artikel'));
            }else{
                $gbr = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'judul'         => $judul,
            'isi'           => $isi,
            'user'          => $user,
            'gambar'        => $gbr,
            'aktif'         => 1,
            'tgl_created'   => time(),
            );
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id)
    {
          //Siapkan nama dokumen acak
        $rand_gb = random_bytes(5);
        $gbr_name = bin2hex($rand_gb);

        $data['artikel'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $update_gbr = $_FILES['file'];

        if ($update_gbr) {
             $config['upload_path']     ='./assets/img/foto_artikel/';
            $config['allowed_types']    ='jpg|png|jpeg';
            $config['max_size']         = 4048;
            $config['file_name']        = $gbr_name;

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['artikel']['gambar'];
                $path = './assets/img/foto_artikel/';

                // hapus gambar lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti gambar lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('gambar', $new_file);
            } else {

                $data = [
                    'judul' => $this->input->post('judul'),
                    'isi'   => $this->input->post('isi'),
                    'user'  => $this->input->post('user'),
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'isi'   => $this->input->post('isi'),
            'user'  => $this->input->post('user'),
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

    function lock($id = '', $val = 0)
    {
        $sql = "UPDATE artikel SET aktif = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }
}

/* End of file Artikel_model.php */
/* Location: ./application/models/Artikel_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-03-12 03:38:29 */
/* http://harviacode.com */