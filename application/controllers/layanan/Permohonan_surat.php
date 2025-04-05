<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_surat extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
		$this->load->model('Surat_master_model', 'surat_master');
		$this->load->model('/mlayanan/Profil_model', 'profil');
		$this->load->model('/mlayanan/Permohonan_model', 'permohonan');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//tampilkan permohonan berdasarkan nik
		$data['list_permohonan'] = $this->permohonan->get_permohonan($userdata);

		$data['title'] = 'Daftar Permohonan Surat';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/permohonan_surat', $data);
		$this->load->view('layanan/template/foot');
	}

	public function buat_surat()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] 		= $this->sesi->get_penduduk($userdata);
		$data['desa'] 			= $this->db->get('identitas_desa')->result_array();
		$data['setting'] 		= $this->db->get('setting')->result_array();
		$data['daftar_surat'] 	= $this->surat_master->get_surat_master();

		$data['title'] = 'Buat Permohonan Surat';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/buat_surat', $data);
		$this->load->view('layanan/template/foot');
	}

	public function tinjau_permohonan()
	{
		$userdata = $this->session->userdata('nik_pend');
		$list['penduduk'] = $this->sesi->get_penduduk($userdata);

		$id 				= $this->input->post('id_surat');
		//ambil data surat berdasarkan id
		$row                = $this->surat_master->get_by_id($id);
		$val 				= $this->profil->get_by_nik($userdata);

		$data = [
			'id_surat' 		=> $row->id,
			'nama_surat' 	=> $row->nama,
			'url_surat' 	=> $row->url,
			'no_hp_aktif' 	=>  $this->input->post('no_hp_aktif'),
			'id_pemohon' => $val->id,
			'nik' => $val->nik,
    		'no_kk' => $val->no_kk,
    		'nama_penduduk' => $val->nama_penduduk,
    		'sex' => $val->sex,
    		'tempat_lahir' => $val->tempat_lahir,
    		'tgl_lahir' => $val->tgl_lahir,
    		'alamat_sekarang' => $val->alamat_sekarang,
    		'pendidikan_kk' => $val->pendidikan_kk,
    		'status_warganegara' => $val->status_warganegara,
    		'agama' => $val->agama,
    		'pekerjaan' => $val->pekerjaan,
    		'status_kawin' => $val->status_kawin,
    		'dusun' => $val->dusun,

		];

		$userdata 				= $this->session->userdata('nik_pend');
		$data['penduduk'] 		= $this->sesi->get_penduduk($userdata);
		$data['desa'] 			= $this->db->get('identitas_desa')->result_array();
		$data['setting'] 		= $this->db->get('setting')->result_array();
		$data['daftar_dokumen'] = $this->surat_master->get_daftar_persyaratan($id);

		$data['title'] = 'Unggah Dokumen Surat';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/tinjau_permohonan', $data);
		$this->load->view('layanan/template/foot');
	}

	public function buat_permohonan()
	{
		$this->permohonan->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Permohonan Surat di buat.</div>');
        redirect('/layanan/permohonan_surat');
	}

	public function riwayat_surat()
	{
		$userdata 					= $this->session->userdata('nik_pend');
		$data['penduduk'] 			= $this->sesi->get_penduduk($userdata);
		$data['desa'] 				= $this->db->get('identitas_desa')->result_array();
		$data['setting'] 			= $this->db->get('setting')->result_array();
		$data['riwayat_pemohon']	= $this->permohonan->get_riwayat($userdata);

		$data['title'] = 'Riwayat Permohonan Surat';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/riwayat_permohonan', $data);
		$this->load->view('layanan/template/foot');
	}
	
}