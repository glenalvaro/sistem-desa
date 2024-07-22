<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Umkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Umkm_model');
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
            $config['base_url'] = base_url() . 'umkm/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'umkm/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'umkm/index';
            $config['first_url'] = base_url() . 'umkm/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Umkm_model->total_rows($q);
        $umkm = $this->Umkm_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'umkm_data' => $umkm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/umkm_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Umkm_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'no_tlp' => $row->no_tlp,
		'nama_usaha' => $row->nama_usaha,
		'id_kategori' => $row->id_kategori,
		'deskripsi' => $row->deskripsi,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'tgl_posting' => $row->tgl_posting,
		'gambar' => $row->gambar,
	    );
          
            $list['title'] = 'Usaha Mikro';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('umkm/umkm_read', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
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
            'action' => site_url('umkm/create_action'),
    	    'id' => set_value('id'),
    	    'nama' => set_value('nama'),
    	    'no_tlp' => set_value('no_tlp'),
    	    'nama_usaha' => set_value('nama_usaha'),
    	    'id_kategori' => set_value('id_kategori'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'latitude' => set_value('latitude'),
    	    'longitude' => set_value('longitude'),
    	    'tgl_posting' => set_value('tgl_posting'),
    	    'gambar' => set_value('gambar'),
	       );
      
        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/umkm_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'nama' => $this->input->post('nama',TRUE),
    		'no_tlp' => $this->input->post('no_tlp',TRUE),
    		'nama_usaha' => $this->input->post('nama_usaha',TRUE),
    		'id_kategori' => $this->input->post('id_kategori',TRUE),
    		'deskripsi' => $this->input->post('deskripsi',TRUE),
    		'latitude' => $this->input->post('latitude',TRUE),
    		'longitude' => $this->input->post('longitude',TRUE),
    		'tgl_posting' => $this->input->post('tgl_posting',TRUE),
    		'gambar' => $this->input->post('gambar',TRUE),
    	    );

            $this->Umkm_model->insert($data);
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('umkm'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Umkm_model->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('umkm/update_action'),
    		'id' => set_value('id', $row->id),
    		'nama' => set_value('nama', $row->nama),
    		'no_tlp' => set_value('no_tlp', $row->no_tlp),
    		'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
    		'id_kategori' => set_value('id_kategori', $row->id_kategori),
    		'deskripsi' => set_value('deskripsi', $row->deskripsi),
    		'latitude' => set_value('latitude', $row->latitude),
    		'longitude' => set_value('longitude', $row->longitude),
    		'tgl_posting' => set_value('tgl_posting', $row->tgl_posting),
    		'gambar' => set_value('gambar', $row->gambar),
    	    );
           
            $list['title'] = 'Usaha Mikro';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('umkm/umkm_form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'nama' => $this->input->post('nama',TRUE),
    		'no_tlp' => $this->input->post('no_tlp',TRUE),
    		'nama_usaha' => $this->input->post('nama_usaha',TRUE),
    		'id_kategori' => $this->input->post('id_kategori',TRUE),
    		'deskripsi' => $this->input->post('deskripsi',TRUE),
    		'latitude' => $this->input->post('latitude',TRUE),
    		'longitude' => $this->input->post('longitude',TRUE),
    		'tgl_posting' => $this->input->post('tgl_posting',TRUE),
    		'gambar' => $this->input->post('gambar',TRUE),
	    );
            $this->Umkm_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('umkm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Umkm_model->get_by_id($id);

        if ($row) {
            $this->Umkm_model->delete($id);
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('umkm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');
	$this->form_validation->set_rules('nama_usaha', 'nama usaha', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
	$this->form_validation->set_rules('tgl_posting', 'tgl posting', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "umkm.xls";
        $judul = "umkm";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Tlp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Usaha");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
    	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
    	xlsWriteLabel($tablehead, $kolomhead++, "Latitude");
    	xlsWriteLabel($tablehead, $kolomhead++, "Longitude");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Posting");
    	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");

	foreach ($this->Umkm_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_tlp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_usaha);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kategori);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->latitude);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->longitude);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_posting);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function pdf()
    {
        $data = array(
            'umkm_data' => $this->Umkm_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('umkm/umkm_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('umkm.pdf', 'D'); 
    }


    public function kategori()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $list['umkm_kat'] = $this->db->get('kategori_umkm')->result_array();

        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori()
    {
        $this->db->insert('kategori_umkm', ['nama' => $this->input->post('nama')]);
        $this->session->set_flashdata('flash', 'Kategori Ditambahkan!');
        redirect('umkm/kategori');
    }

    public function update_kategori($id)
    {
        $this->Umkm_model->updateKategoriById($id);
        $this->session->set_flashdata('flash', 'Kategori Diupdate!');
        redirect('umkm/kategori');
    }

    public function hapus_kategori($id)
    {
        $where = array('id' => $id);
        $this->Umkm_model->hapus_data_kat($where, 'kategori_umkm');
        $this->session->set_flashdata('flash', 'Kategori Dihapus!');
        redirect('umkm/kategori');
    }

}

/* End of file Umkm.php */
/* Location: ./application/controllers/Umkm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-07-22 07:55:29 */
/* http://harviacode.com */