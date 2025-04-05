<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();      
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('email')) {
            redirect('user');
        }

        //tampil data dari table identitas desa
        $data['desa'] = $this->db->get('identitas_desa')->result_array();

        //ambil data pengaturan dari table setting
        $data['setting'] = $this->db->get('setting')->result_array();

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Masukan Email !',
            'valid_email' => 'Email yang anda masukan tidak valid!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'Masukan Password !',
        ]);

        //validasi login
        if ($this->form_validation->run() == false) {
             $data['title'] = 'Masuk';
             $this->load->view('sid/login', $data);
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
       $email = $this->input->post('email');
       $password = $this->input->post('password');

       $user = $this->db->get_where('user', ['email' => $email])->row_array();
       
       // jika usernya ada
       if ($user) {
            //jika usernya aktif
        if($user['is_active'] == 1){
            //cek passwordnya nya
            if(password_verify($password, $user['password'])){
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name']
                ];
                $this->session->set_userdata($data);
                //cek hak akses
                    if($user['role_id'] == 1){
                        helper_log("login", "Login");
                        redirect('home');
                    } else {
                        helper_log("login", "Login");
                        redirect('user');
                    }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert">Password Salah !</div>');
            redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert">User belum aktif !</div>');
            redirect('auth');
        }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert">Email yang anda masukan tidak terdaftar !</div>');
            redirect('auth');
        }

    }

   public function logout()
   {
        helper_log("logout", "Logout");
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('auth');
   }

}