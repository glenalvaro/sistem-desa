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

class Data_penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Data_penduduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list['user'] 		= $this->db->get_where('user', ['email' => 
        					  $this->session->userdata('email')])->row_array();
        $list['desa'] 		= $this->db->get('identitas_desa')->result_array();
        $list['setting'] 	= $this->db->get('setting')->result_array();

        $q      = urldecode($this->input->get('q', TRUE));
        $start  = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url']     = base_url() . 'data_penduduk/index?q=' . urlencode($q);
            $config['first_url']    = base_url() . 'data_penduduk/index?q=' . urlencode($q);
        } else {
            $config['base_url']     = base_url() . 'data_penduduk/index';
            $config['first_url']    = base_url() . 'data_penduduk/index';
        }

        $config['per_page']          = 50;
        $config['page_query_string'] = TRUE;
        $config['total_rows']        = $this->Data_penduduk_model->total_rows($q);
        $data_penduduk               = $this->Data_penduduk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open']     = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close']    = '</ul>';

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_penduduk_data' => $data_penduduk,
            'q'                  => $q,
            'pagination'         => $this->pagination->create_links(),
            'total_rows'         => $config['total_rows'],
            'start'              => $start,
        );

        $data['list_jenis_kelamin']   = $this->Data_penduduk_model->list_data('tweb_penduduk_sex');

        $list['title'] = 'Penduduk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('sid/data_penduduk/data_penduduk_list', $data);
        $this->load->view('templates/footer');
    }

    //ambil foto di database tampilkan di view
    public function ambil_foto()
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

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Data_penduduk_model->get_by_id($id);

        if ($row) {
        
        $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_kk' => $row->no_kk,
    		'nama_penduduk' => $row->nama_penduduk,
    		'hubungan' => $row->hubungan,
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
            $list['title'] = 'Penduduk';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/data_penduduk/data_penduduk_read', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_penduduk'));
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
        'action' => site_url('data_penduduk/create_action'),
	    'id' => set_value('id'),
	    'nik' => set_value('nik'),
	    'no_kk' => set_value('no_kk'),
	    'nama_penduduk' => set_value('nama_penduduk'),
	    'hubungan_keluarga_id' => set_value('hubungan_keluarga_id'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'agama_id' => set_value('agama_id'),
	    'status_penduduk_id' => set_value('status_penduduk_id'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'kelahiran_anak_ke' => set_value('kelahiran_anak_ke'),
	    'pendikan_kk_id' => set_value('pendikan_kk_id'),
	    'pendidikan_sedang_id' => set_value('pendidikan_sedang_id'),
	    'pekerjaan_id' => set_value('pekerjaan_id'),
	    'suku' => set_value('suku'),
	    'status_warganegara' => set_value('status_warganegara'),
	    'dokumen_paspor' => set_value('dokumen_paspor'),
	    'tgl_paspor' => set_value('tgl_paspor'),
	    'dokumen_kitas' => set_value('dokumen_kitas'),
	    'negara_asal' => set_value('negara_asal'),
	    'nik_ayah' => set_value('nik_ayah'),
	    'nik_ibu' => set_value('nik_ibu'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'dusun_id' => set_value('dusun_id'),
	    'alamat_sebelumnya' => set_value('alamat_sebelumnya'),
	    'alamat_sekarang' => set_value('alamat_sekarang'),
	    'no_telepon' => set_value('no_telepon'),
	    'email' => set_value('email'),
	    'status_kawin' => set_value('status_kawin'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'asuransi_kesehatan' => set_value('asuransi_kesehatan'),
	    'no_asuransi' => set_value('no_asuransi'),
	    'bpjs_ketenagakerjaan' => set_value('bpjs_ketenagakerjaan'),
	    'keterangan' => set_value('keterangan'),
	    'foto' => set_value('foto'),
	    'status_dasar_id' => set_value('status_dasar_id'),
	    'tgl_terdaftar' => set_value('tgl_terdaftar'),
	    'created_by' => set_value('created_by'),
		);

		// //panggil data get table dari model penduduk
        $data['hubungan_penduduk']			= $this->Data_penduduk_model->get_penduduk_hubungan();
        $data['penduduk_sex']        		= $this->Data_penduduk_model->get_jk();
 		$data['penduduk_agama']        		= $this->Data_penduduk_model->get_penduduk_agama();
 		$data['penduduk_status']        	= $this->Data_penduduk_model->get_penduduk_status();
 		$data['pendidikan_kk']        		= $this->Data_penduduk_model->get_pendidikan_kk();
 		$data['pendidikan_sedang']        	= $this->Data_penduduk_model->get_pendidikan_sedang();
 		$data['pekerjaan_penduduk']        	= $this->Data_penduduk_model->get_penduduk_pekerjaan();
 		$data['penduduk_suku']        		= $this->Data_penduduk_model->get_penduduk_suku();
 		$data['status_kewarganegaraan']     = $this->Data_penduduk_model->get_status_warganegara();
 		$data['penduduk_wilayah']     		= $this->Data_penduduk_model->get_wilayah_penduduk();
 		$data['golongan_darah_penduduk']    = $this->Data_penduduk_model->get_golongan_darah();

        $list['title'] = 'Penduduk';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('sid/data_penduduk/data_penduduk_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Data_penduduk_model->tambah_penduduk();
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('data_penduduk'));
        }
      }

    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Data_penduduk_model->get_by_id($id);

        if ($row) {
            $data = array(
	        'button' => 'Update',
	        'action' => site_url('data_penduduk/update_action'),
			'id' => set_value('id', $row->id),
			'nik' => set_value('nik', $row->nik),
			'no_kk' => set_value('no_kk', $row->no_kk),
			'nama_penduduk' => set_value('nama_penduduk', $row->nama_penduduk),
			'hubungan_keluarga_id' => set_value('hubungan_keluarga_id', $row->hubungan_keluarga_id),
			'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
			'agama_id' => set_value('agama_id', $row->agama_id),
			'status_penduduk_id' => set_value('status_penduduk_id', $row->status_penduduk_id),
			'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
			'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
			'kelahiran_anak_ke' => set_value('kelahiran_anak_ke', $row->kelahiran_anak_ke),
			'pendikan_kk_id' => set_value('pendikan_kk_id', $row->pendikan_kk_id),
			'pendidikan_sedang_id' => set_value('pendidikan_sedang_id', $row->pendidikan_sedang_id),
			'pekerjaan_id' => set_value('pekerjaan_id', $row->pekerjaan_id),
			'suku' => set_value('suku', $row->suku),
			'status_warganegara' => set_value('status_warganegara', $row->status_warganegara),
			'dokumen_paspor' => set_value('dokumen_paspor', $row->dokumen_paspor),
			'tgl_paspor' => set_value('tgl_paspor', $row->tgl_paspor),
			'dokumen_kitas' => set_value('dokumen_kitas', $row->dokumen_kitas),
			'negara_asal' => set_value('negara_asal', $row->negara_asal),
			'nik_ayah' => set_value('nik_ayah', $row->nik_ayah),
			'nik_ibu' => set_value('nik_ibu', $row->nik_ibu),
			'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
			'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
			'dusun_id' => set_value('dusun_id', $row->dusun_id),
			'alamat_sebelumnya' => set_value('alamat_sebelumnya', $row->alamat_sebelumnya),
			'alamat_sekarang' => set_value('alamat_sekarang', $row->alamat_sekarang),
			'no_telepon' => set_value('no_telepon', $row->no_telepon),
			'email' => set_value('email', $row->email),
			'status_kawin' => set_value('status_kawin', $row->status_kawin),
			'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
			'asuransi_kesehatan' => set_value('asuransi_kesehatan', $row->asuransi_kesehatan),
			'no_asuransi' => set_value('no_asuransi', $row->no_asuransi),
			'bpjs_ketenagakerjaan' => set_value('bpjs_ketenagakerjaan', $row->bpjs_ketenagakerjaan),
			'keterangan' => set_value('keterangan', $row->keterangan),
			'foto' => set_value('foto', $row->foto),
			'status_dasar_id' => set_value('status_dasar_id', $row->status_dasar_id),
			'tgl_terdaftar' => set_value('tgl_terdaftar', $row->tgl_terdaftar),
			'created_by' => set_value('created_by', $row->created_by),
		    );
            
        //panggil data get table dari model penduduk
	        $data['hubungan_penduduk']			= $this->Data_penduduk_model->get_penduduk_hubungan();
	        $data['penduduk_sex']        		= $this->Data_penduduk_model->get_jk();
	 		$data['penduduk_agama']        		= $this->Data_penduduk_model->get_penduduk_agama();
	 		$data['penduduk_status']        	= $this->Data_penduduk_model->get_penduduk_status();
	 		$data['pendidikan_kk']        		= $this->Data_penduduk_model->get_pendidikan_kk();
	 		$data['pendidikan_sedang']        	= $this->Data_penduduk_model->get_pendidikan_sedang();
	 		$data['pekerjaan_penduduk']        	= $this->Data_penduduk_model->get_penduduk_pekerjaan();
	 		$data['penduduk_suku']        		= $this->Data_penduduk_model->get_penduduk_suku();
	 		$data['status_kewarganegaraan']     = $this->Data_penduduk_model->get_status_warganegara();
	 		$data['penduduk_wilayah']     		= $this->Data_penduduk_model->get_wilayah_penduduk();
	 		$data['golongan_darah_penduduk']    = $this->Data_penduduk_model->get_golongan_darah();

            $list['title'] = 'Penduduk';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/data_penduduk/data_penduduk_form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_penduduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            // $this->Data_penduduk_model->update($this->input->post('id', TRUE), $data);
            $this->Data_penduduk_model->update_penduduk($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('data_penduduk'));
        }
    }

    public function tulis_log_hapus_penduduk($log)
    {
        $this->db->insert('log_hapus_penduduk', $log);
    }

    public function delete($id)
    {

        // Catat data penduduk yg di hapus di log_hapus_penduduk
        $penduduk_hapus = $this->Data_penduduk_model->get_by_id($id);
        $log            = [
            'id_pend'    => $penduduk_hapus->id,
            'nik'        => $penduduk_hapus->nik,
            'foto'       => $penduduk_hapus->foto,
            'deleted_by' => $this->session->email,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->tulis_log_hapus_penduduk($log);

        // Hapus file foto penduduk yg di hapus di folder assets/img/pic_penduduk
        $file_foto = LOKASI_USER_PICT . $log['foto'];
        if (is_file($file_foto)) {
            unlink($file_foto);
            //break;
        }

        // Hapus file foto penduduk yg di hapus di folder assets/img/pic_penduduk
        $file_foto_kecil = LOKASI_USER_PICT . 'kecil_' . $log['foto'];
        if (is_file($file_foto_kecil)) {
            unlink($file_foto_kecil);
            //break;
        }

        $this->Data_penduduk_model->hapus_penduduk($id);
        $this->session->set_flashdata('flash', 'Data dihapus');
        redirect(site_url('data_penduduk'));
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
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
		$this->form_validation->set_rules('dusun_id', 'dusun id', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
		$this->form_validation->set_rules('status_dasar_id', 'status dasar id', 'trim|required');
		$this->form_validation->set_rules('tgl_terdaftar', 'tgl terdaftar', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function cek_nik()
    {
        $connect = mysqli_connect("localhost","root","","db_kelurahan");

		if(!empty($_POST["nik"])) {
		  $query = "SELECT * FROM data_penduduk WHERE nik='" . $_POST["nik"] . "'";
		  $result = mysqli_query($connect, $query);
		  $count = mysqli_num_rows($result);
		  if($count>0) {
		    echo "<span> NIK ini sudah terdaftar .</span>";
		    echo "<script>$('#nik').removeClass('parsley-success');</script>";
		    echo "<script>$('#nik').addClass('parsley-error');</script>";
		    echo "<script>$('#form-label-nik').removeClass('error-input-label');</script>";
		    echo "<script>$('#form-label-nik').addClass('error-input-label');</script>";
		    echo "<script>$('#btnsimpan').prop('disabled',true);</script>";
		  }else{
		    // echo "<span style='color:green'> NIK ini tersedia .</span>";
		    echo "<script>$('#form-label-nik').removeClass('error-input-label');</script>";
		    echo "<script>$('#btnsimpan').prop('disabled',false);</script>";
		  }
		}
    }

    public function filter_sex()
    {
        $connect = mysqli_connect("localhost","root","","db_kelurahan");

        $cari = isset($_POST["cek_sex"]);

        if($cari) {
          $query = "SELECT * FROM data_penduduk WHERE jenis_kelamin = '$cari'";
          $result = mysqli_query($connect, $query);
          $count = mysqli_num_rows($result);
        }
    }

    public function export_excel()
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
          $get_penduduk = $this->Data_penduduk_model->get_all();
          $bulan = date('M');
          $tahun = date('Y');

          $spreadsheet = new Spreadsheet;

          $spreadsheet->getProperties()
                      ->setCreator($get_user['name'])
                      ->setTitle('Data Penduduk');

          $sheet = $spreadsheet->getActiveSheet();
           
          $spreadsheet->getActiveSheet(0)->getStyle('A4:AB20')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
          $spreadsheet->getSheet(0)->getStyle('A4:AB4')->getFill()->setFillType(Fill::FILL_SOLID);
          $spreadsheet->getSheet(0)->getStyle('A4:AB4')->getFill()->getStartColor()->setRGB('D0D0D0');
          $sheet->getStyle('A4:AB4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            
          $styleArray = array(
             'font' => array(
             // 'underline' => PHPExcel_Style_Font::bold_SINGLE,
             'name' => 'Arial',
             'size' => 18,
             // 'bold' => true,
             )
            );
          $sheet->mergeCells('A1:AB1');    
          $sheet->mergeCells('A2:AB2');    
          $sheet->setCellValue('A1','Data Penduduk Desa'." ". $nama_desa." ".$kabupaten);
          $sheet->setCellValue('A2','Bulan'." ". $bulan." ".$tahun);
          $sheet->getStyle('A1:A2')->applyFromArray($styleArray);
          $sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

          $spreadsheet->setActiveSheetIndex(0)
                      ->setTitle('Data Penduduk')
                      ->setCellValue('A4', 'No')
                      ->setCellValue('B4', 'NIK')
                      ->setCellValue('C4', 'Nama Penduduk')
                      ->setCellValue('D4', 'Nomor KK')
                      ->setCellValue('E4', 'Hubungan Keluarga')
                      ->setCellValue('F4', 'Agama')
                      ->setCellValue('G4', 'Status Penduduk')
                      ->setCellValue('H4', 'Tempat Lahir')
                      ->setCellValue('I4', 'Tgl Lahir')
                      ->setCellValue('J4', 'Anak Ke')
                      ->setCellValue('K4', 'Pendidikan Dalam KK')
                      ->setCellValue('L4', 'Pendidikan Sedang Ditempuh')
                      ->setCellValue('M4', 'Pekerjaan')
                      ->setCellValue('N4', 'Suku')
                      ->setCellValue('O4', 'Warganegara')
                      ->setCellValue('P4', 'NIK Ayah')
                      ->setCellValue('Q4', 'Nama Ayah')
                      ->setCellValue('R4', 'NIK Ibu')
                      ->setCellValue('S4', 'Nama Ibu')
                      ->setCellValue('T4', 'Dusun')
                      ->setCellValue('U4', 'Alamat')
                      ->setCellValue('V4', 'Nomor Telepon')
                      ->setCellValue('W4', 'Alamat Email')
                      ->setCellValue('X4', 'Status Kawin')
                      ->setCellValue('Y4', 'Golongan Darah')
                      ->setCellValue('Z4', 'Status Dasar')
                      ->setCellValue('AA4', 'Jenis Kelamin')
                      ->setCellValue('AB4', 'Tgl Terdaftar');

          $kolom = 5;
          $nomor = 1;
          foreach($get_penduduk as $main) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $main->nik.';')
                           ->setCellValue('C' . $kolom, $main->nama_penduduk)
                           ->setCellValue('D' . $kolom, $main->no_kk.';')
                           ->setCellValue('E' . $kolom, $main->hubungan)
                           ->setCellValue('F' . $kolom, $main->agama)
                           ->setCellValue('G' . $kolom, $main->status)
                           ->setCellValue('H' . $kolom, $main->tempat_lahir)
                           ->setCellValue('I' . $kolom, $main->tgl_lahir)
                           ->setCellValue('J' . $kolom, $main->kelahiran_anak_ke)
                           ->setCellValue('K' . $kolom, $main->pendidikan_kk)
                           ->setCellValue('L' . $kolom, $main->pendidikan_sedang)
                           ->setCellValue('M' . $kolom, $main->pekerjaan)
                           ->setCellValue('N' . $kolom, $main->suku_penduduk)
                           ->setCellValue('O' . $kolom, $main->status_warganegara)
                           ->setCellValue('P' . $kolom, $main->nik_ayah)
                           ->setCellValue('Q' . $kolom, $main->nama_ayah)
                           ->setCellValue('R' . $kolom, $main->nik_ibu)
                           ->setCellValue('S' . $kolom, $main->nama_ibu)
                           ->setCellValue('T' . $kolom, $main->dusun)
                           ->setCellValue('U' . $kolom, $main->alamat_sekarang)
                           ->setCellValue('V' . $kolom, $main->no_telepon)
                           ->setCellValue('W' . $kolom, $main->email)
                           ->setCellValue('X' . $kolom, $main->status_kawin)
                           ->setCellValue('Y' . $kolom, $main->darah_golongan)
                           ->setCellValue('Z' . $kolom, $main->status_dasar)
                           ->setCellValue('AA' . $kolom, $main->sex)
                           ->setCellValue('AB' . $kolom, $main->tgl_terdaftar);
               $kolom++;
               $nomor++;

          }

        $writer = new Xlsx($spreadsheet);

        $filename="Data Penduduk".date('d-m-Y').'.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
     }

     public function export_PDF()
     {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['list_penduduk'] = $this->Data_penduduk_model->get_all();

        $pdfFilePath = FCPATH.'/folder_arsip/data_penduduk/Data_Penduduk_'.date('d-m-Y').'.pdf';
    
        $html = $this->load->view('sid/data_penduduk/penduduk_pdf', $data, true); // render the view into HTML

        ini_set('memory_limit','32M');
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
        $param = '"en-GB-x","F4-L","","",10,10,10,10,6,3'; 
        $pdf = new mPDF();
        $pdf->AddPage($param);   
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($pdfFilePath, 'F'); // save to file because we can
            
        $this->load->helper('download');
        $data = file_get_contents($pdfFilePath); // Read the file's contents
        $name = 'Data_Penduduk_'.date('d-m-Y').'.pdf';
        force_download($name, $data);
     }

     public function cetak_penduduk()
     {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['data_penduduk'] = $this->Data_penduduk_model->get_all();
        $this->load->view('sid/data_penduduk/penduduk_cetak', $data);
     }

    public function cetak_biodata($id='') 
    {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['penduduk'] = $this->Data_penduduk_model->get_penduduk_id($id);
        $this->load->view('sid/data_penduduk/cetak_biodata', $data);
    }
}

/* End of file Data_penduduk.php */
/* Location: ./application/controllers/Data_penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-10-05 08:31:53 */
/* http://harviacode.com */