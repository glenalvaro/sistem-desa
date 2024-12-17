<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan_penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Layanan_penduduk_model');
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
            $config['base_url'] = base_url() . 'layanan_penduduk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'layanan_penduduk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'layanan_penduduk/index';
            $config['first_url'] = base_url() . 'layanan_penduduk/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Layanan_penduduk_model->total_rows($q);
        $layanan_penduduk = $this->Layanan_penduduk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $get_penduduk = $this->db->get('data_penduduk')->result_array();

        $data = array(
            'layanan_penduduk_data' => $layanan_penduduk,
            'nama_penduduk' => $get_penduduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $list['title'] = 'Pendaftar Layanan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('layanan_penduduk/table', $data);
            $this->load->view('templates/footer');
    }

    public function tambah_pengguna()
    {
        $this->Layanan_penduduk_model->create();
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data pengguna di tambahkan.</div>');
        redirect('layanan_penduduk');
    }

    public function tambah_telepon($id)
    {
        $row = $this->input->post('no_telepon');

        $data = [
            'no_telepon' => $row
        ];

        $this->db->where_in('id', $this->input->post('id'));
        $this->db->update('layanan_penduduk', $data);
        $this->session->set_flashdata('flash', 'Nomor Telepon Ditambahkan!');
        redirect('layanan_penduduk');
    }

    public function reset_pin($id)
    {
        //Siapkan pin acak
        $pin_new = random_int(100000, 999999);

        $data = [
            'pin' => password_hash($this->input->post('pin'), PASSWORD_DEFAULT)
        ];

        $this->db->where_in('id', $this->input->post('id'));
        $this->db->update('layanan_penduduk', $data);
        $this->session->set_flashdata('flash', 'Berhasil Reset PIN');
        redirect('layanan_penduduk');
    }
    
    public function delete($id) 
    {
        $row = $this->Layanan_penduduk_model->get_by_id($id);

        if ($row) {
            $this->Layanan_penduduk_model->delete($id);
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('layanan_penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan_penduduk'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_pend', 'id_pend', 'trim|required');
    	$this->form_validation->set_rules('pin', 'pin', 'trim|required');
    	$this->form_validation->set_rules('tgl_buat', 'tgl buat', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Layanan_penduduk.php */
/* Location: ./application/controllers/Layanan_penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-09-30 08:13:27 */
/* http://harviacode.com */