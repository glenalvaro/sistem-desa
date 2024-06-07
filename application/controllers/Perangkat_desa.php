<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perangkat_desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Perangkat_desa_model');
        $this->load->model('Data_penduduk_model','penduduk');
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
            $config['base_url'] = base_url() . 'perangkat_desa/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perangkat_desa/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perangkat_desa/index';
            $config['first_url'] = base_url() . 'perangkat_desa/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perangkat_desa_model->total_rows($q);
        $perangkat_desa = $this->Perangkat_desa_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        if (isset($_GET['status_peg'])) {
                $id_stat=$_GET['status_peg'];
                $sql = "SELECT * FROM perangkat_desa WHERE status={$id_stat}";
                $query = $this->db->query($sql);
                $perangkat_desa = $query->result(); 
        }

        $data = array(
            'perangkat_desa_data' => $perangkat_desa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
      
            $list['title'] = 'Perangkat Desa';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('buku_desa/perangkat_desa/list', $data);
            $this->load->view('templates/footer');
    }

    //ambil foto di database tampilkan di view
    public function ambil_foto_perangkat()
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

        $row = $this->Perangkat_desa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_pegawai' => $row->nama_pegawai,
		'gelar' => $row->gelar,
		'nik_pegawai' => $row->nik_pegawai,
		'nip' => $row->nip,
		'tempat_lahir' => $row->tempat_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'pendidikan' => $row->pendidikan,
		'agama' => $row->agama,
		'pangkat_golongan' => $row->pangkat_golongan,
		'jabatan_pegawai' => $row->jabatan_pegawai,
		'status' => $row->status,
		'foto_pegawai' => $row->foto_pegawai,
	    );
            $list['title'] = 'Perangkat Desa';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('buku_desa/perangkat_desa/detail', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perangkat_desa'));
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
            'action' => site_url('perangkat_desa/create_action'),
	    'id' => set_value('id'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	    'gelar' => set_value('gelar'),
	    'nik_pegawai' => set_value('nik_pegawai'),
	    'nip' => set_value('nip'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'pendidikan' => set_value('pendidikan'),
	    'agama' => set_value('agama'),
	    'pangkat_golongan' => set_value('pangkat_golongan'),
	    'jabatan_pegawai' => set_value('jabatan_pegawai'),
	    'status' => set_value('status'),
	    'foto_pegawai' => set_value('foto_pegawai'),
	);
         // ambil data penduduk
        $data['get_penduduk']       = $this->penduduk->get_all();
        $data['pendidikan_kk']      = $this->penduduk->get_pendidikan_kk();
        $data['penduduk_agama']     = $this->penduduk->get_penduduk_agama();
        $data['jab_perangkat']      = $this->db->get('jabatan_perangkat')->result_array();

         if (isset($_GET['id_peg'])) {
            $id_pen=$_GET['id_peg'];
            $sql = "SELECT u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status,
            p.nama AS pendidikan, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan
            FROM data_penduduk u
            LEFT JOIN penduduk_hubungan h ON u.hubungan_keluarga_id = h.id
            LEFT JOIN tweb_penduduk_sex k ON u.jenis_kelamin = k.id
            LEFT JOIN penduduk_agama a ON u.agama_id = a.id
            LEFT JOIN penduduk_status t ON u.status_penduduk_id = t.id
            LEFT JOIN penduduk_pendidikan_kk p ON u.pendikan_kk_id = p.id
            LEFT JOIN penduduk_pendidikan s ON u.pendidikan_sedang_id = s.id
            LEFT JOIN penduduk_pekerjaan e ON u.pekerjaan_id = e.id
            LEFT JOIN penduduk_suku su ON u.suku = su.id
            LEFT JOIN status_dasar sd ON u.status_dasar_id = sd.id
            LEFT JOIN wilayah_desa j ON u.dusun_id = j.id
            LEFT JOIN golongan_darah c ON u.golongan_darah = c.id
            WHERE u.id=$id_pen";
            $query = $this->db->query($sql);
            $data  = $query->row_array();  
        }

        $list['title'] = 'Perangkat Desa';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/perangkat_desa/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->Perangkat_desa_model->tambah_perangkat();
            $this->session->set_flashdata('flash', 'Perangkat Desa ditambahkan');
            redirect(site_url('perangkat_desa'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Perangkat_desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perangkat_desa/update_action'),
		'id' => set_value('id', $row->id),
		'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
		'gelar' => set_value('gelar', $row->gelar),
		'nik_pegawai' => set_value('nik_pegawai', $row->nik_pegawai),
		'nip' => set_value('nip', $row->nip),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
		'agama' => set_value('agama', $row->agama),
		'pangkat_golongan' => set_value('pangkat_golongan', $row->pangkat_golongan),
		'jabatan_pegawai' => set_value('jabatan_pegawai', $row->jabatan_pegawai),
		'status' => set_value('status', $row->status),
		'foto_pegawai' => set_value('foto_pegawai', $row->foto_pegawai),
	    );
            // $this->template->load('template','perangkat_desa/perangkat_desa_form', $data);

            $list['title'] = 'Perangkat Desa';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('buku_desa/perangkat_desa/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perangkat_desa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'gelar' => $this->input->post('gelar',TRUE),
		'nik_pegawai' => $this->input->post('nik_pegawai',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'pangkat_golongan' => $this->input->post('pangkat_golongan',TRUE),
		'jabatan_pegawai' => $this->input->post('jabatan_pegawai',TRUE),
		'status' => $this->input->post('status',TRUE),
		'foto_pegawai' => $this->input->post('foto_pegawai',TRUE),
	    );

            $this->Perangkat_desa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash', 'Data diupdate');
            redirect(site_url('perangkat_desa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perangkat_desa_model->get_by_id($id);

         // Hapus file foto perangkat yg di hapus di folder assets/img/pic_penduduk
        $file_foto = LOKASI_USER_PICT . $row->foto_pegawai;
        if (is_file($file_foto)) {
            unlink($file_foto);
            //break;
        }

        // Hapus file foto perangkat yg di hapus di folder assets/img/pic_penduduk
        $file_foto_kecil = LOKASI_USER_PICT . 'kecil_' . $row->foto_pegawai;
        if (is_file($file_foto_kecil)) {
            unlink($file_foto_kecil);
            //break;
        }

        if ($row) {
            $this->Perangkat_desa_model->delete($id);
            $this->session->set_flashdata('flash', 'Data Perangkat dihapus');
            redirect(site_url('perangkat_desa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perangkat_desa'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "perangkat_desa.xls";
        $judul = "perangkat_desa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Gelar");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Pangkat Golongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Pegawai");

	foreach ($this->Perangkat_desa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gelar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pangkat_golongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_pegawai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=perangkat_desa.doc");

        $data = array(
            'perangkat_desa_data' => $this->Perangkat_desa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('perangkat_desa/perangkat_desa_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'perangkat_desa_data' => $this->Perangkat_desa_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('buku_desa/perangkat_desa/perangkat_desa_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('perangkat_desa.pdf', 'D'); 
    }

    public function kelola_jabatan()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $list['list_jabatan'] = $this->db->get('jabatan_perangkat')->result_array();

        $list['title'] = 'Perangkat Desa';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('buku_desa/perangkat_desa/jabatan_perangkat/list', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jabatan()
    {
        $this->db->insert('jabatan_perangkat', ['nama' => $this->input->post('nama')]);
        $this->session->set_flashdata('flash', 'Data Jabatan Ditambahkan!');
        redirect('perangkat_desa/kelola_jabatan');
    }

    public function update_jabatan($id)
    {
        $this->Perangkat_desa_model->updateJabatanById($id);
        $this->session->set_flashdata('flash', 'Data Jabatan Diupdate!');
        redirect('perangkat_desa/kelola_jabatan');
    }

    public function hapus_jabatan($id)
    {
        $where = array('id' => $id);
        $this->Perangkat_desa_model->hapus_data_jab($where, 'jabatan_perangkat');
        $this->session->set_flashdata('flash', 'Data Jabatan Dihapus!');
        redirect('perangkat_desa/kelola_jabatan');
    }

}

/* End of file Perangkat_desa.php */
/* Location: ./application/controllers/Perangkat_desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-03 06:33:32 */
/* http://harviacode.com */