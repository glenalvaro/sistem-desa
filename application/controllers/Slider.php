<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Slider_model', 'slider');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['data_slider'] = $this->slider->get_all();

		$data['title'] = 'Slide Gambar';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('slider/table', $data);
		$this->load->view('templates/footer');
	}

	public function lock($id = '')
    {
        $this->slider->lock_slide($id, 0);
        $this->session->set_flashdata('flash', 'Gambar Dinon-aktifkan');
        redirect("slider");
    }

    public function unlock($id = '')
    {
        $this->slider->lock_slide($id, 1);
        $this->session->set_flashdata('flash', 'Gambar Diaktifkan');
        redirect("slider");
    }

	public function tambah()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['title'] = 'Tambah Gambar';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('slider/form', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_data()
	{
		$this->slider->tambah_slider();
        $this->session->set_flashdata('flash', 'Data ditambahkan');
        redirect(site_url('slider'));
	}

	public function edit($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->slider->get_by_id($id);

        $data = array(
        	'id' => set_value('id', $row->id),
        	'nama' => set_value('nama', $row->nama),
        	'deskripsi' => set_value('deskripsi', $row->deskripsi),
        	'gambar' => set_value('gambar', $row->gambar),
        );

        $list['title'] = 'Edit Gambar';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('slider/edit', $data);
       	$this->load->view('templates/footer');
	}

	public function update_data($id)
	{
		$this->slider->update_gambar($id);
        $this->session->set_flashdata('flash', 'Data diupdate');
        redirect(site_url('slider'));
	}

	public function delete($id) 
    {
        $row = $this->slider->get_by_id($id);

        if ($row) {
            // Hapus file foto di folder asets/img/slide
            $image_default = $row->gambar;
            $path = './assets/img/slide/';
             // hapus juga foto di folder slide
                unlink(FCPATH . $path . $image_default);
                $this->slider->delete($id);
                $this->session->set_flashdata('flash', 'Data dihapus');
                redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
}