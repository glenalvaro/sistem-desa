<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Home_model', 'home');
	}

	public function index()
    {

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data file size database di model
		$data['database_list'] = $this->home->getSizeDB();

		$data['title'] = 'Database';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('database/index', $data);
		$this->load->view('templates/footer');
	}

	public function backup_database()
	{
		$this->load->dbutil();

		$tanggal = date('Y-m-d');
		$nama_database = $this->db->database;

		$prefs = array(
			'format' => 'sql',
			'filename' => $nama_database.'_'.$tanggal.'.sql',
			'add_drop' => FALSE,
			'add_insert' => TRUE,
			'newline' => "\n",
			'foreign_key_checks' => FALSE,
		);

		$backup = $this->dbutil->backup($prefs);
		$nama_file = $nama_database.'_'.$tanggal.'.sql';
		$this->load->helper('download');
		force_download($nama_file, $backup);
	}

	// backup files in directory
	public function backup_files_sid()
	{
     $opt = array(
       'src' => '../sistem-desa', // dir name to backup
       'dst' => 'folder_arsip/backup_sid' // dir name backup output destination
     );
     
     // Codeigniter v3x
     $this->load->library('recurseZip_lib', $opt);
     $download = $this->recursezip_lib->compress();
     
     $this->session->set_flashdata('flash','Backup Folder Desa Berhasil');
      redirect('database');
	}
}