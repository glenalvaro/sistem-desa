<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
		$this->load->model('Program_bantuan_model', 'bantuan');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		$data['daftar_peserta'] = $this->bantuan->pes_bantuan_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['title'] = 'Bantuan';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/bantuan', $data);
		$this->load->view('layanan/template/foot');
	}
	
}