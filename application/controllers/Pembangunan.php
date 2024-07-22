<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembangunan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Pembangunan_model');
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
            $config['base_url'] = base_url() . 'pembangunan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembangunan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembangunan/index';
            $config['first_url'] = base_url() . 'pembangunan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembangunan_model->total_rows($q);
        $pembangunan = $this->Pembangunan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembangunan_data' => $pembangunan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $list['title'] = 'Pembangunan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('pembangunan/table', $data);
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Pembangunan_model->get_by_id($id);
        if ($row) {
        $data = array(
		'id' => $row->id,
		'nama_kegiatan' => $row->nama_kegiatan,
		'volume' => $row->volume,
		'waktu' => $row->waktu,
		'jenis_waktu' => $row->jenis_waktu,
		'sumber_dana' => $row->sumber_dana,
		'tahun_anggaran' => $row->tahun_anggaran,
		'total_anggaran' => $row->total_anggaran,
		'biaya_pemerintah' => $row->biaya_pemerintah,
		'biaya_provinsi' => $row->biaya_provinsi,
		'biaya_kab' => $row->biaya_kab,
		'biaya_swadaya' => $row->biaya_swadaya,
		'sifat_proyek' => $row->sifat_proyek,
		'pelaksana_kegiatan' => $row->pelaksana_kegiatan,
		'lokasi_pembangunan' => $row->lokasi_pembangunan,
		'manfaat' => $row->manfaat,
		'keterangan' => $row->keterangan,
		'gambar_proyek' => $row->gambar_proyek,
		'latitude' => $row->latitude,
		'longitude' => $row->longitude,
		'status' => $row->status,
	    );
         
        $list['title'] = 'Pembangunan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('pembangunan/detail', $data);
        $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembangunan'));
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
            'action' => site_url('pembangunan/create_action'),
		    'id' => set_value('id'),
		    'nama_kegiatan' => set_value('nama_kegiatan'),
		    'volume' => set_value('volume'),
		    'waktu' => set_value('waktu'),
		    'jenis_waktu' => set_value('jenis_waktu'),
		    'sumber_dana' => set_value('sumber_dana'),
		    'tahun_anggaran' => set_value('tahun_anggaran'),
		    'total_anggaran' => set_value('total_anggaran'),
		    'biaya_pemerintah' => set_value('biaya_pemerintah'),
		    'biaya_provinsi' => set_value('biaya_provinsi'),
		    'biaya_kab' => set_value('biaya_kab'),
		    'biaya_swadaya' => set_value('biaya_swadaya'),
		    'sifat_proyek' => set_value('sifat_proyek'),
		    'pelaksana_kegiatan' => set_value('pelaksana_kegiatan'),
		    'lokasi_pembangunan' => set_value('lokasi_pembangunan'),
		    'manfaat' => set_value('manfaat'),
		    'keterangan' => set_value('keterangan'),
		    'gambar_proyek' => set_value('gambar_proyek'),
		    'latitude' => set_value('latitude'),
		    'longitude' => set_value('longitude'),
		    'status' => set_value('status'),
		);

		$data['wilayah'] 		= $this->db->get('wilayah_desa')->result_array();
		$data['dana_sumber'] 	= $this->db->get('sumber_dana')->result_array();
		$data['data_desa'] 			= $this->db->get('identitas_desa')->result_array();

        $list['title'] = 'Pembangunan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('pembangunan/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Pembangunan_model->tambah_pembangunan();
            $this->session->set_flashdata('flash', 'Data Pembangunan ditambahkan');
            redirect(site_url('pembangunan'));
        }
    }

    public function status_lock($id = '')
	{
		$this->Pembangunan_model->key_status($id, 0);
		$this->session->set_flashdata('flash', 'Data Pembangunan Dinon-aktifkan');
		redirect("pembangunan");
	}

	public function status_unlock($id = '')
	{
		$this->Pembangunan_model->key_status($id, 1);
		$this->session->set_flashdata('flash', 'Data Pembangunan Diaktifkan');
		redirect("pembangunan");
	}
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Pembangunan_model->get_by_id($id);

        if ($row) {
            $data = array(
             	'button' => 'Update',
             	'action' => site_url('pembangunan/update_action'),
				'id' => set_value('id', $row->id),
				'nama_kegiatan' => set_value('nama_kegiatan', $row->nama_kegiatan),
				'volume' => set_value('volume', $row->volume),
				'waktu' => set_value('waktu', $row->waktu),
				'jenis_waktu' => set_value('jenis_waktu', $row->jenis_waktu),
				'sumber_dana' => set_value('sumber_dana', $row->sumber_dana),
				'tahun_anggaran' => set_value('tahun_anggaran', $row->tahun_anggaran),
				'total_anggaran' => set_value('total_anggaran', $row->total_anggaran),
				'biaya_pemerintah' => set_value('biaya_pemerintah', $row->biaya_pemerintah),
				'biaya_provinsi' => set_value('biaya_provinsi', $row->biaya_provinsi),
				'biaya_kab' => set_value('biaya_kab', $row->biaya_kab),
				'biaya_swadaya' => set_value('biaya_swadaya', $row->biaya_swadaya),
				'sifat_proyek' => set_value('sifat_proyek', $row->sifat_proyek),
				'pelaksana_kegiatan' => set_value('pelaksana_kegiatan', $row->pelaksana_kegiatan),
				'lokasi_pembangunan' => set_value('lokasi_pembangunan', $row->lokasi_pembangunan),
				'manfaat' => set_value('manfaat', $row->manfaat),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'gambar_proyek' => set_value('gambar_proyek', $row->gambar_proyek),
				'latitude' => set_value('latitude', $row->latitude),
				'longitude' => set_value('longitude', $row->longitude),
				'status' => set_value('status', $row->status),
			);

			$data['wilayah'] 		= $this->db->get('wilayah_desa')->result_array();
			$data['dana_sumber'] 	= $this->db->get('sumber_dana')->result_array();
			$data['data_desa'] 		= $this->db->get('identitas_desa')->result_array();

            $list['title'] = 'Pembangunan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('pembangunan/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembangunan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->Pembangunan_model->update_pembangunan($this->input->post('id', TRUE));
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('pembangunan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembangunan_model->get_by_id($id);

        if ($row) {
            // Hapus file foto di folder asets/img/pembangunan
            $image_default = $row->gambar_proyek;
            $path = './assets/img/pembangunan/';
             // hapus foto lama selain foto default
                if ($image_default != '404-image-not-found.jpg') {
                    unlink(FCPATH . $path . $image_default);
                }
                $this->Pembangunan_model->delete($id);
                //hapus juga di table dokumentasi jika ada
                $this->db->delete('dokumentasi_pembangunan', array(
                    'id_pembangunan' => $id
                ));
                $this->session->set_flashdata('flash', 'Data Pembangunan dihapus');
                redirect(site_url('pembangunan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembangunan'));
        }
    }

    public function lokasi($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Pembangunan_model->get_by_id($id);
        if ($row) {
        $data = array(
            'id' => $row->id,
            'nama_kegiatan' => $row->nama_kegiatan,
            'latitude' => $row->latitude,
            'longitude' => $row->longitude,
        );
         
        $list['title'] = 'Pembangunan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('pembangunan/lokasi', $data);
        $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembangunan'));
        }
    }

    public function update_lokasi($id)
    {
        $this->Pembangunan_model->updateLokasiById($id);
        $this->session->set_flashdata('flash', 'Lokasi Pembangunan Diupdate!');
        redirect('pembangunan');
    }

    public function dokumentasi_pembangunan($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
        
        $row = $this->Pembangunan_model->get_by_id($id);
        $data = array(
            'id' => $row->id,
            'nama_kegiatan' => $row->nama_kegiatan,
            'sumber_dana' => $row->sumber_dana,
            'lokasi_pembangunan' => $row->lokasi_pembangunan,
            'keterangan' => $row->keterangan
        );

        $data['get_dok'] = $this->Pembangunan_model->getDokumentasi_ID($id);

        $list['title'] = 'Pembangunan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('pembangunan/dokumentasi/table', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_dokumentasi($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Pembangunan_model->get_by_id($id);
        $data = array(
            'id' => $row->id
        );

         $this->form_validation->set_rules('ket', 'keterangan', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $list['title'] = 'Pembangunan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('pembangunan/dokumentasi/form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pembangunan_model->tambah_dok();
            $this->session->set_flashdata('flash', 'Dokumentasi Pembangunan ditambahkan');
            $link1 = site_url() . "pembangunan/dokumentasi_pembangunan/{$id}";
            redirect($link1);
        }
    }

    public function hapus_dok($id)
    {
        $dirc = $_SERVER['HTTP_REFERER'];
        $where = array('id' => $id);
        $row = $this->Pembangunan_model->get_DokumentasiByID($id);

        if ($row) {
            // Hapus file foto di folder asets/img/pembangunan/dokumentasi
            $foto_dokumentasi = './assets/img/pembangunan/dokumentasi/' . $row->foto_dok;
            if ($foto_dokumentasi) {
                unlink($foto_dokumentasi);
                //break;
            }
            $this->Pembangunan_model->hapus_DokumentasiID($where, 'dokumentasi_pembangunan');
            $this->session->set_flashdata('flash', 'Data Dokumentasi dihapus!');
            redirect($dirc);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect($dirc);
        }
    }

    public function cetak_dokumentasi($id)
    {
        $row = $this->Pembangunan_model->get_by_id($id);
        $data = array(
            'id' => $row->id,
            'nama_kegiatan' => $row->nama_kegiatan,
            'sumber_dana' => $row->sumber_dana,
            'lokasi_pembangunan' => $row->lokasi_pembangunan,
            'tahun_anggaran' => $row->tahun_anggaran,
            'pelaksana_kegiatan' => $row->pelaksana_kegiatan,
            'volume' => $row->volume,
            'total_anggaran' => $row->total_anggaran,
            'keterangan' => $row->keterangan
        );

        $data['desa']               = $this->db->get('identitas_desa')->result_array();
        $data['setting']            = $this->db->get('setting')->result_array();
        $data['get_data_dok']       = $this->Pembangunan_model->getDokumentasi_ID($id);
        $this->load->view('pembangunan/dokumentasi/cetak', $data);
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'trim|required');
		$this->form_validation->set_rules('volume', 'volume', 'trim|required');
		$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
		$this->form_validation->set_rules('jenis_waktu', 'jenis waktu', 'trim|required');
		$this->form_validation->set_rules('sumber_dana', 'sumber dana', 'trim|required');
		$this->form_validation->set_rules('tahun_anggaran', 'tahun anggaran', 'trim|required');
		$this->form_validation->set_rules('total_anggaran', 'total anggaran', 'trim|required');
		$this->form_validation->set_rules('biaya_pemerintah', 'biaya pemerintah', 'trim|required');
		$this->form_validation->set_rules('biaya_provinsi', 'biaya provinsi', 'trim|required');
		$this->form_validation->set_rules('biaya_kab', 'biaya kab', 'trim|required');
		$this->form_validation->set_rules('biaya_swadaya', 'biaya swadaya', 'trim|required');
		$this->form_validation->set_rules('sifat_proyek', 'sifat proyek', 'trim|required');
		$this->form_validation->set_rules('pelaksana_kegiatan', 'pelaksana kegiatan', 'trim|required');
		$this->form_validation->set_rules('lokasi_pembangunan', 'lokasi pembangunan', 'trim|required');
		$this->form_validation->set_rules('manfaat', 'manfaat', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembangunan.php */
/* Location: ./application/controllers/Pembangunan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-25 20:19:52 */
/* http://harviacode.com */