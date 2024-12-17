<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
		$this->load->model('Umkm_model', 'umkm');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['set_mandiri'] = $this->db->get('setting_mandiri')->result_array();

		$data['data_umkm'] = $this->umkm->get_all_limit();

		$data['title'] = 'UMKM';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/umkm', $data);
		$this->load->view('layanan/template/foot');
	}

	public function list_all()
	{
		$userdata = $this->session->userdata('nik_pend');
		$list['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$list['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$list['setting'] = $this->db->get('setting')->result_array();

		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '/layanan/umkm/list_all?q=' . urlencode($q);
            $config['first_url'] = base_url() . '/layanan/umkm/list_all?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '/layanan/umkm/list_all';
            $config['first_url'] = base_url() . '/layanan/umkm/list_all';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->umkm->total_rows($q);
        $umkm = $this->umkm->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'list_umkm' => $umkm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

		$list['title'] = 'UMKM';
		$this->load->view('layanan/template/head', $list);
		$this->load->view('layanan/list_umkm', $data);
		$this->load->view('layanan/template/foot');
	}

	public function detail($id)
	{
		$userdata = $this->session->userdata('nik_pend');
		$list['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$list['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$list['setting'] = $this->db->get('setting')->result_array();

		$row = $this->umkm->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_tlp' => $row->no_tlp,
            'alamat' => $row->alamat,
            'harga_produk' => $row->harga_produk,
            'satuan_produk' => $row->satuan_produk,
    		'nama_usaha' => $row->nama_usaha,
            'nama_pemilik' => $row->nama_pemilik,
            'nama_kat' => $row->nama_kat,
    		'id_kategori' => $row->id_kategori,
    		'deskripsi' => $row->deskripsi,
    		'latitude' => $row->latitude,
    		'longitude' => $row->longitude,
    		'tgl_posting' => $row->tgl_posting,
    		'gambar' => $row->gambar,
    		);

		$list['title'] = 'UMKM';
		$this->load->view('layanan/template/head', $list);
		$this->load->view('layanan/lokasi_umkm', $data);
		$this->load->view('layanan/template/foot');

        }

	}

	public function tambah()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['kat_umkm'] = $this->db->get('kategori_umkm')->result_array();

		$data['title'] = 'Tambah UMKM';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/umkm_penduduk/form', $data);
		$this->load->view('layanan/template/foot');
	}

	public function tambah_data()
	{
		$this->umkm->tambah_umkm();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data usaha di tambahkan.</div>');
        redirect('/layanan/umkm');
	}
	
}