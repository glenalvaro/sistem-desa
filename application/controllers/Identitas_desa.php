<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_desa extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Setting_model', 'setting');
	}

	public function index()
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data dari table desa
		$data['identitas'] = $this->db->get('identitas_desa')->result_array();

		$data['title'] = 'Informasi Desa';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('info_desa/identitas_desa', $data);
		$this->load->view('templates/footer');
	}

	public function edit_identitas_desa($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$where = array('id' => $id);
		$data['tampilData'] = $this->setting->edit_data($where, 'identitas_desa')->result();
		$data['title'] = 'Informasi Desa';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('info_desa/edit_identitas', $data);
		$this->load->view('templates/footer');
	}

	public function update_identitasDesa()
	{
		helper_log("edit", "Mengubah data informasi desa/kelurahan");
		//Siapkan nama gambar acak
        $name_rand = random_bytes(5);
        $logo_name = bin2hex($name_rand);

		$id = $this->input->post('id');
		$nama_desa = $this->input->post('nama_desa');
		$kode_pos = $this->input->post('kode_pos');
		$nama_kepdes = $this->input->post('nama_kepdes');
		$nip_kepdes = $this->input->post('nip_kepdes');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$email_desa = $this->input->post('email_desa');
		$no_hp = $this->input->post('no_hp');
		$website_desa = $this->input->post('website_desa');
		$nama_kecamatan = $this->input->post('nama_kecamatan');
		$nama_camat = $this->input->post('nama_camat');
		$nip_camat = $this->input->post('nip_camat');
		$nama_kabupaten = $this->input->post('nama_kabupaten');
		$nama_provinsi = $this->input->post('nama_provinsi');
		$kode_wilayah = $this->input->post('kode_wilayah');

		$get['config_desa'] = $this->db->get_where('identitas_desa', ['id' => $id])->row_array();

		//logo desa
		$logo_desa = $_FILES['logo_desa']['name'];
		//gambar desa
		$gbr_desa = $_FILES['gambar_desa']['name'];

		$data = [

			'nama_desa' => $nama_desa,
			'kode_pos' => $kode_pos,
			'alamat_kantor' => $alamat_kantor,
			'email_desa' => $email_desa,
			'no_hp' => $no_hp,
			'website_desa' => $website_desa,
			'nama_kecamatan' => $nama_kecamatan,
			'nama_camat' => $nama_camat,
			'nip_camat' => $nip_camat,
			'nama_kabupaten' => $nama_kabupaten,
			'nama_provinsi' => $nama_provinsi,
			'kode_wilayah' => $kode_wilayah,
		];

		//fungsi upload logo
		 if ($logo_desa) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '1048';
                $config['upload_path'] 	 = './assets/img/logo/';
                $config['file_name']     = $logo_name;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo_desa')) {
                    $old_file = $get['config_desa']['logo_desa'];
                	$path = './assets/img/logo/';

	                // hapus file lama
	                if ($old_file) {
	                    unlink(FCPATH . $path . $old_file);
	                }
	                // ganti file lama dengan baru
	                $new_file = $this->upload->data('file_name');
	                $this->db->set('logo_desa', $new_file);
                } else {
                    $this->session->set_flashdata('flash-error', 'Ukuran logo maks 1 MB!');
					redirect('identitas_desa');
                }
            }

            //fungsi upload gambar kantor
             if ($gbr_desa) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '4028';
                $config['upload_path'] 	 = './assets/img/kantor/';
                $config['file_name']     = $logo_name;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_desa')) {
                    $old_file1 = $get['config_desa']['gambar_desa'];
                	$path1 = './assets/img/kantor/';

	                // hapus file lama
	                if ($old_file1) {
	                    unlink(FCPATH . $path1 . $old_file1);
	                }
	                // ganti file lama dengan baru
	                $new_file1 = $this->upload->data('file_name');
	                $this->db->set('gambar_desa', $new_file1);
                } else {
                    $this->session->set_flashdata('flash-error', 'Ukuran gambar maks 4 MB!');
					redirect('identitas_desa');
                }
            }

		$where = array('id' => $id);
		$this->setting->update_data($where,$data, 'identitas_desa');
		$this->session->set_flashdata('flash', 'Data Desa Diupdate!');
        redirect('identitas_desa');

	}

	public function lokasi_kantor($id = 0)
    {

      $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

	  //tampil data dari table identitas desa
	  $data['desa'] = $this->db->get('identitas_desa')->result_array();

	  //ambil data pengaturan dari table setting
	  $data['setting'] = $this->db->get('setting')->result_array();
		
      //ambil data yang akan diedit
      $data['lokasi_edit'] = $this->setting->getLokasiById($id);

        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);

         $this->form_validation->set_rules('longitude', 'Longitude', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
	        $data['title'] = 'Lokasi Kantor';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('info_desa/lokasi_kantor', $data);
			$this->load->view('templates/footer');
        } else {
            $this->setting->editLokasi($id);
            $this->session->set_flashdata('flash', 'Lokasi Kantor Diupdate!');
            redirect('identitas_desa');
        }
    }

    public function wilayah_desa($id = 0)
    {

      $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

	  //tampil data dari table identitas desa
	  $data['desa'] = $this->db->get('identitas_desa')->result_array();

	  //ambil data pengaturan dari table setting
	  $data['setting'] = $this->db->get('setting')->result_array();
		
      //ambil data yang akan diedit
      $data['wilayah_edit'] = $this->setting->getWilayahById($id);

        $this->form_validation->set_rules('wilayah_desa', 'Wilayah', 'required|trim',[
        	'required' => 'Kolom ini harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
	        $data['title'] = 'Wilayah';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('info_desa/wilayah_desa', $data);
			$this->load->view('templates/footer');
        } else {
            $this->setting->editWilayah($id);
            $this->session->set_flashdata('flash', 'Wilayah Diupdate!');
            redirect('identitas_desa');
        }
    }

}