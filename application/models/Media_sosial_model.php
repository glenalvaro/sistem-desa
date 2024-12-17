<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media_sosial_model extends CI_Model
{

    public $table = 'media_sosial';
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
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('link', $q);
    	$this->db->or_like('icon', $q);
    	$this->db->or_like('tampil', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('nama', $q);
    	$this->db->or_like('link', $q);
    	$this->db->or_like('icon', $q);
    	$this->db->or_like('tampil', $q);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert()
    {
        //Siapkan nama gambar acak
        $convert_bytes = random_bytes(5);
        $bytes_rand = bin2hex($convert_bytes);

        $nama = $this->input->post('nama');
        $link = $this->input->post('link');
        $icon = $this->input->post('icon');
        $tampil = $this->input->post('tampil');
        $file = $_FILES['file'];
        if ($file=''){
        }else{
            $config['upload_path']      ='./assets/img/icon/media_sosial';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 1000;
            $config['file_name']        = $bytes_rand;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 1 MB Type Jpg atau Png');
                redirect(site_url('media_sosial'));
            }else{
                $file = $this->upload->data('file_name');
            }
        }
 
        $data = array(
            'nama' => $nama,
            'link' => $link,
            'tampil' => $tampil,
            'icon' => $file
        );

        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id)
    {
        $data['media_sosial'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $edit_file = $_FILES['file'];

        if ($edit_file) {
            $config['upload_path']      ='./assets/img/icon/media_sosial/';
            $config['allowed_types']    ='jpg|png';
            $config['max_size']         = 1000;
            $config['file_name']        = $data['media_sosial']['icon'];

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $old_file = $data['media_sosial']['icon'];
                $path = './assets/img/icon/media_sosial/';

                // hapus file lama
                if ($old_file) {
                    unlink(FCPATH . $path . $old_file);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('icon', $new_file);
            } else {

                $data = [
                    'nama'     => $this->input->post('nama',TRUE),
                    'link'     => $this->input->post('link',TRUE),
                    'tampil'   => $this->input->post('tampil',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
            'nama'     => $this->input->post('nama',TRUE),
            'link'     => $this->input->post('link',TRUE),
            'tampil'   => $this->input->post('tampil',TRUE)
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

    function lock_tampil($id = '', $val = 0)
    {
        $sql = "UPDATE media_sosial SET tampil = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

    function Delete_all($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete($this->table);
    }

}

/* End of file Media_sosial_model.php */
/* Location: ./application/models/Media_sosial_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-26 15:31:39 */
/* http://harviacode.com */