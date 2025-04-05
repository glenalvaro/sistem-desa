<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider_model extends CI_Model
{

    public $table = 'slider';
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

    function lock_slide($id = '', $val = 0)
    {
        $sql = "UPDATE slider SET status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }

     // insert data
    function tambah_slider()
    {
        //Siapkan nama gambar acak
        $rand_name = random_bytes(5);
        $gbr_bit = bin2hex($rand_name);

        $gbr_slide  = $_FILES['file'];
        if ($gbr_slide=''){
        }else{
            $config['upload_path']      ='./assets/img/slide';
            $config['allowed_types']    ='jpeg|jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $gbr_bit;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')){
                $this->session->set_flashdata('flash-error', 'File yang diunggah maksimal 2 MB Type Jpg atau Png');
                redirect(site_url('slider'));
            }else{
                $gbr_slide = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama'      => $this->input->post('nama', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'gambar'    => $gbr_slide,
            'status'    => 1,
        ];

        $this->db->insert($this->table, $data);
    }

     // update data
    function update_gambar($id)
    {

        $update_byt = random_bytes(5);
        $slide_bit = bin2hex($update_byt);

        $data['slider'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada file yang di upload/diupdate
        $edit_slide = $_FILES['file'];

        if ($edit_slide) {
            $config['upload_path']     ='./assets/img/slide/';
            $config['allowed_types']    ='jpeg|jpg|png';
            $config['max_size']         = 2000;
            $config['file_name']        = $slide_bit;

            $this->load->library('upload', $config);

            // upload file baru
            if ($this->upload->do_upload('file')) {
                $file_gbr = $data['slider']['gambar'];
                $path_gbr = './assets/img/slide/';

                // hapus file lama
                if ($file_gbr) {
                    unlink(FCPATH . $path_gbr . $file_gbr);
                }
                // ganti file lama dengan baru
                $new_file = $this->upload->data('file_name');
                $this->db->set('gambar', $new_file);
            } else {

                $data = [
                    'nama'      => $this->input->post('nama',TRUE),
                    'deskripsi' => $this->input->post('deskripsi',TRUE),
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
           'nama'       => $this->input->post('nama',TRUE),
           'deskripsi'  => $this->input->post('deskripsi',TRUE),
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

}