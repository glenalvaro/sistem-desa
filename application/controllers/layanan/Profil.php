<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		cek_penduduk();
		$this->load->model('/mlayanan/Session_model', 'sesi');
	 	$this->load->model('Perangkat_desa_model', 'perangkat');
	 	$this->load->model('Data_penduduk_model', 'penduduk');
	 	$this->load->model('/mlayanan/Profil_model', 'profil');
	}

	public function index()
	{
		$userdata = $this->session->userdata('nik_pend');
		$list['penduduk'] = $this->sesi->get_penduduk($userdata);

		//tampil data dari table identitas desa
		$list['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$list['setting'] = $this->db->get('setting')->result_array();

		$row = $this->profil->get_by_nik($userdata);

        if ($row) {
        
        $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_kk' => $row->no_kk,
    		'nama_penduduk' => $row->nama_penduduk,
    		'hubungan' => $row->hubungan,
            'hubungan_keluarga_id' => $row->hubungan_keluarga_id,
    		'sex' => $row->sex,
            'jenis_kelamin' => $row->jenis_kelamin,
    		'agama' => $row->agama,
    		'status' => $row->status,
    		'tempat_lahir' => $row->tempat_lahir,
    		'tgl_lahir' => $row->tgl_lahir,
    		'kelahiran_anak_ke' => $row->kelahiran_anak_ke,
    		'pendidikan_kk' => $row->pendidikan_kk,
    		'pendidikan_sedang' => $row->pendidikan_sedang,
    		'pekerjaan' => $row->pekerjaan,
    		'suku_penduduk' => $row->suku_penduduk,
    		'status_warganegara' => $row->status_warganegara,
    		'dokumen_paspor' => $row->dokumen_paspor,
    		'tgl_paspor' => $row->tgl_paspor,
    		'dokumen_kitas' => $row->dokumen_kitas,
    		'negara_asal' => $row->negara_asal,
    		'nik_ayah' => $row->nik_ayah,
    		'nik_ibu' => $row->nik_ibu,
    		'nama_ayah' => $row->nama_ayah,
    		'nama_ibu' => $row->nama_ibu,
    		'dusun' => $row->dusun,
    		'alamat_sebelumnya' => $row->alamat_sebelumnya,
    		'alamat_sekarang' => $row->alamat_sekarang,
    		'no_telepon' => $row->no_telepon,
    		'email' => $row->email,
    		'status_kawin' => $row->status_kawin,
    		'darah_golongan' => $row->darah_golongan,
    		'asuransi_kesehatan' => $row->asuransi_kesehatan,
    		'no_asuransi' => $row->no_asuransi,
    		'bpjs_ketenagakerjaan' => $row->bpjs_ketenagakerjaan,
    		'keterangan' => $row->keterangan,
    		'foto' => $row->foto,
    		'status_dasar' => $row->status_dasar,
    		'tgl_terdaftar' => $row->tgl_terdaftar,
    		'created_by' => $row->created_by,
	    );
            $list['title'] = 'Profil';
			$this->load->view('layanan/template/head', $list);
			$this->load->view('layanan/profil', $data);
			$this->load->view('layanan/template/foot');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('/layanan/profil'));
        }
	}

	public function cetak() 
    {
    	$userdata = $this->session->userdata('nik_pend');
    	$data['penduduk'] = $this->sesi->get_penduduk($userdata);

        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['data_pend'] = $this->profil->get_by_nik($userdata);
        $this->load->view('layanan/print_biodata', $data);
    }
	
}