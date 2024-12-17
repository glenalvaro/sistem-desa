<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_publik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Informasi_publik_model');
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
            $config['base_url'] = base_url() . 'informasi_publik/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'informasi_publik/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'informasi_publik/index';
            $config['first_url'] = base_url() . 'informasi_publik/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Informasi_publik_model->total_rows($q);
        $informasi_publik = $this->Informasi_publik_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'informasi_publik_data' => $informasi_publik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

            $list['title'] = 'Informasi Publik';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('informasi_publik/table', $data);
            $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Informasi_publik_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'judul_dokumen' => $row->judul_dokumen,
    		'kategori' => $row->kategori,
    		'tahun' => $row->tahun,
    		'aktif' => $row->aktif,
    		'tgl_muat' => $row->tgl_muat,
    		'dokumen' => $row->dokumen,
    	    );

            $list['title'] = 'Informasi Publik';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('informasi_publik/detail', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_publik'));
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
            'action' => site_url('informasi_publik/create_action'),
    	    'id' => set_value('id'),
    	    'judul_dokumen' => set_value('judul_dokumen'),
    	    'kategori' => set_value('kategori'),
    	    'tahun' => set_value('tahun'),
    	    'aktif' => set_value('aktif'),
    	    'tgl_muat' => set_value('tgl_muat'),
    	    'dokumen' => set_value('dokumen'),
    	);
      
        $list['title'] = 'Informasi Publik';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('informasi_publik/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Informasi_publik_model->insert();
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('informasi_publik'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Informasi_publik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('informasi_publik/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul_dokumen' => set_value('judul_dokumen', $row->judul_dokumen),
        		'kategori' => set_value('kategori', $row->kategori),
        		'tahun' => set_value('tahun', $row->tahun),
        		'aktif' => set_value('aktif', $row->aktif),
        		'tgl_muat' => set_value('tgl_muat', $row->tgl_muat),
        		'dokumen' => set_value('dokumen', $row->dokumen),
        	    );
           
            $list['title'] = 'Informasi Publik';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('informasi_publik/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_publik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Informasi_publik_model->update($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('informasi_publik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Informasi_publik_model->get_by_id($id);

        if ($row) {
            // Hapus file difolder arsip informasi publik
            $file_dok = './folder_arsip/informasi_publik/' . $row->dokumen;
            if (is_file($file_dok)) {
                unlink($file_dok);
                //break;
            }
            $this->Informasi_publik_model->delete($id);
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('informasi_publik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi_publik'));
        }
    }

    public function lock($id = '')
    {
        $this->Informasi_publik_model->lock_informasi($id, 0);
        $this->session->set_flashdata('flash', 'Informasi Dinon-aktifkan');
        redirect(site_url('informasi_publik'));
    }

    public function unlock($id = '')
    {
        $this->Informasi_publik_model->lock_informasi($id, 1);
        $this->session->set_flashdata('flash', 'Informasi Diaktifkan');
        redirect(site_url('informasi_publik'));
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_dokumen', 'judul dokumen', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=informasi_publik.doc");

        $data = array(
            'informasi_publik_data' => $this->Informasi_publik_model->get_all(),
            'start' => 0
        );
        $this->load->view('informasi_publik/export',$data);
    }

    function pdf()
    {
        $data = array(
            'informasi_publik_data' => $this->Informasi_publik_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('informasi_publik/unduh', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('informasi_publik.pdf', 'D'); 
    }

}

/* End of file Informasi_publik.php */
/* Location: ./application/controllers/Informasi_publik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-08 17:03:09 */
/* http://harviacode.com */