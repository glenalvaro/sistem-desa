<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require('./application/third_party/phpoffice/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Document\Properties;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Data_keluarga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Data_penduduk_model', 'penduduk');
        $this->load->model('Data_keluarga_model', 'keluarga');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		$data['list_keluarga']      = $this->keluarga->getDataKeluarga();
        $data['penduduk_wilayah']   = $this->penduduk->get_wilayah_penduduk();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['title'] = 'Keluarga';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sid/data_keluarga/data_keluarga_list', $data);
		$this->load->view('templates/footer');
    }

     //ambil foto di database tampilkan di view
     public function ambil_foto_keluarga()
     {
         $foto = $this->input->get('foto');
         $sex  = $this->input->get('sex');
         if (empty($foto) || ! file_exists(FCPATH . LOKASI_USER_PICT . $foto)) {
             $foto = ($sex == 1) ? 'kuser.png' : 'wuser.png';
             ambilBerkas($foto, $this->controller, null, 'assets/img/sid_foto/', $tampil = true);
         } else {
             ambilBerkas($foto, $this->controller, null, LOKASI_USER_PICT, $tampil = true);
         }
     }
     
     public function create() 
     {
        $this->_rules();
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

        //panggil data get table dari model penduduk
        $data['hubungan_penduduk']			= $this->penduduk->get_penduduk_hubungan();
        $data['penduduk_sex']        		= $this->penduduk->get_jk();
 		$data['penduduk_agama']        		= $this->penduduk->get_penduduk_agama();
 		$data['penduduk_status']        	= $this->penduduk->get_penduduk_status();
 		$data['pendidikan_kk']        		= $this->penduduk->get_pendidikan_kk();
 		$data['pendidikan_sedang']        	= $this->penduduk->get_pendidikan_sedang();
 		$data['pekerjaan_penduduk']        	= $this->penduduk->get_penduduk_pekerjaan();
 		$data['penduduk_suku']        		= $this->penduduk->get_penduduk_suku();
 		$data['status_kewarganegaraan']     = $this->penduduk->get_status_warganegara();
 		$data['penduduk_wilayah']     		= $this->penduduk->get_wilayah_penduduk();
 		$data['golongan_darah_penduduk']    = $this->penduduk->get_golongan_darah();

         if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Keluarga';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sid/data_keluarga/data_keluarga_form', $data);
            $this->load->view('templates/footer');
         } else {
             $this->penduduk->tambah_penduduk();
             $this->session->set_flashdata('flash', 'Data Keluarga ditambahkan');
             redirect(site_url('data_keluarga'));
         }
     }

     public function cetak_keluarga()
     {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['keluarga_list'] = $this->keluarga->getDataKeluarga();
        $this->load->view('sid/data_keluarga/cetak_keluarga', $data);
     }

     public function unduh_keluarga()
     {
          //Ambil data desa
          $get_data     = $this->db->get('identitas_desa')->result_array();

          foreach($get_data as $data){
             $nama_desa = $data['nama_desa'];
             $kabupaten = $data['nama_kabupaten'];
          }
          //ambil data user
          $get_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
          //ambil data penduduk
          $get_keluarga = $this->keluarga->getDataKeluarga();
          $bulan = date('M');
          $tahun = date('Y');

          $spreadsheet = new Spreadsheet;

          $spreadsheet->getProperties()
                      ->setCreator($get_user['name'])
                      ->setTitle('Data Keluarga');

          $sheet = $spreadsheet->getActiveSheet();
           
          $spreadsheet->getActiveSheet(0)->getStyle('A4:I20')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
          $spreadsheet->getSheet(0)->getStyle('A4:I4')->getFill()->setFillType(Fill::FILL_SOLID);
          $spreadsheet->getSheet(0)->getStyle('A4:I4')->getFill()->getStartColor()->setRGB('D0D0D0');
          $sheet->getStyle('A4:I4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            
          $styleArray = array(
             'font' => array(
             // 'underline' => PHPExcel_Style_Font::bold_SINGLE,
             'name' => 'Arial',
             'size' => 18,
             // 'bold' => true,
             )
            );
          $sheet->mergeCells('A1:I2');    
          $sheet->mergeCells('A2:I2');    
          $sheet->setCellValue('A1','Data Keluarga Desa'." ". $nama_desa." ".$kabupaten);
          $sheet->getStyle('A1:A2')->applyFromArray($styleArray);
          $sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

          $spreadsheet->setActiveSheetIndex(0)
                      ->setTitle('Data Keluarga')
                      ->setCellValue('A4', 'No')
                      ->setCellValue('B4', 'NO. KK')
                      ->setCellValue('C4', 'HUBUNGAN KELUARGA')
                      ->setCellValue('D4', 'NIK')
                      ->setCellValue('E4', 'Jumlah Anggota')
                      ->setCellValue('F4', 'Jenis Kelamin')
                      ->setCellValue('G4', 'Alamat')
                      ->setCellValue('H4', 'Dusun')
                      ->setCellValue('I4', 'Tgl Terdaftar');

          $kolom = 5;
          $nomor = 1;
          foreach($get_keluarga as $main) {
            //hitung jumlah anggota kk
          $query = $this->db->query("SELECT * FROM data_penduduk where no_kk=$main->no_kk");
          $jml_anggota = $query->num_rows();

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $main->no_kk.';')
                           ->setCellValue('C' . $kolom, $main->nama_penduduk)
                           ->setCellValue('D' . $kolom, $main->nik.';')
                           ->setCellValue('E' . $kolom, $jml_anggota)
                           ->setCellValue('F' . $kolom, $main->sex)
                           ->setCellValue('G' . $kolom, $main->alamat_sekarang)
                           ->setCellValue('H' . $kolom, $main->dusun)
                           ->setCellValue('I' . $kolom, $main->tgl_terdaftar);
               $kolom++;
               $nomor++;
          }

        $writer = new Xlsx($spreadsheet);

        $filename="Data Keluarga".date('d-m-Y').'.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
     }

    public function anggota_keluarga($id, $no_kk)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->penduduk->get_by_id($id);
        $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_kk' => $row->no_kk,
    		'nama_penduduk' => $row->nama_penduduk,
    		'dusun' => $row->dusun,
	    );
            //ambil data anggota keluarga berdasarkan no kk yang sama
            $data['anggota_list'] = $this->keluarga->anggota_KK($no_kk);

            $list['title'] = 'Keluarga';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/data_keluarga/data_anggota_keluarga', $data);
            $this->load->view('templates/footer');
    }

    public function form_peristiwa($id, $no_kk)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->penduduk->get_by_id($id);
        $data = array(
    		'id' => $row->id,
    		'no_kk' => $row->no_kk,
    		'kepala_keluarga' => $row->nama_penduduk,
    		'dusun' => $row->dusun,
            'dusun_id' => $row->dusun_id
	    );
            //ambil data anggota keluarga berdasarkan no kk yang sama
            $data['anggota_list'] = $this->keluarga->anggota_KK($no_kk);

            //panggil data get table dari model penduduk
            $data['hubungan_penduduk']			= $this->keluarga->get_penduduk_hubungan();
            $data['penduduk_sex']        		= $this->penduduk->get_jk();
            $data['penduduk_agama']        		= $this->penduduk->get_penduduk_agama();
            $data['penduduk_status']        	= $this->penduduk->get_penduduk_status();
            $data['pendidikan_kk']        		= $this->penduduk->get_pendidikan_kk();
            $data['pendidikan_sedang']        	= $this->penduduk->get_pendidikan_sedang();
            $data['pekerjaan_penduduk']        	= $this->penduduk->get_penduduk_pekerjaan();
            $data['penduduk_suku']        		= $this->penduduk->get_penduduk_suku();
            $data['status_kewarganegaraan']     = $this->penduduk->get_status_warganegara();
            $data['penduduk_wilayah']     		= $this->penduduk->get_wilayah_penduduk();
            $data['golongan_darah_penduduk']    = $this->penduduk->get_golongan_darah();

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $list['title'] = 'Keluarga';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/data_keluarga/tambah_anggota_kk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->keluarga->tambah_anggota_kk();
            $this->session->set_flashdata('flash', 'Data Anggota Keluarga ditambahkan');
            $url = site_url() . "data_keluarga/anggota_keluarga/{$id}/{$no_kk}";
            redirect($url);
        }
    }

    //lihat kartu keluarga anggota
    public function kartu_keluarga($id, $no_kk)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->penduduk->get_by_id($id);
        $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_kk' => $row->no_kk,
    		'kepala_kk' => $row->nama_penduduk,
    		'dusun' => $row->dusun,
	    );
            //ambil data anggota keluarga berdasarkan no kk yang sama
            $data['list_anggota_kk'] = $this->keluarga->anggota_KK($no_kk);

            $list['title'] = 'Keluarga';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/data_keluarga/kartu_keluarga', $data);
            $this->load->view('templates/footer');
    }

    public function cetak_kk_anggota($id, $no_kk) 
    {
        $row = $this->penduduk->get_by_id($id);
        $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_kk' => $row->no_kk,
    		'kepala_kk' => $row->nama_penduduk,
    		'dusun' => $row->dusun,
	    );
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['list_kk'] = $this->keluarga->anggota_KK($no_kk);
        $this->load->view('sid/data_keluarga/cetak_kk', $data);
    }

    public function edit_penduduk_KK($id)
	{
		//jika berhasil alihkan ke halaman yang sama
	   	$link = $_SERVER['HTTP_REFERER'];
	   	$this->keluarga->ubah_data_kk($id);
       	$this->session->set_flashdata('flash', 'Data Keluarga Diupdate!');
		redirect($link);
	}

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_penduduk', 'nama penduduk', 'trim|required');
		$this->form_validation->set_rules('hubungan_keluarga_id', 'hubungan keluarga id', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('agama_id', 'agama id', 'trim|required');
		$this->form_validation->set_rules('status_penduduk_id', 'status penduduk id', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
		$this->form_validation->set_rules('status_warganegara', 'status warganegara', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}