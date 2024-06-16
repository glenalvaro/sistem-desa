<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wilayah_desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Wilayah_desa_model');
        $this->load->model('Data_penduduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wilayah_desa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wilayah_desa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wilayah_desa/index';
            $config['first_url'] = base_url() . 'wilayah_desa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wilayah_desa_model->total_rows($q);
        $wilayah_desa = $this->Wilayah_desa_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wilayah_desa_data' => $wilayah_desa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->template->load('template','wilayah_desa/wilayah_desa_list', $data);
            $list['title'] = 'Wilayah Administratif';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/wilayah_desa/wilayah_desa_list', $data);
            $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Wilayah_desa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_dusun' => $row->nama_dusun,
		'kepala_dusun' => $row->kepala_dusun,
	    );
            $list['title'] = 'Wilayah Administratif';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/wilayah_desa/wilayah_desa_read', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('flash', 'Data tidak ditemukan!');
            redirect(site_url('wilayah_desa'));
        }
    }

    public function create() 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data = array(
            'button' => 'Create',
            'action' => site_url('wilayah_desa/create_action'),
	        'id' => set_value('id'),
	        'nama_dusun' => set_value('nama_dusun'),
	        'kepala_dusun' => set_value('kepala_dusun'),
	    );

        $data['list_penduduk'] = $this->db->get('data_penduduk')->result_array();

        $list['title'] = 'Wilayah Administratif';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('sid/wilayah_desa/wilayah_desa_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dusun' => $this->input->post('nama_dusun',TRUE),
		'kepala_dusun' => $this->input->post('kepala_dusun',TRUE),
	    );

            $this->Wilayah_desa_model->insert($data);
            $this->session->set_flashdata('flash', 'Data Wilayah Administratif Ditambahkan!');
            redirect(site_url('wilayah_desa'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Wilayah_desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('wilayah_desa/update_action'),
		        'id' => set_value('id', $row->id),
		        'nama_dusun' => set_value('nama_dusun', $row->nama_dusun),
		        'kepala_dusun' => set_value('kepala_dusun', $row->kepala_dusun),
	       );

            $data['list_penduduk'] = $this->db->get('data_penduduk')->result_array();
            
            $list['title'] = 'Wilayah Administratif';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/wilayah_desa/wilayah_desa_form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Data Not Found');
            redirect(site_url('wilayah_desa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		      'nama_dusun' => $this->input->post('nama_dusun',TRUE),
		      'kepala_dusun' => $this->input->post('kepala_dusun',TRUE),
	    );

            $this->Wilayah_desa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash', 'Data Wilayah Administratif diupdate!');
            redirect(site_url('wilayah_desa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wilayah_desa_model->get_by_id($id);

        if ($row) {
            $this->Wilayah_desa_model->delete($id);
           $this->session->set_flashdata('flash', 'Data Wilayah Administratif dihapus!');
            redirect(site_url('wilayah_desa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah_desa'));
        }
    }

    public function cetak()
    {
        //ambil data identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['title'] = 'Cetak Wilayah Administratif';
        $data['getData'] = $this->Wilayah_desa_model->get_all();
        $this->load->view('sid/wilayah_desa/wilayah_desa_print', $data);   
    }

    public function _rules() 
    {
	   $this->form_validation->set_rules('nama_dusun', 'nama dusun', 'trim|required');
	   $this->form_validation->set_rules('kepala_dusun', 'kepala dusun', 'trim|required');

	   $this->form_validation->set_rules('id', 'id', 'trim');
	   $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Wilayah_desa.php */
/* Location: ./application/controllers/Wilayah_desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-09-04 18:03:58 */
/* http://harviacode.com */