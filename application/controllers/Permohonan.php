<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
        require_once(FCPATH.'assets/vendor/html2pdf/html2pdf.class.php');
		$this->load->model('Permohonan_surat_model', 'pemohon');
		$this->load->model('Layanan_surat_model');
		$this->load->model('Data_penduduk_model', 'penduduk');
		$this->load->model('Surat_master_model', 'surat_master');
		$this->load->model('Perangkat_desa_model', 'perangkat');
		$this->load->model('Setting_model', 'setting');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['daftar_pemohon'] = $this->pemohon->daftar_permohonan();

		$data['title'] = 'Permohonan Surat';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('permohonan/table', $data);
		$this->load->view('templates/footer');
	}

    public function daftar_diterima()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        //tampil data dari table identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();

        //ambil data pengaturan dari table setting
        $data['setting'] = $this->db->get('setting')->result_array();

        $data['daftar_terima'] = $this->pemohon->daftar_permohonan_diterima();

        $data['title'] = 'Permohonan Surat Diterima';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('permohonan/surat_diterima', $data);
        $this->load->view('templates/footer');
    }

	public function daftar_ditolak()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['daftar_tolak'] = $this->pemohon->daftar_permohonan_tolak();

		$data['title'] = 'Permohonan Surat Ditolak';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('permohonan/surat_ditolak', $data);
		$this->load->view('templates/footer');
	}

	public function periksa_surat($id, $id_pemohon)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        //ambil data permohonan berdasarkan id yang sama
        $main 	= $this->pemohon->get_permohonan_by_id($id);
        $key 	= $this->penduduk->get_by_id($id_pemohon);
        $data = array(
        	'id'			=> $main->id,
    		'id_surat' 		=> $main->id_surat,
			'jenis_surat' 	=> $main->jenis_surat,
			'no_hp_aktif' 	=> $main->no_hp_aktif,
			'keperluan' 	=> $main->keperluan,
			'id_pemohon' => $key->id,
			'nik' => $key->nik,
    		'no_kk' => $key->no_kk,
    		'nama_penduduk' => $key->nama_penduduk,
    		'sex' => $key->sex,
    		'tempat_lahir' => $key->tempat_lahir,
    		'tgl_lahir' => $key->tgl_lahir,
    		'alamat_sekarang' => $key->alamat_sekarang,
    		'pendidikan_kk' => $key->pendidikan_kk,
    		'status_warganegara' => $key->status_warganegara,
    		'agama' => $key->agama,
    		'pekerjaan' => $key->pekerjaan,
    		'status_kawin' => $key->status_kawin,
    		'dusun' => $key->dusun,
	    );

	    $data['dok_syarat'] = $this->surat_master->get_daftar_persyaratan($main->id_surat);

        $list['title'] = 'Periksa Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('permohonan/periksa_surat', $data);
        $this->load->view('templates/footer');
	}

    //jika surat diterima
    public function buat_surat_permohonan($id, $id_pemohon, $id_surat)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $key 				= $this->penduduk->get_by_id($id_pemohon);
        $nomor_urut_surat   = $this->surat_master->nomor_urut_surat($id_surat);
        $nomor_surat_akhir  = $this->surat_master->nomor_surat_akhir($id_surat);
        $row                = $this->pemohon->get_permohonan_by_id($id);
        $data = array(
            'id'			=> $row->id,
    		'id_surat' 		=> $row->id_surat,
    		'url' 			=> $row->link_surat,
			'jenis_surat' 	=> $row->jenis_surat,
			'no_hp_aktif' 	=> $row->no_hp_aktif,
			'keperluan' 	=> $row->keperluan,
            'nomor_urut' => $nomor_urut_surat,
            'nomor_urut_akhir' => $nomor_surat_akhir->no_surat,
            'tgl_surat_akhir' => $nomor_surat_akhir->tanggal,
            'id_pemohon' => $key->id,
			'nik' => $key->nik,
    		'no_kk' => $key->no_kk,
    		'nama_penduduk' => $key->nama_penduduk,
    		'sex' => $key->sex,
    		'tempat_lahir' => $key->tempat_lahir,
    		'tgl_lahir' => $key->tgl_lahir,
    		'alamat_sekarang' => $key->alamat_sekarang,
    		'pendidikan_kk' => $key->pendidikan_kk,
    		'status_warganegara' => $key->status_warganegara,
    		'agama' => $key->agama,
    		'pekerjaan' => $key->pekerjaan,
    		'status_kawin' => $key->status_kawin,
    		'dusun' => $key->dusun,
        );

        $data['kepdes']       = $this->perangkat->get_kepdes();
        $data['syarat_dok'] = $this->surat_master->get_daftar_persyaratan($row->id_surat);

        $list['title'] = "Buat Surat Permohonan";
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view("permohonan/buat_permohonan", $data);
        $this->load->view('templates/footer');
    }

    public function tinjau_surat()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $id       	   = $this->input->post('id'); //id table permohonan surat
        $id_pend       = $this->input->post('nik_pen'); //NIK = id_pen
        $row           = $this->pemohon->get_permohonan_by_id($id);
        $get_pend      = $this->Layanan_surat_model->get_nik_pend($id_pend);
        $get_desa      = $this->setting->get_data_desa();
        $get_set       = $this->setting->get_data_app();

        //buat variable kirim ke pratinjau surat berdasarkan nik
        $data  = [
            'id'					=> $row->id,
    		'id_surat' 				=> $row->id_surat,
    		'url' 					=> $row->link_surat,
			'nama_surat' 			=> $row->jenis_surat,
			'no_hp_aktif' 			=> $row->no_hp_aktif,
            'singkatan_surat'       => $row->singkatan_surat,
            'nomor_surat'           => $this->input->post('nomor_surat'),
            'keperluan'             => $this->input->post('keperluan'),
            'pamong'                => $this->input->post('pamong'),
            'nip_pamong'            => $this->input->post('nip_pamong'),
            'jabatan_pamong'        => $this->input->post('jabatan_pamong'),
            'nama_usaha'            => $this->input->post('nama_usaha'),
            'alamat_tujuan'         => $this->input->post('alamat_tujuan'),
            'hari_kematian'         => $this->input->post('hari_kematian'), //keterangan kematian form
            'jam_kematian'          => $this->input->post('jam_kematian'),
            'tgl_kematian'          => $this->input->post('tgl_kematian'),
            'tempat_kematian'       => $this->input->post('tempat_kematian'),
            'penyebab_kematian'     => $this->input->post('penyebab_kematian'),
            'hubungan_yg_mati'      => $this->input->post('hubungan_yg_mati'),
            'nik_pelapor'           => $this->input->post('nik_pelapor'), //pelapor keterangan
            'nama_pelapor'          => $this->input->post('nama_pelapor'),
            'tempat_lahir_pelapor'  => $this->input->post('tmp_lahir_pelapor'),
            'tgl_lahir_pelapor'     => $this->input->post('tgl_lahir_pelapor'),
            'jenis_kelamin_pelapor' => $this->input->post('jk_pelapor'),
            'pekerjaan_pelapor'     => $this->input->post('pekerjaan_pelapor'),
            'dusun_pelapor'         => $this->input->post('wilayah_pelapor'),
            'alamat_pelapor'        => $this->input->post('alamat_pelapor'),
            'berlaku_mulai'         => $this->input->post('berlaku_mulai'), //tgl berlaku surat
            'berlaku_sampai'        => $this->input->post('berlaku_sampai'),
            'nomor_jamkesos'        => $this->input->post('nomor_jamkesos'), //keterangan jamkesos
            'jenis_barang'          => $this->input->post('jenis_barang'), //keterangan jual beli
            'rincian_barang'        => $this->input->post('rincian_barang'),
            'keterangan'            => $this->input->post('keterangan'),
            'jenis_tanah'           => $this->input->post('jenis_tanah'), // kepemilikan tanah
            'luas_tanah'            => $this->input->post('luas_tanah'),
            'bukti_kepemilikan'     => $this->input->post('bukti_kepemilikan'),
            'nomor_bukti_kepemilikan'  => $this->input->post('nomor_bukti_kepemilikan'),
            'atas_nama'             => $this->input->post('atas_nama'),
            'asal_kepemilikan'      => $this->input->post('asal_kepemilikan'),
            'bukti_pendukung_kepemilikan'  => $this->input->post('bukti_pendukung_kepemilikan'),
            'batas_sebelah_utara'   => $this->input->post('batas_sebelah_utara'),
            'batas_sebelah_timur'   => $this->input->post('batas_sebelah_timur'),
            'batas_sebelah_barat'   => $this->input->post('batas_sebelah_barat'),
            'batas_sebelah_selatan' => $this->input->post('batas_sebelah_selatan'),
            'penghasilan'           => $this->input->post('penghasilan'), //keterangan penghasilan
            'terbilang'             => $this->input->post('terbilang'),
            'id_pend'               => $get_pend->id,
            'nik'                   => $get_pend->nik,
            'no_kk'                 => $get_pend->no_kk,
            'nama_penduduk'         => $get_pend->nama_penduduk,
            'hubungan'              => $get_pend->hubungan,
            'jenis_kelamin'         => $get_pend->sex,
            'agama'                 => $get_pend->agama,
            'tempat_lahir'          => $get_pend->tempat_lahir,
            'tgl_lahir'             => $get_pend->tgl_lahir,
            'pendidikan_kk'         => $get_pend->pendidikan_kk,
            'pendidikan_sedang'     => $get_pend->pendidikan_sedang,
            'pekerjaan'             => $get_pend->pekerjaan,
            'suku_penduduk'         => $get_pend->suku_penduduk,
            'status_warganegara'    => $get_pend->status_warganegara,
            'negara_asal'           => $get_pend->negara_asal,
            'nik_ayah'              => $get_pend->nik_ayah,
            'nik_ibu'               => $get_pend->nik_ibu,
            'nama_ayah'             => $get_pend->nama_ayah,
            'nama_ibu'              => $get_pend->nama_ibu,
            'wilayah'               => $get_pend->dusun,
            'alamat_sebelumnya'     => $get_pend->alamat_sebelumnya,
            'alamat_sekarang'       => $get_pend->alamat_sekarang,
            'status_kawin'          => $get_pend->status_kawin,
            'nama_desa'             => $get_desa['nama_desa'],
            'kode_wilayah'          => $get_desa['kode_wilayah'],
            'sebutan_desa'          => $get_set['sebutan_desa'],
        ];

        //ambil variable dari kop dan kirim ke view surat
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

        $get    = $this->surat_master->get_header();
        $buffer = str_replace(array_keys($array_replace), array_values($array_replace), $get['header']);

        //masukan data diatas ke variable
        $data['head_surat'] = $buffer;

        $list['title'] = "Tinjau Surat Permohonan";
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view("permohonan/tinjau_permohonan", $data);
        $this->load->view('templates/footer');
    }

    public function proses_permohonan()
    {
        //Siapkan nama dokumen acak
        $rand_nme = random_bytes(5);
        $nama_file1 = bin2hex($rand_nme);
        
        $file_surat1 = $nama_file1;

        $nama_surat     = $this->input->post('nama_surat');

        $data = [
            'id_status'    => 2,
            'pamong'       => $this->input->post('pamong'),
            'jabatan'      => $this->input->post('jabatan'),
            'no_surat'     => $this->input->post('no_surat'),
            'user'         => $this->input->post('user'),
            'file'         => $file_surat1,
        ];

        //ambil data dari form textarea surat
        $content = $_POST['isian_surat'];

        try
        {
            $html2pdf = new HTML2PDF('P', 'F4', 'en');
            $html2pdf->pdf->SetTitle($nama_surat);
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content);
            $html2pdf->Output("./folder_arsip/file_surat/".$file_surat1.".pdf", 'F');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('permohonan_surat', $data);
        $this->session->set_flashdata('flash', 'Surat Permohonan Ditambahkan!');
        redirect('permohonan/daftar_diterima');
    }

    public function siap_ambil($id = '')
    {
        $this->pemohon->update_status($id, 4);
        $this->session->set_flashdata('flash', 'Surat Sudah Siap Diambil');
        redirect("permohonan/daftar_diterima");
    }

    public function tulis_log_surat($log)
    {
        $this->db->insert('log_surat', $log);
    }

    public function sudah_ambil($id)
    {
        $tgl_buat       = date('Y-m-d H:i:s');

        // arsipkan log surat dari permohonan surat ke log_surat
        $surat_data = $this->pemohon->get_by_id($id);
        $log            = [
            'id_surat'  => $surat_data->id_surat,
            'id_pend'        => $surat_data->id_pemohon,
            'keterangan' => 'Sudah Ambil',
            'id_status' => 5,
            'pamong'       => $surat_data->pamong,
            'jabatan' => $surat_data->jabatan,
            'user' => $surat_data->user,
            'tanggal' => $tgl_buat,
            'no_surat' => $surat_data->no_surat,
            'file_srt' => $surat_data->file,
        ];
        $this->tulis_log_surat($log);
        $this->pemohon->hapus_permohonan($id);
        $this->session->set_flashdata('flash', 'Data Ditambahkan');
        redirect(site_url('arsip_surat'));
    }

    function tolak_permohonan($id)
    {

        $keterangan = $this->input->post('keterangan');
        $user       = $this->input->post('user');
        $tgl_buat   = date('Y-m-d H:i:s');

         // arsipkan ke log surat
        $data_surat = $this->pemohon->get_by_id($id);
        $data            = [
            'id_surat'  => $data_surat->id_surat,
            'id_pend'        => $data_surat->id_pemohon,
            'keterangan' => $keterangan,
            'id_status' => 3,
            'pamong'       => '-',
            'jabatan' => '-',
            'user' => $user,
            'tanggal' => $tgl_buat,
            'no_surat' => '-',
            'file_srt' => '-',
        ];
        $this->tulis_log_surat($data);
        $this->pemohon->hapus_permohonan($id);
        $this->session->set_flashdata('flash', 'Permohonan Tolak Ditambahkan');
        redirect(site_url('permohonan/daftar_ditolak'));
    }

	
}