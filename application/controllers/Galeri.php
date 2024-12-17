<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Galeri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['daftar_album'] = $this->db->get('galeri')->result_array();

        $list['title'] = 'Galeri';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('galeri/table', $data);
        $this->load->view('templates/footer');
    }

    public function create() 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data = array(
            'button' => 'Create',
            'action' => site_url('galeri/create_action'),
    	    'id' => set_value('id'),
    	    'nama_album' => set_value('nama_album'),
    	    'aktif' => set_value('aktif'),
    	    'tgl_buat' => set_value('tgl_buat'),
    	    'gambar' => set_value('gambar'),
    	);
    
        $list['title'] = 'Galeri';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('galeri/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Galeri_model->tambah_album();
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect(site_url('galeri'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Galeri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('galeri/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_album' => set_value('nama_album', $row->nama_album),
        		'aktif' => set_value('aktif', $row->aktif),
        		'tgl_buat' => set_value('tgl_buat', $row->tgl_buat),
        		'gambar' => set_value('gambar', $row->gambar),
        	    );

            $list['title'] = 'Galeri';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('galeri/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Galeri_model->update($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('galeri'));
        }
    }

    public function delete($id) 
    {
        $row = $this->Galeri_model->get_by_id($id);

        if ($row) {
            // Hapus file foto di folder asets/img/galeri
            $image_default = $row->gambar;
            $path = './assets/img/galeri/';
             // hapus juga foto di folder galeri
                unlink(FCPATH . $path . $image_default);
                $this->Galeri_model->delete($id);
                // //hapus juga di table daftar album jika ada
                $this->db->delete('daftar_album', array(
                    'id_album' => $id
                ));
                $this->session->set_flashdata('flash', 'Data Album dihapus');
                redirect(site_url('galeri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

    public function album_lock($id = '')
    {
        $this->Galeri_model->lock_album($id, 0);
        $this->session->set_flashdata('flash', 'Album Dinon-aktifkan');
        redirect(site_url('galeri'));
    }

    public function album_unlock($id = '')
    {
        $this->Galeri_model->lock_album($id, 1);
        $this->session->set_flashdata('flash', 'Album Diaktifkan');
        redirect(site_url('galeri'));
    }

    public function album_list($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
        
        $row = $this->Galeri_model->get_by_id($id);
        $data = array(
            'id' => $row->id,
            'nama_album' => $row->nama_album
        );

        $data['get_album'] = $this->Galeri_model->get_album_id($id);

        $list['title'] = 'Daftar Album';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('galeri/album/table', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_gambar($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Galeri_model->get_by_id($id);
        $data = array(
            'id' => $row->id
        );

         $this->form_validation->set_rules('nama_gambar', 'Nama Gambar', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $list['title'] = 'Tambah Gambar';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('galeri/album/form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Galeri_model->tambah_gambar_album();
            $this->session->set_flashdata('flash', 'Gambar Album ditambahkan');
            $link_ref = site_url() . "galeri/album_list/{$id}";
            redirect($link_ref);
        }
    }

    public function hapus_gambarId($id)
    {
        $direct1 = $_SERVER['HTTP_REFERER'];
        $where = array('id' => $id);
        $row = $this->Galeri_model->get_AlbumByID($id);

        if ($row) {
            // Hapus file foto di folder asets/img/galeri/album
            $foto_album = './assets/img/galeri/album/' . $row->gambar;
            if ($foto_album) {
                unlink($foto_album);
                //break;
            }
            $this->Galeri_model->hapus_GambarID($where, 'daftar_album');
            $this->session->set_flashdata('flash', 'Gambar Album dihapus!');
            redirect($direct1);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect($direct1);
        }
    }

    public function gambar_album_lock($id = '')
    {
        $this->Galeri_model->lock_gambar_albumID($id, 0);
        $this->session->set_flashdata('flash', 'Gambar Album Dinon-aktifkan');
        $urlpage4 = $_SERVER['HTTP_REFERER'];
        redirect($urlpage4);
    }

    public function gambar_album_unlock($id = '')
    {
        $this->Galeri_model->lock_gambar_albumID($id, 1);
        $this->session->set_flashdata('flash', 'Gambar Album Diaktifkan');
        $urlpage5 = $_SERVER['HTTP_REFERER'];
        redirect($urlpage5);
    }

    public function edit_gambar($id_album, $id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Galeri_model->get_album($id_album);
        $data = array(
            'id_album' => $row->id_album
        );

        $where = array('id' => $id);
        $data['edit_gbr'] = $this->Galeri_model->gambar_id($where,'daftar_album')->result();
        $list['title'] = 'Edit Album';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('galeri/album/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update_gambar($id_album)
    {
        $this->Galeri_model->update_GambarID($id_album);
        $this->session->set_flashdata('flash', 'Gambar Album Diupdate!');
        $link_direct1 = site_url() . "galeri/album_list/{$id_album}";
        redirect($link_direct1);
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_album', 'nama album', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-11-07 09:50:01 */
/* http://harviacode.com */