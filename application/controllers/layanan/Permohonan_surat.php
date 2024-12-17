<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_surat extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
		$this->load->model('Surat_master_model', 'surat_master');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

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

	public function buat_permohonan()
	{
		$id = $this->input->post('id_surat');
		//ambil data surat berdasarkan id
		$row                = $this->surat_master->get_by_id($id);
		$data = [
			'id_surat' 		=> $row->id,
			'nama_surat' 	=> $row->nama,
			'keterangan' 	=>  $this->input->post('keterangan'),
			'no_hp_aktif' 	=>  $this->input->post('no_hp_aktif'),
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
	
}