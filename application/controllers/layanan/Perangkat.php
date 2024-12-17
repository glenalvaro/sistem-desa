<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perangkat extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
	 	$this->load->model('Perangkat_desa_model', 'perangkat');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['perangkat'] = $this->perangkat->get_all();

		$data['title'] = 'Perangkat';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/perangkat', $data);
		$this->load->view('layanan/template/foot');
	}
	
}