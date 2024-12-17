<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

    public $table = 'galeri';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     //load data gambar album berdasarkan id album dari table galeri
    function get_album_id($id)
    {
        $query = "SELECT * FROM daftar_album WHERE id_album=$id ORDER BY id DESC";
        $result = $this->db->query($query)->result();
        return $result;
    }

    //kirim di form edit
    function get_album($id_album)
    {       
        $this->db
        ->select('k.*')
        ->from('daftar_album k')
        ->join('galeri j', 'k.id_album = j.id', 'left')
        ->where('k.id_album', $id_album);
        $query = $this->db->get();
        return $query->row();
    }

    //kirim di controller hapus album id
    function get_AlbumByID($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get('daftar_album')->row();
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
	$this->db->or_like('nama_album', $q);
	$this->db->or_like('aktif', $q);
	$this->db->or_like('tgl_buat', $q);
	$this->db->or_like('gambar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_album', $q);
	$this->db->or_like('aktif', $q);
	$this->db->or_like('tgl_buat', $q);
	$this->db->or_like('gambar', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function tambah_album()
    {
        //Siapkan nama gambar acak
        $rand_name = random_bytes(5);
        $gbr_bytes = bin2hex($rand_name);

        $gbr_album  = $_FILES['file'];
        if ($gbr_album=''){
        }else{
            $config['upload_path']      ='./assets/img/galeri';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $gbr_bytes;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 2 MB Type Jpg atau Png');
                redirect(site_url('galeri'));
            }else{
                $gbr_album = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_album' => $this->input->post('nama_album', true),
            'aktif' => 1,
            'tgl_buat' => time(),
            'gambar' => $gbr_album
        ];

        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id)
    {

        $update_byt = random_bytes(5);
        $new_byt = bin2hex($update_byt);

        $data['galeri'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $edit_file = $_FILES['file'];

        if ($edit_file) {
            $config['upload_path']     ='./assets/img/galeri/';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $new_byt;

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['galeri']['gambar'];
                $path = './assets/img/galeri/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('gambar', $new_file);
            } else {

                $data = [
                    'nama_album'    => $this->input->post('nama_album',TRUE),
                    'aktif'         => $this->input->post('aktif',TRUE),
                    'tgl_buat'      => $this->input->post('tgl_buat',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
           'nama_album' => $this->input->post('nama_album',TRUE),
            'aktif'     => $this->input->post('aktif',TRUE),
            'tgl_buat'  => $this->input->post('tgl_buat',TRUE)
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

    function lock_album($id = '', $val = 0)
    {
        $sql = "UPDATE galeri SET aktif = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

    function tambah_gambar_album()
    {
        //Siapkan nama gambar acak
        $rand_n = random_bytes(5);
        $album_byt = bin2hex($rand_n);

        $gambar_album_id  = $_FILES['file'];
        if ($gambar_album_id=''){
        }else{
            $config['upload_path']      ='./assets/img/galeri/album';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $album_byt;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                 $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 2 MB Type Jpg atau Png');
                 $link_ref1 = site_url() . "galeri/album_list/{$id}";
                 redirect($link_ref1);
            }else{
                $gambar_album_id = $this->upload->data('file_name');
            }
        }

        $data = [
            'id_album' => $this->input->post('id_album', true),
            'nama_gambar' => $this->input->post('nama_gambar', true),
            'aktif' => 1,
            'tgl_dibuat' => time(),
            'gambar' => $gambar_album_id
        ];

        $this->db->insert('daftar_album', $data);
    }

    //hapus gambar album berdasarkan id
    function hapus_GambarID($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function lock_gambar_albumID($id = '', $val = 0)
    {
        $sql = "UPDATE daftar_album SET aktif = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

    function gambar_id($where,$table)
    {       
        return $this->db->get_where($table,$where);
    }

    function update_GambarID($id_album)
    {
        $where = $this->input->post('id');
        $update_byt1 = random_bytes(5);
        $new_byt2 = bin2hex($update_byt1);

        $data['album'] = $this->db->get_where('daftar_album', ['id' => $where])->row_array();

        // cek jika ada file yang di upload/diupdate
        $edit_file = $_FILES['file'];

        if ($edit_file) {
            $config['upload_path']     ='./assets/img/galeri/album/';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $new_byt2;

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['album']['gambar'];
                $path = './assets/img/galeri/album/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file1 = $this->upload->data('file_name');
                $this->db->set('gambar', $new_file1);
            } else {

                $data = [
                    'id_album'      => $this->input->post('id_album',TRUE),
                    'nama_gambar'   => $this->input->post('nama_gambar',TRUE),
                    'aktif'         => $this->input->post('aktif',TRUE),
                    'tgl_dibuat'    => $this->input->post('tgl_dibuat',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('daftar_album', $data);
            }
        }

        $data = [
            'id_album'      => $this->input->post('id_album',TRUE),
            'nama_gambar'   => $this->input->post('nama_gambar',TRUE),
            'aktif'         => $this->input->post('aktif',TRUE),
            'tgl_dibuat'    => $this->input->post('tgl_dibuat',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('daftar_album', $data);
    }



}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-07 09:50:01 */
/* http://harviacode.com */