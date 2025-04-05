<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Inventaris_model', 'inventaris');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_inventaris'] = $this->inventaris->get_all();

		$data['title'] = 'Inventaris';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('inventaris/table', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['title'] = 'Tambah Inventaris';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('inventaris/tambah', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$data = [
				'jenis_barang'     	=> $this->input->post('jenis_barang'),
				'kode_barang'    	=> $this->input->post('kode_barang'),
				'identitas_barang'	=> $this->input->post('identitas_barang'),
				'apb_desa'     		=> $this->input->post('apb_desa'),
				'perolehan_lain'    => $this->input->post('perolehan_lain'),
				'kekayaan_desa'		=> $this->input->post('kekayaan_desa'),
				'tgl_perolehan'     => $this->input->post('tgl_perolehan'),
				'keterangan'    	=> $this->input->post('keterangan'),
		];
		$this->db->insert('inventaris', $data);
		$this->session->set_flashdata('flash', 'Data Inventaris Ditambahkan!');
       	redirect('inventaris');
	}

	public function edit_data($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$row = $this->inventaris->get_by_id($id);
		$value = array(
    		'id' => $row->id,
    		'jenis_barang' => $row->jenis_barang,
    		'kode_barang' => $row->kode_barang,
    		'identitas_barang' => $row->identitas_barang,
    		'apb_desa' => $row->apb_desa,
    		'perolehan_lain' => $row->perolehan_lain,
    		'kekayaan_desa' => $row->kekayaan_desa,
    		'tgl_perolehan' => $row->tgl_perolehan,
    		'keterangan' => $row->keterangan,
    	);

		$data['title'] = 'Edit Inventaris';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('inventaris/edit', $value);
		$this->load->view('templates/footer');
	}

	public function update_data($id)
	{
		$data = [
				'jenis_barang'     	=> $this->input->post('jenis_barang'),
				'kode_barang'    	=> $this->input->post('kode_barang'),
				'identitas_barang'	=> $this->input->post('identitas_barang'),
				'apb_desa'     		=> $this->input->post('apb_desa'),
				'perolehan_lain'    => $this->input->post('perolehan_lain'),
				'kekayaan_desa'		=> $this->input->post('kekayaan_desa'),
				'tgl_perolehan'     => $this->input->post('tgl_perolehan'),
				'keterangan'    	=> $this->input->post('keterangan'),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('inventaris', $data);
		$this->session->set_flashdata('flash', 'Data Berhasil Diubah!');
       	redirect('inventaris');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->inventaris->hapus($where, 'inventaris');
		$this->session->set_flashdata('flash', 'Data Inventaris dihapus');
		redirect('inventaris');
	}

	public function cetak_data()
	{
		$data = array(
            'inventaris_list' => $this->inventaris->get_all(),
            'start' => 0
        );
        $data['desa']           = $this->db->get('identitas_desa')->result_array();
        $data['setting']        = $this->db->get('setting')->result_array();
        $this->load->view('inventaris/cetak', $data);
	}
}