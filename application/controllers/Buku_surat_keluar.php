<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Buku_surat_keluar_model');
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
            $config['base_url'] = base_url() . 'buku_surat_keluar/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'buku_surat_keluar/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'buku_surat_keluar/index';
            $config['first_url'] = base_url() . 'buku_surat_keluar/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Buku_surat_keluar_model->total_rows($q);
        $buku_surat_keluar = $this->Buku_surat_keluar_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'buku_surat_keluar_data' => $buku_surat_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Administrasi Umum';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_keluar/table', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Buku_surat_keluar_model->get_by_id($id);
        if ($row) {
        $data = array(
        		'id' => $row->id,
        		'nama_surat' => $row->nama_surat,
        		'file_surat' => $row->file_surat,
        		'no_surat_kel' => $row->no_surat_kel,
        		'tgl_surat' => $row->tgl_surat,
        		'tujuan' => $row->tujuan,
        		'isi_singkat' => $row->isi_singkat,
        	    );

        $list['title'] = 'Administrasi Umum';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_keluar/detail', $data);
        $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_keluar'));
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
            'action' => site_url('buku_surat_keluar/create_action'),
    	    'id' => set_value('id'),
    	    'nama_surat' => set_value('nama_surat'),
    	    'file_surat' => set_value('file_surat'),
    	    'no_surat_kel' => set_value('no_surat_kel'),
    	    'tgl_surat' => set_value('tgl_surat'),
    	    'tujuan' => set_value('tujuan'),
    	    'isi_singkat' => set_value('isi_singkat'),
    	);
        $list['title'] = 'Administrasi Umum';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_keluar/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Buku_surat_keluar_model->tambah_surat_keluar();
            $this->session->set_flashdata('flash', 'Surat Keluar ditambahkan');
            redirect(site_url('buku_surat_keluar'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Buku_surat_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buku_surat_keluar/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_surat' => set_value('nama_surat', $row->nama_surat),
        		'no_surat_kel' => set_value('no_surat_kel', $row->no_surat_kel),
        		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
        		'tujuan' => set_value('tujuan', $row->tujuan),
        		'isi_singkat' => set_value('isi_singkat', $row->isi_singkat),
                'file_surat' => set_value('file_surat', $row->file_surat),
        	    );

            $list['title'] = 'Administrasi Umum';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('buku_desa/buku_surat_keluar/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Buku_surat_keluar_model->update_surat_keluar($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Surat Keluar diupdate');
            redirect(site_url('buku_surat_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buku_surat_keluar_model->get_by_id($id);

        if ($row) {
            // Hapus file surat di folder arsip surat keluar
            $file_scan = './folder_arsip/surat_keluar/' . $row->file_surat;
            if (is_file($file_scan)) {
                unlink($file_scan);
                //break;
            }
            $this->Buku_surat_keluar_model->delete($id);
            $this->session->set_flashdata('flash', 'Surat Keluar dihapus');
            redirect(site_url('buku_surat_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_keluar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_surat', 'nama surat', 'trim|required');
	$this->form_validation->set_rules('no_surat_kel', 'no surat kel', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|required');
	$this->form_validation->set_rules('isi_singkat', 'isi singkat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'buku_surat_keluar_data' => $this->Buku_surat_keluar_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('buku_desa/buku_surat_keluar/pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('buku_surat_keluar.pdf', 'D'); 
    }

    function cetak()
    {
        $data = array(
            'surat_keluar' => $this->Buku_surat_keluar_model->get_all(),
            'start' => 0
        );
        $data['desa']           = $this->db->get('identitas_desa')->result_array();
        $data['setting']        = $this->db->get('setting')->result_array();
        $this->load->view('buku_desa/buku_surat_keluar/cetak', $data);
    }

}

/* End of file Buku_surat_keluar.php */
/* Location: ./application/controllers/Buku_surat_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-11 08:22:25 */
/* http://harviacode.com */