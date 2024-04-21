<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_kelompok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Data_penduduk_model','penduduk');
        $this->load->model('Data_kelompok_model','kelompok');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
        // ambil data kategori
        $data['kategori_list']   = $this->kelompok->list_data('kategori_kelompok');
        // ambbil data kategori kelompok di table kategori
        $data['list_kelompok'] = $this->kelompok->getDataKelompok();
		$data['title'] = 'Kelompok';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sid/kelompok/data_kelompok_list', $data);
		$this->load->view('templates/footer');
    }

    public function kelola_kategori()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
        // ambbil data kategori kelompok di table kategori
        $data['kategori_list'] = $this->db->get('kategori_kelompok')->result_array();
		$data['title'] = 'Kelompok';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sid/kelompok/kategori_kelompok/list_kategori', $data);
		$this->load->view('templates/footer');
    }

    public function kategori_form()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

        $this->form_validation->set_rules('kategori_kelompok', 'Kategori', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);

		$data['title'] = 'Kelompok';
        if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('sid/kelompok/kategori_kelompok/form_kategori', $data);
		    $this->load->view('templates/footer');
		} else {
			$data = [
				'kategori_kelompok'     => $this->input->post('kategori_kelompok'),
				'deskripsi_kategori'    => $this->input->post('deskripsi_kategori')
			];
			$this->db->insert('kategori_kelompok', $data);
			$this->session->set_flashdata('flash', 'Kategori Kelompok Ditambahkan!');
            redirect('data_kelompok/kelola_kategori');
		}
    }

    public function edit_kategori($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
		$where = array('id' => $id);
		$data['edit_list'] = $this->kelompok->edit_data($where,'kategori_kelompok')->result();
		$data['title'] = 'Kelompok';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sid/kelompok/kategori_kelompok/edit_kategori', $data);
		$this->load->view('templates/footer');
    }

    public function update_kategori()
	{
		$id = $this->input->post('id');
		$kategori_kelompok = $this->input->post('kategori_kelompok');
		$deskripsi_kategori = $this->input->post('deskripsi_kategori');

		$data = [
			'kategori_kelompok' => $kategori_kelompok,
			'deskripsi_kategori' => $deskripsi_kategori
		];

		$where = array('id' => $id);
		$this->kelompok->update_form_kategori($where, $data, 'kategori_kelompok');
		$this->session->set_flashdata('flash', 'Kategori Kelompok Diupdate!');
		redirect('data_kelompok/kelola_kategori');
	}

    public function hapus_kategori($id)
    {
        $where = array('id' => $id);
		$this->kelompok->hapus_kategori($where, 'kategori_kelompok');
		$this->session->set_flashdata('flash', 'Kategori Kelompok dihapus!');
		redirect('data_kelompok/kelola_kategori');
    }

    public function tambah_kelompok()
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
        // ambil data kategori kelompok
        $data['data_kategori'] = $this->db->get('kategori_kelompok')->result_array();
        // ambil data penduduk untuk dijadikan ketua kelompok
        $data['kelompok_ketua'] = $this->penduduk->get_all();

        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);
        $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);
        $this->form_validation->set_rules('id_kategori', 'Kategori Kelompok', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);
        $this->form_validation->set_rules('id_ketua', 'Ketua Kelompok', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);

		$data['title'] = 'Kelompok';
        if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
		    $this->load->view('templates/sidebar', $data);
		    $this->load->view('sid/kelompok/form_kelompok', $data);
		    $this->load->view('templates/footer');
		} else {
			$data = [
				'nama_kelompok'     => $this->input->post('nama_kelompok'),
				'kode_kelompok'    => $this->input->post('kode_kelompok'),
				'id_kategori'    => $this->input->post('id_kategori'),
				'id_ketua'    => $this->input->post('id_ketua'),
				'deskripsi_kelompok'    => $this->input->post('deskripsi_kelompok')
			];
			$this->db->insert('data_kelompok', $data);
			$this->session->set_flashdata('flash', 'Data Kelompok Ditambahkan!');
            redirect('data_kelompok');
		}
    }

    public function edit_kelompok($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();
		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();
		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
         // ambil data kategori kelompok
         $data['data_kategori'] = $this->db->get('kategori_kelompok')->result_array();
         // ambil data penduduk untuk dijadikan ketua kelompok
        $data['kelompok_ketua'] = $this->penduduk->get_all();
		$where = array('id' => $id);
		$data['kelompok_edit'] = $this->kelompok->edit_kelompok($where,'data_kelompok')->result();
		$data['title'] = 'Kelompok';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sid/kelompok/edit_kelompok', $data);
		$this->load->view('templates/footer');
    }

    public function update_kelompok()
	{
		$id = $this->input->post('id');
		$nama_kelompok = $this->input->post('nama_kelompok');
		$kode_kelompok = $this->input->post('kode_kelompok');
		$id_kategori = $this->input->post('id_kategori');
		$id_ketua = $this->input->post('id_ketua');
		$deskripsi_kelompok = $this->input->post('deskripsi_kelompok');

		$data = [
			'nama_kelompok' => $nama_kelompok,
			'kode_kelompok' => $kode_kelompok,
			'id_kategori' => $id_kategori,
			'id_ketua' => $id_ketua,
			'deskripsi_kelompok' => $deskripsi_kelompok
		];

		$where = array('id' => $id);
		$this->kelompok->update_kelompokID($where, $data, 'data_kelompok');
		$this->session->set_flashdata('flash', 'Data Kelompok Diupdate!');
		redirect('data_kelompok');
	}

	public function hapus_kelompok($id)
    {
		$this->db->delete('data_kelompok', array('id' => $id)); 
		$this->db->delete('anggota_kelompok', array('id_kelompok' => $id));
		$this->session->set_flashdata('flash', 'Data Kelompok dihapus!');
		redirect('data_kelompok');
    }

	public function filter_kategori()
    {
        $filter = isset($_POST["filter"]);
        if($filter) {
		 $get = $this->kelompok->filter_data($filter);
        }
		return $get;
    }

	public function cetak_kelompok()
    {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
		$data['list_kelompok'] = $this->kelompok->getDataKelompok();
        $this->load->view('sid/kelompok/cetak', $data);
    }

	public function export_pdf()
	{
	   $data['desa'] = $this->db->get('identitas_desa')->result_array();
	   $data['setting'] = $this->db->get('setting')->result_array();
	   $data['list_kelompok'] = $this->kelompok->getDataKelompok();

	   $pdfFilePath = FCPATH.'/folder_arsip/data_kelompok/Data_Kelompok_'.date('d-m-Y').'.pdf';
   
	   $html = $this->load->view('sid/kelompok/kelompok_pdf', $data, true); // render the view into HTML

	   ini_set('memory_limit','32M');
	   include_once APPPATH.'/third_party/mpdf/mpdf.php';
	   $param = '"en-GB-x","F4-L","","",10,10,10,10,6,3'; 
	   $pdf = new mPDF();
	   $pdf->AddPage($param);   
	   $pdf->WriteHTML($html); // write the HTML into the PDF
	   $pdf->Output($pdfFilePath, 'F'); // save to file because we can
		   
	   $this->load->helper('download');
	   $data = file_get_contents($pdfFilePath); // Read the file's contents
	   $name = 'Data_Kelompok_'.date('d-m-Y').'.pdf';
	   force_download($name, $data);
	}

	public function anggota_kelompok($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
		
		$row = $this->kelompok->getDataKelompokID($id);
        $data = array(
			'id' => $row->id,
			'kode_kelompok' => $row->kode_kelompok,
			'nama_kelompok' => $row->nama_kelompok,
			'nama_ketua' => $row->nama_ketua,
			'nama_kategori' => $row->nama_kategori,
			'deskripsi_kelompok' => $row->deskripsi_kelompok
	    );

		$data['list_anggota_kel'] = $this->kelompok->daftar_anggotaID($id);

		$list['title'] = 'Kelompok';
		$this->load->view('templates/header', $list);
		$this->load->view('templates/sidebar', $list);
		$this->load->view('sid/kelompok/anggota_kelompok/table', $data);
		$this->load->view('templates/footer');
	}

	//get data penduduk
	public function apipendudukkelompok()
	{
		//ambil data yang dikirim dari ajax 
		  $cari_penduduk = $this->input->post('searchTerm');
		  // Get penduduk
		  $response = $this->kelompok->get_api_search($cari_penduduk);
		  echo json_encode($response);
	}

	public function form_anggota($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

		$row = $this->kelompok->getDataKelompokID($id);
        $data = array(
			'id' => $row->id
	    );
		$data['list_anggota'] 	= $this->penduduk->get_all();
		$data['jabatan_list']	= $this->db->get('jabatan')->result_array();

        $this->form_validation->set_rules('id_anggota', 'ID Anggota', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);
        $this->form_validation->set_rules('no_anggota', 'No Anggota', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required',[
        	'required' => 'Kolom ini diperlukan!',
    	]);

        if ($this->form_validation->run() == FALSE) {
            $list['title'] = 'Kelompok';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('sid/kelompok/anggota_kelompok/form', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
				'id_anggota'    => $this->input->post('id_anggota'),
				'id_kelompok'   => $this->input->post('id_kelompok'),
				'no_anggota'	=> $this->input->post('no_anggota'),
				'jabatan'    	=> $this->input->post('jabatan'),
				'no_sk'    		=> $this->input->post('no_sk'),
				'keterangan'    => $this->input->post('keterangan')
			];
			$this->db->insert('anggota_kelompok', $data);
            $this->session->set_flashdata('flash', 'Data Anggota Kelompok ditambahkan');
            $link = site_url() . "data_kelompok/anggota_kelompok/{$id}";
            redirect($link);
        }
	}

	public function cetak_anggota($id)
	{
		$row = $this->kelompok->getDataKelompokID($id);
        $data = array(
			'id' => $row->id,
			'kode_kelompok' => $row->kode_kelompok,
			'nama_kelompok' => $row->nama_kelompok,
			'nama_ketua' => $row->nama_ketua,
			'nama_kategori' => $row->nama_kategori,
			'deskripsi_kelompok' => $row->deskripsi_kelompok
	    );
		$data['desa'] 				= $this->db->get('identitas_desa')->result_array();
		$data['setting'] 			= $this->db->get('setting')->result_array();
		$data['anggota_list'] 		= $this->kelompok->daftar_anggotaID($id);
		$this->load->view('sid/kelompok/anggota_kelompok/cetak', $data);
	}

	public function hapus_anggota($id)
    {
		$hal = $_SERVER['HTTP_REFERER'];
        $where = array('id' => $id);
		$this->kelompok->hapus_anggota($where, 'anggota_kelompok');
		$this->session->set_flashdata('flash', 'Data Anggota Kelompok dihapus!');
		redirect($hal);
    }

	public function edit_anggota($id_kelompok, $id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

		$row = $this->kelompok->getDataID($id_kelompok);
        $data = array(
			'id_kelompok' => $row->id
	    );
		$data['anggota_lis'] 	= $this->penduduk->get_all();
		$data['jabatan']		= $this->db->get('jabatan')->result_array();

		$where = array('id' => $id);
		$data['edit_anggota'] = $this->kelompok->edit_anggota($where,'anggota_kelompok')->result();
		$list['title'] = 'Kelompok';
		$this->load->view('templates/header', $list);
		$this->load->view('templates/sidebar', $list);
		$this->load->view('sid/kelompok/anggota_kelompok/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update_anggota($id_kelompok)
	{
		$id = $this->input->post('id');
		$id_anggota = $this->input->post('id_anggota');
		$id_kelompok = $this->input->post('id_kelompok');
		$no_anggota = $this->input->post('no_anggota');
		$jabatan = $this->input->post('jabatan');
		$no_sk = $this->input->post('no_sk');
		$keterangan = $this->input->post('keterangan');

		$data = [
			'id_anggota'    => $this->input->post('id_anggota'),
			'id_kelompok'   => $this->input->post('id_kelompok'),
			'no_anggota'	=> $this->input->post('no_anggota'),
			'jabatan'    	=> $this->input->post('jabatan'),
			'no_sk'    		=> $this->input->post('no_sk'),
			'keterangan'    => $this->input->post('keterangan')
		];

		$where = array('id' => $id);
		$this->kelompok->update_AnggotaID($where, $data, 'anggota_kelompok');
		$this->session->set_flashdata('flash', 'Data Anggota Diupdate!');
		$link_direct = site_url() . "data_kelompok/anggota_kelompok/{$id_kelompok}";
		redirect($link_direct);
	}
}