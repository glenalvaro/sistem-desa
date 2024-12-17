<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media_sosial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Media_sosial_model');
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
            $config['base_url'] = base_url() . 'media_sosial/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'media_sosial/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'media_sosial/index';
            $config['first_url'] = base_url() . 'media_sosial/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Media_sosial_model->total_rows($q);
        $media_sosial = $this->Media_sosial_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'media_sosial_data' => $media_sosial,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Media Sosial';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('media_sosial/table', $data);
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
            'action' => site_url('media_sosial/create_action'),
    	    'id' => set_value('id'),
    	    'nama' => set_value('nama'),
    	    'link' => set_value('link'),
    	    'icon' => set_value('icon'),
    	    'tampil' => set_value('tampil'),
	    );

        $list['title'] = 'Media Sosial';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('media_sosial/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Media_sosial_model->insert();
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('media_sosial'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Media_sosial_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('media_sosial/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama' => set_value('nama', $row->nama),
        		'link' => set_value('link', $row->link),
        		'icon' => set_value('icon', $row->icon),
        		'tampil' => set_value('tampil', $row->tampil),
        	);

            $list['title'] = 'Media Sosial';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('media_sosial/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('media_sosial'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Media_sosial_model->update($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('media_sosial'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Media_sosial_model->get_by_id($id);

        if ($row) {
            // Hapus file foto di folder media sosial
            $img_icon = $row->icon;
            $path = './assets/img/icon/media_sosial/';
             // hapus foto lama selain foto default
                if ($img_icon) {
                    unlink(FCPATH . $path . $img_icon);
                }
                $this->Media_sosial_model->delete($id);
                $this->session->set_flashdata('flash', 'Data dihapus');
                redirect(site_url('media_sosial'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('media_sosial'));
        }
    }

    public function status_lock($id = '')
    {
        $this->Media_sosial_model->lock_tampil($id, 0);
        $this->session->set_flashdata('flash', 'Data Dinon-aktifkan');
        redirect("media_sosial");
    }

    public function status_unlock($id = '')
    {
        $this->Media_sosial_model->lock_tampil($id, 1);
        $this->session->set_flashdata('flash', 'Data Diaktifkan');
        redirect("media_sosial");
    }

    public function delete_all()
    {
        $id = $_POST['id']; 
        $this->Media_sosial_model->Delete_all($id); 
        $this->session->set_flashdata('flash','Data yang dipilih terhapus');
        redirect('media_sosial');
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('link', 'link', 'trim|required');
    	$this->form_validation->set_rules('tampil', 'tampil', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Media_sosial.php */
/* Location: ./application/controllers/Media_sosial.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-26 15:31:39 */
/* http://harviacode.com */