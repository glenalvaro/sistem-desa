<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_mandiri_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getDataMandiri()
    {
        return $this->db->get('setting_mandiri')->result_array();
    }

    public function editDataMandiri($id)
    {
        $new_bit = random_bytes(5);
        $bit_int = bin2hex($new_bit);

        $data['mandiri'] = $this->db->get_where('setting_mandiri', ['id' => $id])->row_array();

        $tampil_layanan     = $this->input->post('tampil_layanan');
        $tampil_daftar      = $this->input->post('tampil_daftar');
        $daftar_umkm        = $this->input->post('daftar_umkm');

        //latar login layanan
        $latar_log = $_FILES['latar_mandiri']['name'];

        //fungsi gambar latar website 1
         if ($latar_log) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/latar_mandiri/';
                $config['file_name'] = $bit_int; //beri nama acak pada gambar

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('latar_mandiri')) {
                    $latar_lama = $data['mandiri']['latar_mandiri'];
                    $path = './assets/img/latar_mandiri/';

                    // hapus foto lama
                    if ($latar_lama) {
                        unlink(FCPATH . $path . $latar_lama);
                    }
                    $new_latar = $this->upload->data('file_name');
                    $this->db->set('latar_mandiri', $new_latar);
                } else {
                     $this->session->set_flashdata('flash-error', 'Gambar latar mandiri gagal di upload ukuran melebihi 2 MB.');
                     redirect('setting_mandiri');
                }
            }

        $data = [
            'tampil_layanan'  => $tampil_layanan,
            'tampil_daftar'   => $tampil_daftar,
            'daftar_umkm'     => $daftar_umkm   
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('Setting_mandiri', $data);
    }

}