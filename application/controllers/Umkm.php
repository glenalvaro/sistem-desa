<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Umkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Umkm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'umkm/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'umkm/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'umkm/index';
            $config['first_url'] = base_url() . 'umkm/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Umkm_model->total_rows($q);
        $umkm = $this->Umkm_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'umkm_data' => $umkm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/umkm_list', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Umkm_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_tlp' => $row->no_tlp,
            'alamat' => $row->alamat,
            'harga_produk' => $row->harga_produk,
            'satuan_produk' => $row->satuan_produk,
    		'nama_usaha' => $row->nama_usaha,
            'nama_pemilik' => $row->nama_pemilik,
            'nama_kat' => $row->nama_kat,
    		'id_kategori' => $row->id_kategori,
    		'deskripsi' => $row->deskripsi,
    		'latitude' => $row->latitude,
    		'longitude' => $row->longitude,
    		'tgl_posting' => $row->tgl_posting,
    		'gambar' => $row->gambar,
    	);

            $data['get_foto']  = $this->Umkm_model->gambar_UmkmById($id);
          
            $list['title'] = 'Usaha Mikro';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('umkm/umkm_read', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
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
            'action' => site_url('umkm/create_action'),
    	    'id' => set_value('id'),
    	    'nik' => set_value('nik'),
    	    'no_tlp' => set_value('no_tlp'),
            'alamat' => set_value('alamat'),
            'harga_produk' => set_value('harga_produk'),
            'satuan_produk' => set_value('satuan_produk'),
    	    'nama_usaha' => set_value('nama_usaha'),
    	    'id_kategori' => set_value('id_kategori'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'latitude' => set_value('latitude'),
    	    'longitude' => set_value('longitude'),
    	    'tgl_posting' => set_value('tgl_posting'),
    	    'gambar' => set_value('gambar'),
	       );

        $data['kategori_usaha'] = $this->db->get('kategori_umkm')->result_array();
        $data['nama_penduduk'] = $this->db->get('data_penduduk')->result_array();
      
        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/umkm_form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Umkm_model->tambah_umkm();
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect(site_url('umkm'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Umkm_model->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('umkm/update_action'),
    		'id' => set_value('id', $row->id),
    		'nik' => set_value('nik', $row->nik),
    		'no_tlp' => set_value('no_tlp', $row->no_tlp),
            'alamat' => set_value('alamat', $row->alamat),
            'harga_produk' => set_value('harga_produk', $row->harga_produk),
            'satuan_produk' => set_value('satuan_produk', $row->satuan_produk),
    		'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
    		'id_kategori' => set_value('id_kategori', $row->id_kategori),
    		'deskripsi' => set_value('deskripsi', $row->deskripsi),
    		'latitude' => set_value('latitude', $row->latitude),
    		'longitude' => set_value('longitude', $row->longitude),
    		'tgl_posting' => set_value('tgl_posting', $row->tgl_posting),
    		'gambar' => set_value('gambar', $row->gambar),
    	    );

            $data['kategori_usaha'] = $this->db->get('kategori_umkm')->result_array();
            $data['nama_penduduk'] = $this->db->get('data_penduduk')->result_array();
           
            $list['title'] = 'Usaha Mikro';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('umkm/umkm_form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Umkm_model->update_umkm($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data Diupdate');
            redirect(site_url('umkm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Umkm_model->get_by_id($id);

        $foto_umkm = $row->gambar;
        $path = './assets/img/foto_umkm/';

        // hapus foto yg diupload
        if ($foto_umkm != '404-image-not-found.jpg') {
            unlink(FCPATH . $path . $foto_umkm);
        }

        // cek jika ada foto yang diupload pada galeri
        $get_foto = $this->Umkm_model->get_gambar($id);

        $lokasi = './assets/img/foto_umkm/galeri/';

        foreach ($get_foto as $row)
        {
           $galeri = $row['foto'];

            if ($galeri) {
                unlink(FCPATH . $lokasi . $galeri);
            }
        }

        if ($row) {
            $this->Umkm_model->delete($id);
            $this->db->delete('galeri_umkm', array('id_umkm' => $id));
            $this->session->set_flashdata('flash', 'Data dihapus');
            redirect(site_url('umkm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('harga_produk', 'harga produk', 'trim|required');
    $this->form_validation->set_rules('satuan_produk', 'satuan produk', 'trim|required');
	$this->form_validation->set_rules('nama_usaha', 'nama usaha', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function kategori()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['umkm_kat'] = $this->db->get('kategori_umkm')->result_array();

        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori()
    {
        $this->db->insert('kategori_umkm', ['nama' => $this->input->post('nama')]);
        $this->session->set_flashdata('flash', 'Kategori Ditambahkan!');
        redirect('umkm/kategori');
    }

    public function update_kategori($id)
    {
        $this->Umkm_model->updateKategoriById($id);
        $this->session->set_flashdata('flash', 'Kategori Diupdate!');
        redirect('umkm/kategori');
    }

    public function hapus_kategori($id)
    {
        $where = array('id' => $id);
        $this->Umkm_model->hapus_data_kat($where, 'kategori_umkm');
        $this->session->set_flashdata('flash', 'Kategori Dihapus!');
        redirect('umkm/kategori');
    }


    public function peta_umkm() 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $data['data_umkm'] = $this->Umkm_model->get_all();
        $data['get_kategori'] = $this->db->get('kategori_umkm')->result_array();
          
        $list['title'] = 'Usaha Mikro';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('umkm/peta_umkm', $data);
        $this->load->view('templates/footer');
    }

    public function get_gambarById()
    {
        if(isset($_POST["gambar_id"])){
            $query = "SELECT * FROM galeri_umkm WHERE id_umkm='" . $_POST["gambar_id"] . "'";
            $result = $this->db->query($query)->result_array();
            echo json_encode($result);
        }
    }


    public function unggah_gambar($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Umkm_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id' => $row->id,
            'nama_usaha' => $row->nama_usaha,
            'nama_pemilik' => $row->nama_pemilik
        );
          
            $list['title'] = 'Usaha Mikro';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('umkm/unggah_gambar', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('umkm'));
        }
    }

    function proses_unggah()
    {
        $config['upload_path']   = './assets/img/foto_umkm/galeri/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
            $token      = $this->input->post('token_foto');
            $id_umkm    = $this->input->post('id_umkm');
            $nama       = $this->upload->data('file_name');
            $this->db->insert('galeri_umkm',array(
                'id_umkm'  => $id_umkm,
                'token'    => $token,
                'foto'     => $nama
            ));
        }
    }

    //Untuk menghapus gambar yang diunggah
    function hapus_gambar()
    {
        //Ambil token foto
        $token     = $this->input->post('token');
        $id_foto   = $this->db->get_where('galeri_umkm',array('token'=>$token));

        if($id_foto->num_rows()>0){
            $hasil = $id_foto->row();
            $nama_foto = $hasil->foto;
            if(file_exists($file = FCPATH.'/assets/img/foto_umkm/galeri/'.$nama_foto)){
                unlink($file);
            }
            $this->db->delete('galeri_umkm',array('token'=>$token));
        }
        echo "{}";
    }

    function cetak()
    {
        $data['desa'] = $this->db->get('identitas_desa')->result_array();
        $data['setting'] = $this->db->get('setting')->result_array();
        $data['list_umkm'] = $this->Umkm_model->get_all();
        $this->load->view('umkm/cetak', $data);
    }

}

/* End of file Umkm.php */
/* Location: ./application/controllers/Umkm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-07-22 07:55:29 */
/* http://harviacode.com */