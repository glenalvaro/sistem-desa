<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_surat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
        require_once(FCPATH.'assets/vendor/html2pdf/html2pdf.class.php');
		$this->load->model('Layanan_surat_model');
        $this->load->model('Surat_master_model', 'surat_data');
        $this->load->model('Data_penduduk_model', 'penduduk');
        $this->load->model('Data_keluarga_model', 'keluarga');
        $this->load->model('Perangkat_desa_model', 'perangkat');
        $this->load->model('Setting_model', 'setting');
	}

    public function index()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['daftar_surat'] = $this->surat_data->ApiDaftarSurat();

        $list['title'] = 'Cetak Surat';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('layanan_surat/cetak_surat', $data);
        $this->load->view('templates/footer');
    }

    public function form($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $nomor_urut_surat   = $this->surat_data->nomor_urut_surat($id);
        $nomor_surat_akhir  = $this->surat_data->nomor_surat_akhir($id);
        $row                = $this->surat_data->get_by_id($id);
        if ($row) {
        $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'url' => $row->url,
                'nomor_urut' => $nomor_urut_surat,
                'nomor_urut_akhir' => $nomor_surat_akhir->no_surat,
                'tgl_surat_akhir' => $nomor_surat_akhir->tanggal,
        );

        $data['list_warga']   = $this->penduduk->get_all();
        $data['kepdes']       = $this->perangkat->get_kepdes();

            $list['title'] = "Form Surat";
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view("layanan_surat/form_isian", $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('flash-error', 'Harap periksa kembali template surat belum dibuat');
            redirect(site_url('layanan_surat'));
        }
    }

    public function ajax_get_nik()
    {
        $id = $this->input->post('id');
        $data = $this->Layanan_surat_model->get_data_ajax($id);
        echo json_encode($data);
    }

    public function ajax_get_kk()
    {
        $kk = $this->input->post('kk_nomor');
        $data = $this->keluarga->anggota_KK($kk);
        echo json_encode($data);
    }

    public function pratinjau_surat($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $id_pend       = $this->input->post('pend_nik'); //NIK = id_pen
        $row           = $this->surat_data->get_by_id($id); //id_surat
        $get_pend      = $this->Layanan_surat_model->get_nik_pend($id_pend);
        $get_desa      = $this->setting->get_data_desa();
        $get_set       = $this->setting->get_data_app();

        //buat variable kirim ke pratinjau surat berdasarkan nik
        $data  = [
            'id'                    => $row->id,
            'nama_surat'            => $row->nama,
            'url'                   => $row->url,
            'singkatan_surat'       => $row->singkatan,
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

        //buat variable kirim ke view surat
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

        $get    = $this->surat_data->get_header();
        $buffer = str_replace(array_keys($array_replace), array_values($array_replace), $get['header']);

        //masukan data diatas ke variable
        $data['isian_header'] = $buffer;

        $list['title'] = "Pratinjau Cetak";
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view("layanan_surat/pratinjau_surat", $data);
        $this->load->view('templates/footer');
    }

    public function tinjau_pdf()
    {
        $content = $_POST['content'];
        $html2pdf = new HTML2PDF('P', 'F4', 'en');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('pdf_demo.pdf', 'I');
    }

    public function proses_surat()
    {
        //Siapkan nama file surat
        $nama_surat     = $this->input->post('nama_surat');
        $url_surat      = $this->input->post('url');
        $nik_pend       = $this->input->post('nik_pend');
        $tgl_surat      = date('Y-m-d');
        $tgl_buat       = date('Y-m-d H:i:s');

        $file_surat = $url_surat."_".$nik_pend."_".$tgl_surat;

        $data = [
                'id_surat'     => $this->input->post('id_surat'),
                'id_pend'      => $this->input->post('id_pend'),
                'pamong'       => $this->input->post('pamong'),
                'jabatan'      => $this->input->post('jabatan'),
                'user'         => $this->input->post('user'),
                'tanggal'      => $tgl_buat,
                'no_surat'     => $this->input->post('no_surat'),
                'file_surat'   => $file_surat,
        ];

        //ambil data dari form textare surat
        $content = $_POST['isian_surat'];

        try
        {
            $html2pdf = new HTML2PDF('P', 'F4', 'en');
            $html2pdf->pdf->SetTitle($nama_surat);
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content);
            $html2pdf->Output("./folder_arsip/surat/".$file_surat.".pdf", 'F');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

        $this->db->insert('log_surat', $data);
        $this->session->set_flashdata('flash', 'Surat berhasil Ditambahkan!');
        redirect('arsip_surat');
    }

}