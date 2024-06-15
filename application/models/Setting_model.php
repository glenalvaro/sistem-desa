<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function getDataSetting()
    {
        return $this->db->get('setting')->result_array();
    }

    public function editSettingById($id)
    {
        $data['setting'] = $this->db->get_where('setting', ['id' => $id])->row_array();

        $title_admin           = $this->input->post('title_admin');
        $title_login           = $this->input->post('title_login');
        $statistik_data        = $this->input->post('statistik_data');
        $mode_perbaikan        = $this->input->post('mode_perbaikan');
        $sebutan_desa          = $this->input->post('sebutan_desa');
        $sebutan_dusun         = $this->input->post('sebutan_dusun');
        $tema_modul            = $this->input->post('tema_modul');
        $artikel_page          = $this->input->post('artikel_page');
        $vendor                = $this->input->post('vendor');
        $cek_internet          = $this->input->post('cek_internet');
    
        //latar website
        $latar1 = $_FILES['latar_website']['name'];
        //latar login admin
        $latar2 = $_FILES['latar_login_admin']['name'];

        //fungsi gambar latar website 1
         if ($latar1) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/latar_modul/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('latar_website')) {
                    $old_image2 = $data['setting']['latar_website'];
                    $path = './assets/img/latar_modul/';

                    // hapus foto lama
                    if ($old_image2) {
                        unlink(FCPATH . $path . $old_image2);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('latar_website', $new_image);
                } else {
                     $this->session->set_flashdata('flash-error', 'Gambar latar website gagal di upload ukuran melebihi 2 MB.');
                     redirect('admin/setting');
                }
            }

        //fungsi gambar latar login admin 2
         if ($latar2) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/latar_admin/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('latar_login_admin')) {
                    $old_image1 = $data['setting']['latar_login_admin'];
                    $path = './assets/img/latar_admin/';

                    // hapus foto lama
                    if ($old_image1) {
                        unlink(FCPATH . $path . $old_image1);
                    }
                    $new_image1 = $this->upload->data('file_name');
                    $this->db->set('latar_login_admin', $new_image1);
                } else {
                   $this->session->set_flashdata('flash-error', 'Gambar latar login admin gagal di upload ukuran melebihi 2 MB.');
                     redirect('admin/setting');
                }
            }

        $data = [

            'title_admin'       => $title_admin,
            'title_login'       => $title_login,
            'statistik_data'    => $statistik_data,
            'mode_perbaikan'    => $mode_perbaikan,
            'sebutan_desa'      => $sebutan_desa,
            'sebutan_dusun'     => $sebutan_dusun,
            'tema_modul'        => $tema_modul,
            'artikel_page'      => $artikel_page,
            'vendor'            => $vendor,
            'cek_internet'      => $cek_internet

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('setting', $data);
    }

	public function edit_data($where,$table)
	{
	   return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function getLokasiById($id)
    {
        return $this->db->get_where('identitas_desa', ['id' => $id])->row_array();
    }

    public function editLokasi($id)
    {
      
		$data = [
              'latitude'  => $this->input->post('latitude', true),
              'longitude'   => $this->input->post('longitude', true),             
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('identitas_desa', $data);
    }

    public function getWilayahById($id)
    {
        return $this->db->get_where('identitas_desa', ['id' => $id])->row_array();
    }

    public function editWilayah($id)
    {
      
		$data = [
              'wilayah_desa'  => $this->input->post('wilayah_desa', true),            
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('identitas_desa', $data);
    }
}