<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function getDataSetting()
    {
        return $this->db->get('setting')->result_array();
    }

    //kirim ke form surat
    public function get_data_desa()
    {
        $query = $this->db->select('*')->limit(1)->get('identitas_desa')->row_array();
        return $query;
    }

    //kirim ke form surat
    public function get_data_app()
    {
        $query = $this->db->select('*')->limit(1)->get('setting')->row_array();
        return $query;
    }

    public function editSettingById($id)
    {
        //Siapkan nama gambar acak
        $random_name = random_bytes(5);
        $nama_random = bin2hex($random_name);

        $data['setting'] = $this->db->get_where('setting', ['id' => $id])->row_array();

        $title_admin           = $this->input->post('title_admin');
        $title_login           = $this->input->post('title_login');
        $statistik_data        = $this->input->post('statistik_data');
        $mode_perbaikan        = $this->input->post('mode_perbaikan');
        $sebutan_desa          = $this->input->post('sebutan_desa');
        $sebutan_dusun         = $this->input->post('sebutan_dusun');
        $sebutan_kabupaten     = $this->input->post('sebutan_kabupaten');
        $tema_modul            = $this->input->post('tema_modul');
        $artikel_page          = $this->input->post('artikel_page');
        $vendor                = $this->input->post('vendor');
        $cek_internet          = $this->input->post('cek_internet');
        $jenis_peta            = $this->input->post('jenis_peta');
        $token_peta            = $this->input->post('token_peta');
        $zoom_peta             = $this->input->post('zoom_peta');
    
        //latar website
        $latar1 = $_FILES['latar_website']['name'];
        //latar login admin
        $latar2 = $_FILES['latar_login_admin']['name'];
        //marker peta custom
        $icon_peta = $_FILES['icon_peta']['name'];

        //fungsi gambar latar website 1
         if ($latar1) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '1048';
                $config['upload_path']   = './assets/img/latar_modul/';
                $config['file_name']     = $nama_random;

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
                     $this->session->set_flashdata('flash-error', 'Gambar latar website gagal di upload ukuran melebihi 1 MB.');
                     redirect('aplikasi');
                }
            }

        //fungsi gambar latar login admin 2
         if ($latar2) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '1048';
                $config['upload_path']   = './assets/img/latar_admin/';
                $config['file_name']     = $nama_random;

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
                   $this->session->set_flashdata('flash-error', 'Gambar latar login admin gagal di upload ukuran melebihi 1 MB.');
                     redirect('aplikasi');
                }
            }

        //fungsi upload icon
         if ($icon_peta) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '1048';
                $config['upload_path']   = './assets/img/icon/';
                $config['file_name']     = $nama_random;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('icon_peta')) {
                    $old_image3 = $data['setting']['icon_peta'];
                    $path = './assets/img/icon/';

                    // hapus foto lama
                    if ($old_image3) {
                        unlink(FCPATH . $path . $old_image3);
                    }
                    $new_image3 = $this->upload->data('file_name');
                    $this->db->set('icon_peta', $new_image3);
                } else {
                   $this->session->set_flashdata('flash-error', 'Icon gagal di upload ukuran melebihi 1 MB.');
                     redirect('aplikasi');
                }
            }

        $data = [

            'title_admin'       => $title_admin,
            'title_login'       => $title_login,
            'statistik_data'    => $statistik_data,
            'mode_perbaikan'    => $mode_perbaikan,
            'sebutan_desa'      => $sebutan_desa,
            'sebutan_dusun'     => $sebutan_dusun,
            'sebutan_kabupaten' => $sebutan_kabupaten,
            'tema_modul'        => $tema_modul,
            'artikel_page'      => $artikel_page,
            'vendor'            => $vendor,
            'cek_internet'      => $cek_internet,
            'jenis_peta'        => $jenis_peta,
            'token_peta'        => $token_peta,
            'zoom_peta'         => $zoom_peta

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