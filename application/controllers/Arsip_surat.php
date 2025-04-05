<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_surat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Arsip_surat_model');
	}

	public function index()
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['surat_log'] = $this->Arsip_surat_model->get_all();

        $list['title'] = 'Arsip Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('arsip/arsip_surat', $data);
        $this->load->view('templates/footer');
	}

	public function edit($id)
    {
        $this->Arsip_surat_model->update_arsip($id);
        $this->session->set_flashdata('flash', 'Data Diupdate!');
        redirect('arsip_surat');
    }

    public function delete($id) 
    {
        $val = $this->Arsip_surat_model->get_arsip_id($id);

        if ($val) {
            // Hapus file difolder arsip dokumen
            $file_dk2 = './folder_arsip/file_surat/' . $val->file_srt.'.pdf';
            if (is_file($file_dk2)) {
                unlink($file_dk2);
                //break;
            }
            $this->Arsip_surat_model->delete($id);
            $this->session->set_flashdata('flash', 'Surat dihapus');
            redirect(site_url('arsip_surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('arsip_surat'));
        }
    }

    public function graph_surat()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $data['list_surat'] = $this->Arsip_surat_model->count_surat();

        $list['title'] = 'Grafik Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('arsip/grafik_surat', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $data = array(
            'surat_arsip' => $this->Arsip_surat_model->get_all(),
            'start' => 0
        );
        $data['desa']           = $this->db->get('identitas_desa')->result_array();
        $data['setting']        = $this->db->get('setting')->result_array();
        $this->load->view('arsip/cetak', $data);   
    }

    public function unduh_arsip()
    {

        $data = array(
            'surat_arsip' =>  $this->Arsip_surat_model->get_all(),
            'start' => 0
        );
        $data['desa']           = $this->db->get('identitas_desa')->result_array();
        $data['setting']        = $this->db->get('setting')->result_array();
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('arsip/arsip_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->AddPage('L');
        $pdf->WriteHTML($html);
        $pdf->Output('arsip_surat.pdf', 'I'); 
    }
}