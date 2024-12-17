<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('/mlayanan/masuk_model', 'masuk');
	}

	public function index()
	{
		if($this->session->userdata('nik_pend')) {
            redirect('/layanan/masuk');
        }

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data pengaturan dari table setting_mandiri
		$data['mandiri'] = $this->db->get('setting_mandiri')->result_array();

		$this->form_validation->set_rules('nik_pend', 'nik_pend', 'trim|required',[
            'required' => 'Masukan Nomor Induk Penduduk !'
        ]);
        $this->form_validation->set_rules('pin', 'PIN','required|trim|min_length[6]',
			['required' => 'Kolom PIN harus di isi !',
			'min_length' => 'PIN harus berisi 6 karakter !'
		]);

        //validasi login
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Masuk';
			$this->load->view('layanan/masuk', $data);
        } else {
            //validasi sukses
            $this->_login_penduduk();
        }
	}

	private function _login_penduduk()
	{
	   $nik_pend = $this->input->post('nik_pend');
       $pin = $this->input->post('pin');

       $warga = $this->masuk->cek_pend($nik_pend);

       // jika usernya ada
       if ($warga) {
       	// cek password nya
            if(password_verify($pin, $warga->pin)){
                $data = [
                    'nik_pend' 	=> $warga->nik_pend
                ];
                $this->session->set_userdata($data);
                redirect('/layanan/beranda');  
            } else {
              	$this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/img/icon/icon-danger.svg" alt="icon">Password salah. Mohon periksa kembali</div>');
				redirect('/layanan/masuk');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-danger show"><img src="../assets/img/icon/icon-danger.svg" alt="icon">NIK tidak terdaftar</div>');
				redirect('/layanan/masuk');
        }
	}

   public function sign_out()
   {
        $this->session->unset_userdata('nik_pend');
        $this->session->set_flashdata('pesan', '<div role="alert" class="fade alert alert-success show"><img src="../assets/img/icon/logout.svg" alt="icon">Berhasil Logout</div>');
        redirect('/layanan/masuk');
   }
	
}