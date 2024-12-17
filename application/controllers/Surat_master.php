<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        require_once(FCPATH.'assets/vendor/html2pdf/html2pdf.class.php');
        $this->load->model('Surat_master_model');
        $this->load->model('Setting_model', 'setting');
        $this->load->model('Layanan_surat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa']           = $this->db->get('identitas_desa')->result_array();
        $list['setting']        = $this->db->get('setting')->result_array();
        $data['daftar_surat']   = $this->Surat_master_model->get_all();

        $list['title'] = 'Pengaturan Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('surat_master/list_surat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat()
    {
       $data = [
                'nama' => $this->input->post('nama'),
                'url' => $this->input->post('url'),
                'active' => $this->input->post('active'),
                'singkatan' => $this->input->post('singkatan'),
                'tampil_surat' => 0,
        ];
        $this->db->insert('surat_master', $data);
        $this->session->set_flashdata('flash', 'Data Surat Ditambahkan!');
        redirect(site_url('surat_master'));
    }

    public function update_surat($id)
    {
        $this->Surat_master_model->updateSuratById($id);
        $this->session->set_flashdata('flash', 'Surat Diupdate!');
        redirect(site_url('surat_master'));
    }

    public function hapus_surat($id)
    {
        $where = array('id' => $id);
        $this->Surat_master_model->hapusSuratById($where, 'surat_master');
        $this->session->set_flashdata('flash', 'Surat Dihapus!');
        redirect(site_url('surat_master'));
    }

    public function surat_lock($id = '')
    {
        $this->Surat_master_model->lock_surat($id, 0);
        $this->session->set_flashdata('flash', 'Surat Dinon-aktifkan');
        redirect(site_url('surat_master'));
    }

    public function surat_unlock($id = '')
    {
        $this->Surat_master_model->lock_surat($id, 1);
        $this->session->set_flashdata('flash', 'Surat Diaktifkan');
        redirect(site_url('surat_master'));
    }

    public function syarat_surat($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Surat_master_model->get_by_id($id);

        $data = array(
            'button' => 'Update',
            'action' => site_url('surat_master/proses_update/'.$id),
            'id_surat' => $row->id,
            'nama' => $row->nama,
        );

        $data['syarat_surat'] = $this->Surat_master_model->get_syarat_id($id);
        $data['list_syarat'] = $this->Layanan_surat_model->daftar_persyaratan();

        $list['title'] = 'Persyaratan Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('surat_master/syarat_surat', $data);
        $this->load->view('templates/footer');
    }

    public function proses_update($id)
    {
        $syarat = $this->input->post('id_syarat');
        unset($_POST['id_syarat']);
        $this->Surat_master_model->update_syarat_surat($id, $syarat);
        $this->session->set_flashdata('flash', 'Persyaratan Diupdate');
        redirect('surat_master');
    }

    public function panduan_surat()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $list['title'] = 'Panduan Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('surat_master/panduan_surat', $data);
        $this->load->view('templates/footer');
    }

    public function pengaturan_surat()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        
        $list['desa']           = $this->db->get('identitas_desa')->result_array();
        $list['setting']        = $this->db->get('setting')->result_array();
        $data['isian_header']   = $this->Surat_master_model->get_header();

        $list['title'] = 'Pengaturan Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('surat_master/pengaturan_surat', $data);
        $this->load->view('templates/footer');
    }

    public function tinjau_header()
    {
        $get_desa      = $this->setting->get_data_desa();
        $get_set       = $this->setting->get_data_app();

        $array_replace = array(
            '[Nama_Desa]'           => strtoupper($get_desa['nama_desa']),
            '[Kode_Pos]'            => $get_desa['kode_pos'],
            '[Alamat_Kantor]'       => $get_desa['alamat_kantor'],
            '[No_HP]'               => $get_desa['no_hp'],
            '[Nama_Kecamatan]'      => strtoupper($get_desa['nama_kecamatan']),
            '[Nama_Kabupaten]'      => strtoupper($get_desa['nama_kabupaten']),
            '[Nama_Provinsi]'       => strtoupper($get_desa['nama_provinsi']),
            '[logo_surat]'          => to_base64(FCPATH. LOKASI_LOGO_DESA . $get_desa['logo_desa']),
            '[Sebutan_Desa]'        => strtoupper($get_set['sebutan_desa']),
            '[Sebutan_Dusun]'       => strtoupper($get_set['sebutan_dusun']),
            '[Sebutan_Kabupaten]'   => strtoupper($get_set['sebutan_kabupaten']),
        );

        $html        = $_POST['kop_head'];
        $html        = str_replace(array_keys($array_replace), array_values($array_replace), $html);

        $html2pdf = new HTML2PDF('P', 'F4', 'en');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($html);
        $html2pdf->Output('demo_header.pdf', 'I');
    }

    public function simpan_header($id_header)
    {
        $post = $_POST['header_surat'];
        $id = $id_header;
        $data = array(
            'header' => $post,
        );
        $this->Surat_master_model->update_header($id, $data);
        $this->session->set_flashdata('flash', 'Header Surat Diupdate!');
        redirect('surat_master');
    }

}

/* End of file Surat_master.php */
/* Location: ./application/controllers/Surat_master.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-07 04:25:49 */
/* http://harviacode.com */