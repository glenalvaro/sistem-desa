<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Artikel_model');
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
            $config['base_url'] = base_url() . 'artikel/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'artikel/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'artikel/index';
            $config['first_url'] = base_url() . 'artikel/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Artikel_model->total_rows($q);
        $artikel = $this->Artikel_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'artikel_data' => $artikel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Artikel';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('artikel/artikel_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id, $slug) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Artikel_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'judul' => $row->judul,
    		'isi' => $row->isi,
    		'user' => $row->user,
    		'gambar' => $row->gambar,
    		'tgl_created' => $row->tgl_created,
    	    );

            $list['title'] = 'Artikel Form';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('artikel/artikel_read', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function create() 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = array(
            'button' => 'Create',
            'action' => site_url('artikel/create_action'),
    	    'id' => set_value('id'),
    	    'judul' => set_value('judul'),
    	    'isi' => set_value('isi'),
    	    'user' => set_value('user'),
    	    'gambar' => set_value('gambar'),
    	    'tgl_created' => set_value('tgl_created'),
            'user' => $user
	   );
      
        $list['title'] = 'Artikel';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('artikel/artikel_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Artikel_model->tambah_artikel();
            $this->session->set_flashdata('flash', 'Data artikel ditambahkan');
            redirect(site_url('artikel'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('artikel/update_action'),
        		'id' => set_value('id', $row->id),
        		'judul' => set_value('judul', $row->judul),
        		'isi' => set_value('isi', $row->isi),
        		'user' => set_value('user', $user),
        		'gambar' => set_value('gambar', $row->gambar),
        		'tgl_created' => set_value('tgl_created', $row->tgl_created),
        	);

            $list['title'] = 'Artikel';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('artikel/artikel_form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Artikel_model->update($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data artikel diupdate');
            redirect(site_url('artikel'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            // Hapus gambar
            $gbr_artikel = './assets/img/foto_artikel/' . $row->gambar;
            if (is_file($gbr_artikel)) {
                unlink($gbr_artikel);
                //break;
            }
            $this->Artikel_model->delete($id);
            $this->session->set_flashdata('flash', 'Data artikel dihapus');
            redirect(site_url('artikel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function lock($id = '')
    {
        $this->Artikel_model->lock($id, 0);
        $this->session->set_flashdata('flash', 'Artikel Dinon-aktifkan');
        redirect("artikel");
    }

    public function unlock($id = '')
    {
        $this->Artikel_model->lock($id, 1);
        $this->session->set_flashdata('flash', 'Artikel Diaktifkan');
        redirect("artikel");
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('isi', 'isi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-03-12 03:38:29 */
/* http://harviacode.com */