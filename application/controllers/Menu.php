<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('Menu_model', 'menu');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		///tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

		//ambil data menu
		$data['getMenu'] = $this->menu->getDataMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required',[
			'required' => 'Menu harus di isi!',
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Modul';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('flash', 'Menu Berhasil Ditambahkan!');
            redirect('menu');
		}
	}

	public function updateMenu($id)
	{
	   	$this->menu->updateMenuById($id);
       	$this->session->set_flashdata('flash', 'Menu Berhasil Diupdate!');
		redirect('menu');
	}

	public function hapus_menu($id)
	{
		$where = array('id' => $id);
		$this->menu->hapus_data($where, 'user_menu');
		$this->session->set_flashdata('flash', 'Menu Berhasil Dihapus!');
		redirect('menu');
	}


	public function sub_modul($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//panggil icon menu dilibrary font awesome 
		$data['list_icon'] = $this->menu->list_icon();

		//ambil data sub menu
		$data['SubModul'] = $this->menu->ambilSubModul();

		//tampilkan data menu yang akan diedit
		$data['nama_menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
		
		$where = array('menu_id' => $id);
		$data['sub_Modul'] = $this->menu->detail_menu($where, 'user_sub_menu')->result();
		$data['title'] = 'Modul';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/detail_menu', $data);
		$this->load->view('templates/footer');
	}



	public function submenu()
	{
		$data['title'] = 'Sub Menu';
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		$data['list_icon'] = $this->menu->list_icon();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data sub menu
		$data['subMenu'] = $this->menu->getSubMenu();

		//ambil data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Submenu', 'required',[
        	'required' => 'Submenu harus di isi!',
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required',[
        	'required' => 'Menu harus di isi!',
    	]);
        $this->form_validation->set_rules('url', 'URL', 'required',[
        	'required' => 'Url harus di isi!',
    	]);
        $this->form_validation->set_rules('icon', 'Icon', 'required',[
        	'required' => 'Icon harus di isi!',
    	]);

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('flash', 'Menu Ditambahkan!');
            redirect('menu/submenu');
		}
	}

	public function edit_Submenu($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		$data['list_icon'] = $this->menu->list_icon();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$where = array('id' => $id);
		$data['sub_menu'] = $this->menu->edit_data($where,'user_sub_menu')->result();
		$data['title'] = 'Sub Menu';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/edit_sub', $data);
		$this->load->view('templates/footer');

	}

	public function update_sub()
	{
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$menu_id = $this->input->post('menu_id');
		$url = $this->input->post('url');
		$icon = $this->input->post('icon');
		$is_active = $this->input->post('is_active');

		$data = [
			'title' => $title,
			'menu_id' => $menu_id,
			'url' => $url,
			'icon' => $icon,
			'is_active' => $is_active
		];

		$where = array('id' => $id);
		$this->menu->update_sub($where, $data, 'user_sub_menu');
		$this->session->set_flashdata('flash', 'Menu Diupdate!');
		redirect('menu/submenu');
	}

	public function hapus_sub($id)
	{
		$where = array('id' => $id);
		$this->menu->hapus_sub($where, 'user_sub_menu');
		$this->session->set_flashdata('flash', 'Menu berhasil dihapus!');
		redirect('menu/submenu');
	}

	//panggil link yang dikirim kan dari sub menu utama
	public function submenu_lock($id = '')
	{
		$this->menu->sub_menu_lock($id, 0);
		$this->session->set_flashdata('flash', 'Menu dinon-aktifkan!');
		redirect("menu/submenu");
	}

	//panggil link yang dikirim kan dari sub menu utama
	public function submenu_unlock($id = '')
	{
		$this->menu->sub_menu_lock($id, 1);
		$this->session->set_flashdata('flash', 'Menu diaktifkan!');
		redirect("menu/submenu");
	}


	//panggil link yang dikirim kan dari sub menu detail menu
	public function submodul_lock($id = '')
	{
		$urlpage = $_SERVER['HTTP_REFERER'];
		$this->menu->sub_lockById($id, 0);
		$this->session->set_flashdata('flash', 'sub menu dinon-aktifkan!');
		redirect($urlpage);
	}

	//panggil link yang dikirim kan dari sub menu detail menu
	public function submodul_unlock($id = '')
	{
		$url = $_SERVER['HTTP_REFERER'];
		$this->menu->sub_lockById($id, 1);
		$this->session->set_flashdata('flash', 'sub menu diaktifkan!');
		redirect($url);
	}

	//tambah sub modul di detail menu
	public function tambah_modul()
	{
		//jika berhasil alihkan ke halaman yang sama
		$direct = $_SERVER['HTTP_REFERER'];
		$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('flash', 'Sub Modul berhasil ditambahkan!');
            redirect($direct);
	}

	public function hapus_submodul($id)
	{
		//jika berhasil alihkan ke halaman yang sama
		$urldirect = $_SERVER['HTTP_REFERER'];
		$where = array('id' => $id);
		$this->menu->hapus_sub($where, 'user_sub_menu');
		$this->session->set_flashdata('flash', 'Sub modul berhasil dihapus!');
		redirect($urldirect);
	}

	public function edit_ModulById($id)
	{
		//jika berhasil alihkan ke halaman yang sama
	   	$alih = $_SERVER['HTTP_REFERER'];
	   	$this->menu->editSubModulById($id);
       	$this->session->set_flashdata('flash', 'sub modul berhasil diupdate!');
		redirect($alih);
	}
}