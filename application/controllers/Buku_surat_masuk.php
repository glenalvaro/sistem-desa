<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buku_surat_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Buku_surat_masuk_model');
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
            $config['base_url'] = base_url() . 'buku_surat_masuk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'buku_surat_masuk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'buku_surat_masuk/index';
            $config['first_url'] = base_url() . 'buku_surat_masuk/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Buku_surat_masuk_model->total_rows($q);
        $buku_surat_masuk = $this->Buku_surat_masuk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'buku_surat_masuk_data' => $buku_surat_masuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['list_jabt'] = $this->db->get('jabatan_perangkat')->result_array();
        $data['list_suratID'] = $this->db->get('buku_surat_masuk')->result_array();
        $data['list_per'] = $this->db->get('perangkat_desa')->result_array();

        $list['title'] = 'Surat Masuk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_masuk/table', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Buku_surat_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'nama_surat' => $row->nama_surat,
    		'tgl_terima' => $row->tgl_terima,
    		'no_surat' => $row->no_surat,
    		'tgl_surat' => $row->tgl_surat,
    		'pengirim_surat' => $row->pengirim_surat,
    		'perihal' => $row->perihal,
    		'disposisi_ke' => $row->disposisi_ke,
    		'isi_disposisi' => $row->isi_disposisi,
    		'file_surat_masuk' => $row->file_surat_masuk,
	    );

        $data['list_jab'] = $this->db->get('jabatan_perangkat')->result_array();

        $list['title'] = 'Surat Masuk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_masuk/detail', $data);
        $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_masuk'));
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
            'action' => site_url('buku_surat_masuk/create_action'),
    	    'id' => set_value('id'),
    	    'nama_surat' => set_value('nama_surat'),
    	    'tgl_terima' => set_value('tgl_terima'),
    	    'no_surat' => set_value('no_surat'),
    	    'tgl_surat' => set_value('tgl_surat'),
    	    'pengirim_surat' => set_value('pengirim_surat'),
    	    'perihal' => set_value('perihal'),
    	    'disposisi_ke' => set_value('disposisi_ke'),
    	    'isi_disposisi' => set_value('isi_disposisi'),
	        'file_surat_masuk' => set_value('file_surat_masuk'),
       );

        $data['list_jab'] = $this->db->get('jabatan_perangkat')->result_array();

        $list['title'] = 'Surat Masuk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_masuk/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Buku_surat_masuk_model->tambah_surat_masuk();
            $this->session->set_flashdata('flash', 'Surat Masuk ditambahkan');
            redirect(site_url('buku_surat_masuk'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Buku_surat_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('buku_surat_masuk/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_surat' => set_value('nama_surat', $row->nama_surat),
        		'tgl_terima' => set_value('tgl_terima', $row->tgl_terima),
        		'no_surat' => set_value('no_surat', $row->no_surat),
        		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
        		'pengirim_surat' => set_value('pengirim_surat', $row->pengirim_surat),
        		'perihal' => set_value('perihal', $row->perihal),
        		'disposisi_ke' => set_value('disposisi_ke', $row->disposisi_ke),
        		'isi_disposisi' => set_value('isi_disposisi', $row->isi_disposisi),
        		'file_surat_masuk' => set_value('file_surat_masuk', $row->file_surat_masuk),
	    );

        $data['list_jab'] = $this->db->get('jabatan_perangkat')->result_array();
          
        $list['title'] = 'Surat Masuk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/buku_surat_masuk/form', $data);
        $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Buku_surat_masuk_model->update_surat_masuk($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Surat Masuk diupdate');
            redirect(site_url('buku_surat_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Buku_surat_masuk_model->get_by_id($id);

        if ($row) {
            // Hapus file surat di folder arsip surat masuk
            $file_scan1 = './folder_arsip/surat_masuk/' . $row->file_surat_masuk;
            if (is_file($file_scan1)) {
                unlink($file_scan1);
                //break;
            }
            $this->Buku_surat_masuk_model->delete($id);
            $this->session->set_flashdata('flash', 'Surat Masuk dihapus');
            redirect(site_url('buku_surat_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('buku_surat_masuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_surat', 'nama surat', 'trim|required');
	$this->form_validation->set_rules('tgl_terima', 'tgl terima', 'trim|required');
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('pengirim_surat', 'pengirim surat', 'trim|required');
	$this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
	$this->form_validation->set_rules('isi_disposisi', 'isi disposisi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function unduh_pdf()
    {
        $data = array(
            'buku_surat_masuk_data' => $this->Buku_surat_masuk_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('buku_desa/buku_surat_masuk/pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('buku_surat_masuk.pdf', 'D'); 
    }

    function cetak_disposisi($id)
    {
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
        $list['list_jab'] = $this->db->get('jabatan_perangkat')->result_array();

        $where = array('id' => $id);
        $list['detailSurat'] = $this->Buku_surat_masuk_model->detail_surat($where, 'buku_surat_masuk')->result();
         $this->load->view('buku_desa/buku_surat_masuk/cetak_disposisi', $list);
    }

}

/* End of file Buku_surat_masuk.php */
/* Location: ./application/controllers/Buku_surat_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-13 05:21:46 */
/* http://harviacode.com */