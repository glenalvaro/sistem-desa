<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_bantuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Program_bantuan_model');
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
            $config['base_url'] = base_url() . 'program_bantuan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'program_bantuan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'program_bantuan/index';
            $config['first_url'] = base_url() . 'program_bantuan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_bantuan_model->total_rows($q);
        $program_bantuan = $this->Program_bantuan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'program_bantuan_data' => $program_bantuan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $list['title'] = 'Bantuan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/table', $data);
            $this->load->view('templates/footer');
    }

    public function panduan()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $list['title'] = 'Bantuan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('bantuan/panduan');
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Program_bantuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_program' => $row->nama_program,
		'sasaran_program' => $row->sasaran_program,
		'keterangan' => $row->keterangan,
		'asal_dana' => $row->asal_dana,
		'waktu_program' => $row->waktu_program,
	    );
            $list['title'] = 'Akses';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/detail', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
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
            'action' => site_url('program_bantuan/create_action'),
	    'id' => set_value('id'),
	    'nama_program' => set_value('nama_program'),
	    'sasaran_program' => set_value('sasaran_program'),
	    'keterangan' => set_value('keterangan'),
	    'asal_dana' => set_value('asal_dana'),
	    'waktu_program' => set_value('waktu_program'),
	);
        $list['title'] = 'Bantuan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('bantuan/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_program' => $this->input->post('nama_program',TRUE),
		'sasaran_program' => $this->input->post('sasaran_program',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'asal_dana' => $this->input->post('asal_dana',TRUE),
		'sdate' => $this->input->post('sdate',TRUE),
		'edate' => $this->input->post('edate',TRUE),
	    );

            $this->Program_bantuan_model->insert($data);
            $this->session->set_flashdata('flash', 'Data Program ditambahkan');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Program_bantuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('program_bantuan/update_action'),
		'id' => set_value('id', $row->id),
		'nama_program' => set_value('nama_program', $row->nama_program),
		'sasaran_program' => set_value('sasaran_program', $row->sasaran_program),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'asal_dana' => set_value('asal_dana', $row->asal_dana),
		'waktu_program' => set_value('waktu_program', $row->waktu_program),
	    );
            $list['title'] = 'Bantuan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_program' => $this->input->post('nama_program',TRUE),
		'sasaran_program' => $this->input->post('sasaran_program',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'asal_dana' => $this->input->post('asal_dana',TRUE),
		'waktu_program' => $this->input->post('waktu_program',TRUE),
	    );

            $this->Program_bantuan_model->update($this->input->post('id', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Program_bantuan_model->get_by_id($id);

        if ($row) {
            $this->Program_bantuan_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('program_bantuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_program', 'nama program', 'trim|required');
	$this->form_validation->set_rules('sasaran_program', 'sasaran program', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('asal_dana', 'asal dana', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "program_bantuan.xls";
        $judul = "program_bantuan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Sasaran Program");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Asal Dana");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Program");

	foreach ($this->Program_bantuan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sasaran_program);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_dana);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_program);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Program_bantuan.php */
/* Location: ./application/controllers/Program_bantuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-14 13:17:05 */
/* http://harviacode.com */