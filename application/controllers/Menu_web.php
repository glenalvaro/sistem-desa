<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_web extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Menu_web_model', 'menu_web');
		$this->load->model('Halaman_statis_model', 'statis');
		$this->load->model('Statistik_model', 'statistik');
		$this->load->model('Lembaga_masyarakat_model', 'lembaga');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['menu_list'] = $this->menu_web->get_all();

		$data['title'] = 'Menu';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu_web/table', $data);
		$this->load->view('templates/footer');
	}

	public function lock($id = '')
    {
        $this->menu_web->lock_menu($id, 0);
        $this->session->set_flashdata('flash', 'Menu Dinon-aktifkan');
        redirect("menu_web");
    }

    public function unlock($id = '')
    {
        $this->menu_web->lock_menu($id, 1);
        $this->session->set_flashdata('flash', 'Menu Diaktifkan');
        redirect("menu_web");
    }

    public function jenis_link()
    {
    	$link_id = $_POST['link_id'];
    	if ($link_id == 1) {
    		//link artikel
    		$link1 = $this->statis->get_all();
    		foreach ($link1 as $data){
    			echo "<option value='artikel/$data->id'>$data->judul</option>";
    		}
    	} elseif($link_id == 2) {
    		//link statistik
    		$link2 = $this->statistik->get_all();
    		foreach ($link2 as $data){
    			echo "<option value='statistik/{$data->id}'>{$data->menu}</option>";
    		}
    	} elseif($link_id == 4) {
    		//link data
    		echo "<option value='data_berita'>Berita</option>";
    		echo "<option value='bantuan'>Program Bantuan</option>";
    		echo "<option value='pembangunan'>Data Pembangunan</option>";
    		echo "<option value='data_umkm'>UMKM</option>";
    		echo "<option value='wilayah'>Wilayah Administratif</option>";
    	} elseif($link_id == 5) {
    		//link profil
    		echo "<option value='struktur_organisasi'>Data Pemerintahan</option>";
    		echo "<option value='peta'>Peta Wilayah</option>";
    		echo "<option value='data_inventaris'>Inventaris</option>";
    	} elseif($link_id == 6) {
    		//link informasi
    		echo "<option value='informasi_publik'>Informasi Publik</option>";
    	} elseif($link_id == 7) {
    		//link lembaga
    		$link7 = $this->lembaga->get_all();
    		foreach ($link7 as $data){
    			echo "<option value='lembaga/{$data->id}'>{$data->nama}</option>";
    		}
    	} else {
    		echo "<script>$('#link').removeClass('required');</script>";
    		echo "<script>$('#link_external').prop('hidden',false);</script>";
		    echo "<script>$('#link_web').prop('hidden',true);</script>";
    	}
    }

    public function tambah()
	{
		$data = [
				'nama'     		=> $this->input->post('nama'),
				'jenis_link'	=> $this->input->post('jenis_link'),
				'link'    		=> $this->input->post('link'),
				'status'		=> $this->input->post('status'),
		];
		$this->db->insert('menu_web', $data);
		$this->session->set_flashdata('flash', 'Menu Ditambahkan!');
       	redirect('menu_web');
	}

	public function update($id)
	{
		$data = [
			'nama'     		=> $this->input->post('nama'),
			'jenis_link'    => $this->input->post('jenis_link'),
			'link'			=> $this->input->post('link'),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('menu_web', $data);
		$this->session->set_flashdata('flash', 'Menu Berhasil Diubah!');
       	redirect('menu_web');
	}

	public function delete($id) 
    {
        $row = $this->menu_web->get_by_id($id);
        if ($row) {
            // Hapus menu
            $this->menu_web->hapus_data_menu($id);
            //hapus juga di table sub menu
            $this->db->delete('sub_menu_web', array(
                'id_menu' => $id
            ));
            $this->session->set_flashdata('flash', 'Menu dihapus');
            $direct = $_SERVER['HTTP_REFERER'];
       		redirect($direct);
        }
    }

	//sub menu
	public function sub_menu($id)
	{
		$list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
		
		$row = $this->menu_web->get_by_id($id);
        $data = array(
			'id_menu' => $row->id,
			'nama_menu' => $row->nama,
	    );
	    
		$data['list_sub_menu'] = $this->menu_web->getSubMenuID($id);

		$list['title'] = 'Sub Menu';
		$this->load->view('templates/header', $list);
		$this->load->view('templates/sidebar', $list);
		$this->load->view('menu_web/sub_menu', $data);
		$this->load->view('templates/footer');
	}

	public function lock_sub($id = '')
    {
        $this->menu_web->lock_sub_menu($id, 0);
        $this->session->set_flashdata('flash', 'Sub Menu Dinon-aktifkan');
       	$direct = $_SERVER['HTTP_REFERER'];
       	redirect($direct);
    }

    public function unlock_sub($id = '')
    {
        $this->menu_web->lock_sub_menu($id, 1);
        $this->session->set_flashdata('flash', 'Sub Menu Diaktifkan');
        $direct = $_SERVER['HTTP_REFERER'];
       	redirect($direct);
    }

	public function tambah_sub()
	{
		$data = [
				'id_menu'     	=> $this->input->post('id_menu'),
				'sub_nama'     	=> $this->input->post('sub_nama'),
				'tipe_link'		=> $this->input->post('tipe_link'),
				'url'    		=> $this->input->post('url'),
				'aktif'			=> $this->input->post('aktif'),
		];
		$this->db->insert('sub_menu_web', $data);
		$this->session->set_flashdata('flash', 'Sub Menu Ditambahkan!');
		$direct = $_SERVER['HTTP_REFERER'];
       	redirect($direct);
	}

	public function update_sub_menu($id)
	{
		$data = [
			'sub_nama'     => $this->input->post('sub_nama'),
			'tipe_link'    => $this->input->post('tipe_link'),
			'url'		   => $this->input->post('url'),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('sub_menu_web', $data);
		$this->session->set_flashdata('flash', 'Sub Menu Berhasil Diubah!');
       	$direct = $_SERVER['HTTP_REFERER'];
       	redirect($direct);
	}

	public function delete_sub($id)
	{
		$where = array('id' => $id);
		$this->menu_web->hapus($where, 'sub_menu_web');
		$this->session->set_flashdata('flash', 'Sub Menu dihapus');
		$direct = $_SERVER['HTTP_REFERER'];
       	redirect($direct);
	}
}