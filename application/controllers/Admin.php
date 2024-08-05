<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		cek_login();
		$this->load->model('User_model', 'user');
		$this->load->model('Home_model', 'home');
		$this->load->model('Setting_model', 'setting');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tammpil data group
		$data['level'] = $this->home->getlevel();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['userList'] = $this->home->getPengguna();

		$data['title'] = 'Pengguna';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/data-user', $data);
		$this->load->view('templates/footer');
	}


	public function add_user()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//validasi form add
		$this->form_validation->set_rules('name', 'Nama', 'required|trim',[
			'required' => 'Nama wajib di isi!',
		]);
		$this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim',[
			'required' => 'No handphone wajib di isi!',
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
			'required' => 'Alamat wajib di isi!',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
	        'is_unique' => 'Email ini sudah terdaftar!',
	        'required' => 'Email wajib di isi!',
	        'valid_email' => 'Email tidak valid!'
   		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',[
			'required' => 'Password wajib di isi!',
		]);

		$this->form_validation->set_rules('role_id', 'Group', 'required|trim',[
			'required' => 'Group wajib di isi!',
		]);


		//tampilkan data role di add user
		$data['role'] = $this->db->get('user_role')->result_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		if($this->form_validation->run() == false){
			$data['title'] = 'Pengguna';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/add-user', $data);
			$this->load->view('templates/footer');
		} else {
			 $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), 
                 PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => 0,
                'date_created' => time()
           ];
           	$this->db->insert('user', $data);
           	$this->session->set_flashdata('flash', 'Pengguna ditambahkan');
			redirect('admin');
		}
	}

	public function edit_UserAdmin($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['akses'] = $this->db->get('user_role')->result_array();

        //ambil data user admin yang akan di edit sesuai id
        $data['user_data'] = $this->user->getUserById($id);

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'Email', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Phone', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
        	$data['title'] = 'Pengguna';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit-user', $data);
			$this->load->view('templates/footer');
        } else {
            $this->user->editUserById($id);
           	$this->session->set_flashdata('flash', 'Pengguna diupdate');
			redirect('admin');
        }
	}

	public function detail_user($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
		
		$where = array('id' => $id);
		$data['detailUser'] = $this->user->detail_user($where, 'user')->result();
		$data['title'] = 'Pengguna';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/detail-user', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_user($id)
	{
		$where = array('id' => $id);
		$this->user->hapus_user($where, 'user');
		$this->session->set_flashdata('flash', 'Pengguna dihapus');
		redirect('admin');
	}

	public function user_lock($id = '')
	{
		$this->user->user_lock($id, 0);
		$this->session->set_flashdata('flash', 'Pengguna dinon-aktifkan');
		redirect("admin");
	}

	public function user_unlock($id = '')
	{
		$this->user->user_lock($id, 1);
		$this->session->set_flashdata('flash', 'Pengguna diaktifkan');
		redirect("admin");
	}

    public function update_password($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();
		
        $data['title'] = 'Update Password User';

        //ambil data anggota yang akan di edit sesuai id
        $data['List'] = $this->user->getAnggotaById($id);

        $this->form_validation->set_rules('pas_1', 'Password','required|trim|matches[pas_2]',
			['required' => 'Kolom ini harus di isi !',
			'matches' => 'Password harus sama !'
		]);
		$this->form_validation->set_rules('pas_2', 'Ulangi Password','required|trim|matches[pas_1]',[
			'required' => 'Kolom ini harus di isi !',
			'matches' => 'Ulangi Password harus sama dengan Password yang telah kamu buat.'
		]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('admin/update_passwordUser', $data);
			$this->load->view('templates/footer');
        } else {
            $this->user->updatePasswordById($id);
            $this->session->set_flashdata('message','Password pengguna diupdate');
            redirect('admin');
        }

	}

	public function role()
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		//ambil data group di table user role
		$data['getGroup'] = $this->home->getDataGroup();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required',[
			'required' => 'Role harus di isi!',
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Pengguna';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('flash', 'Group ditambahkan');
            redirect('admin/role');
		}
	}

	public function edit_RoleById($id)
	{
		//jika berhasil alihkan ke halaman yang sama
	   	$alih = $_SERVER['HTTP_REFERER'];
	   	$this->home->editRoleById($id);
       	$this->session->set_flashdata('flash', 'Group berhasil diupdate!');
		redirect($alih);
	}

	public function hapus_role($id)
	{
		$where = array('id' => $id);
		$this->user->hapus_role($where, 'user_role');
		$this->session->set_flashdata('flash', 'Group dihapus');
		redirect('admin/role');
	}

	public function roleaccess($role_id)
	{

		$data['user'] = $this->db->get_where('user', ['email' => 
		$this->session->userdata('email')])->row_array();

		//tampil data dari table identitas desa
		$data['desa'] = $this->db->get('identitas_desa')->result_array();

		//ambil data pengaturan dari table setting
		$data['setting'] = $this->db->get('setting')->result_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$data['title'] = 'Pengguna';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
			$this->session->set_flashdata('flash', 'Akses Menu diberikan');
		} else {
			$this->db->delete('user_access_menu', $data);
			$this->session->set_flashdata('flash', 'Akses Menu dihapus');
		}
	}
}