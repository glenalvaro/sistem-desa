<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/session_model', 'sesi');
		$this->load->model('/mlayanan/Profil_model', 'profil');
		$this->load->model('Dokumen_model', 'dokumen');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$data['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data dokumen dari table persyaratan
		$data['list_dk'] = $this->db->get('daftar_persyaratan')->result_array();

		//ambil file dokumen berdasarkan id penduduk yang sedang login
		$data['list_data'] = $this->dokumen->get_dok_user($userdata);

		$data['id_pend'] = $this->profil->get_by_nik($userdata);

		$data['title'] = 'Dokumen';
		$this->load->view('layanan/template/head', $data);
		$this->load->view('layanan/dokumen', $data);
		$this->load->view('layanan/template/foot');
	}

	public function unggah_dok()
	{
		$this->dokumen->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Dokumen di tambahkan.</div>');
        redirect('/layanan/dokumen');
	}

	public function hapus($id) 
    {
        $row = $this->dokumen->get_by_id($id);

        if ($row) {
            // Hapus file difolder arsip dokumen
            $file_dk = './folder_arsip/dokumen/' . $row->file;
            if (is_file($file_dk)) {
                unlink($file_dk);
                //break;
            }
            $this->dokumen->hapus_dok($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Dokumen di hapus.</div>');
        redirect('/layanan/dokumen');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Dokumen tidak ditemukan.</div>');
        redirect('/layanan/dokumen');
        }
    }

    //cek duplicate nama dokumen
    public function cek_nama_dok()
    {
    	$userdata = $this->session->userdata('nik_pend');
    	$data = $this->profil->get_by_nik($userdata);

    	$vai = $_POST["val_dok"];
		if(!empty($vai)) {
		  $query = "SELECT * FROM dokumen_penduduk WHERE id_penduduk=$data->id AND nama='" . $vai . "'";
		  $result = $this->db->query($query);
		  $count = $result->num_rows();
		  if($count>0) {
		    echo "<span> Dokumen ini sudah terdaftar .</span>";
		    echo "<script>$('#btnDok').prop('disabled',true);</script>";
		  }else{
		    echo "<script>$('#btnDok').prop('disabled',false);</script>";
		  }
		}
    }

	
}