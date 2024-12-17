<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Text_berjalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Text_berjalan_model');
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
            $config['base_url'] = base_url() . 'text_berjalan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'text_berjalan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'text_berjalan/index';
            $config['first_url'] = base_url() . 'text_berjalan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Text_berjalan_model->total_rows($q);
        $text_berjalan = $this->Text_berjalan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'text_berjalan_data' => $text_berjalan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $list['title'] = 'Teks Berjalan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('text_berjalan/table', $data);
            $this->load->view('templates/footer');
    }


    public function create() 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data = array(
            'button' => 'Create',
            'action' => site_url('text_berjalan/create_action'),
    	    'id' => set_value('id'),
    	    'isi' => set_value('isi'),
    	    'tautan_artikel' => set_value('tautan_artikel'),
    	    'judul_tautan' => set_value('judul_tautan'),
    	    'status' => set_value('status'),
	);
        $list['title'] = 'Teks Berjalan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('text_berjalan/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'isi' => $this->input->post('isi',TRUE),
    		'tautan_artikel' => $this->input->post('tautan_artikel',TRUE),
    		'judul_tautan' => $this->input->post('judul_tautan',TRUE),
    		'status' => $this->input->post('status',TRUE),
    	    );

            $this->Text_berjalan_model->insert($data);
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('text_berjalan'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Text_berjalan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('text_berjalan/update_action'),
        		'id' => set_value('id', $row->id),
        		'isi' => set_value('isi', $row->isi),
        		'tautan_artikel' => set_value('tautan_artikel', $row->tautan_artikel),
        		'judul_tautan' => set_value('judul_tautan', $row->judul_tautan),
        		'status' => set_value('status', $row->status),
        	);
            
            $list['title'] = 'Teks Berjalan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('text_berjalan/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('text_berjalan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'isi' => $this->input->post('isi',TRUE),
    		'tautan_artikel' => $this->input->post('tautan_artikel',TRUE),
    		'judul_tautan' => $this->input->post('judul_tautan',TRUE),
    		'status' => $this->input->post('status',TRUE),
    	    );

            $this->Text_berjalan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('text_berjalan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Text_berjalan_model->get_by_id($id);

        if ($row) {
            $this->Text_berjalan_model->delete($id);
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('text_berjalan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('text_berjalan'));
        }
    }

    public function delete_all()
    {
        $id = $_POST['id']; 
        $this->Text_berjalan_model->Delete_all($id); 
        $this->session->set_flashdata('flash','Data yang dipilih terhapus');
        redirect('text_berjalan');
    }

    public function status_lock($id = '')
    {
        $this->Text_berjalan_model->lock_status($id, 0);
        $this->session->set_flashdata('flash', 'Data Dinon-aktifkan');
        redirect("text_berjalan");
    }

    public function status_unlock($id = '')
    {
        $this->Text_berjalan_model->lock_status($id, 1);
        $this->session->set_flashdata('flash', 'Data Diaktifkan');
        redirect("text_berjalan");
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('isi', 'isi', 'trim|required');
    	$this->form_validation->set_rules('status', 'status', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Text_berjalan.php */
/* Location: ./application/controllers/Text_berjalan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-26 12:52:02 */
/* http://harviacode.com */