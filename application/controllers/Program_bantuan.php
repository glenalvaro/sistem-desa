<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Program_bantuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Program_bantuan_model');
        $this->load->model('Data_penduduk_model', 'penduduk');
        $this->load->model('Data_keluarga_model', 'keluarga');
        $this->load->model('Data_kelompok_model', 'kelompok');
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
            $config['base_url'] = base_url() . 'program_bantuan/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'program_bantuan/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'program_bantuan/index';
            $config['first_url'] = base_url() . 'program_bantuan/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Program_bantuan_model->total_rows($q);
        $program_bantuan = $this->Program_bantuan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-xs no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

         if (isset($_GET['sasaran_prog'])) {
                $sasaran=$_GET['sasaran_prog'];
                $sql = "SELECT * FROM program_bantuan WHERE sasaran_program={$sasaran}";
                $query = $this->db->query($sql);
                $program_bantuan = $query->result(); 
        }

        $data = array(
            'program_bantuan_data' => $program_bantuan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $list['title'] = 'Bantuan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/table', $data);
            $this->load->view('templates/footer');
    }

    public function panduan()
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

        $list['title'] = 'Bantuan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('bantuan/panduan');
        $this->load->view('templates/footer');
    }

    public function read($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Program_bantuan_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id' => $row->id,
    		'nama_program' => $row->nama_program,
    		'sasaran_program' => $row->sasaran_program,
    		'keterangan' => $row->keterangan,
    		'asal_dana' => $row->asal_dana,
    		'waktu_program' => $row->waktu_program,
    	    );
            $list['title'] = 'Akses';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/detail', $data);
            $this->load->view('templates/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
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
            'action' => site_url('program_bantuan/create_action'),
    	    'id' => set_value('id'),
    	    'nama_program' => set_value('nama_program'),
    	    'sasaran_program' => set_value('sasaran_program'),
    	    'keterangan' => set_value('keterangan'),
    	    'asal_dana' => set_value('asal_dana'),
    	    'sdate' => set_value('sdate'),
            'edate' => set_value('edate'),
	    );
        $list['title'] = 'Bantuan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('bantuan/form', $data);
        $this->load->view('templates/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'nama_program' => $this->input->post('nama_program',TRUE),
    		'sasaran_program' => $this->input->post('sasaran_program',TRUE),
    		'keterangan' => $this->input->post('keterangan',TRUE),
    		'asal_dana' => $this->input->post('asal_dana',TRUE),
    		'sdate' => $this->input->post('sdate',TRUE),
    		'edate' => $this->input->post('edate',TRUE),
	    );

            $this->Program_bantuan_model->insert($data);
            $this->session->set_flashdata('flash', 'Data Program Bantuan ditambahkan');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function update($id) 
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $list['desa'] = $this->db->get('identitas_desa')->result_array();

        $list['setting'] = $this->db->get('setting')->result_array();

        $row = $this->Program_bantuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('program_bantuan/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_program' => set_value('nama_program', $row->nama_program),
        		'sasaran_program' => set_value('sasaran_program', $row->sasaran_program),
        		'keterangan' => set_value('keterangan', $row->keterangan),
        		'asal_dana' => set_value('asal_dana', $row->asal_dana),
        		'sdate' => set_value('sdate', $row->sdate),
                'edate' => set_value('edate', $row->edate),
        	);
            $list['title'] = 'Bantuan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/form', $data);
            $this->load->view('templates/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'nama_program' => $this->input->post('nama_program',TRUE),
        		'sasaran_program' => $this->input->post('sasaran_program',TRUE),
        		'keterangan' => $this->input->post('keterangan',TRUE),
        		'asal_dana' => $this->input->post('asal_dana',TRUE),
        		'sdate' => $this->input->post('sdate',TRUE),
                'edate' => $this->input->post('edate',TRUE),
        	);

            $this->Program_bantuan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('flash', 'Data Program Bantuan diupdate');
            redirect(site_url('program_bantuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Program_bantuan_model->get_by_id($id);

        if ($row) {
            $this->Program_bantuan_model->delete($id);
            //hapus juga di table peserta bantuan jika ada
            $this->db->delete('peserta_bantuan', array(
                'id_program' => $id
            ));
            $this->session->set_flashdata('flash', 'Data Program Bantuan dihapus');
            redirect(site_url('program_bantuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('program_bantuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_program', 'nama program', 'trim|required');
	$this->form_validation->set_rules('sasaran_program', 'sasaran program', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('asal_dana', 'asal dana', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "program_bantuan.xls";
        $judul = "program_bantuan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Program");
    	xlsWriteLabel($tablehead, $kolomhead++, "Sasaran Program");
    	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Asal Dana");
    	xlsWriteLabel($tablehead, $kolomhead++, "Waktu Program");

	   foreach ($this->Program_bantuan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_program);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->sasaran_program);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_dana);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_program);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function list_peserta($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();
        
        $row = $this->Program_bantuan_model->get_by_id($id);
        $data = array(
            'id' => $row->id,
            'nama_program' => $row->nama_program,
            'sasaran_program' => $row->sasaran_program,
            'keterangan' => $row->keterangan,
            'asal_dana' => $row->asal_dana,
            'sdate' => $row->sdate,
            'edate' => $row->edate
        );

        $data['peserta_list'] = $this->Program_bantuan_model->daftar_PesertaID($id);
        $data['list_pesban'] = $this->db->get('peserta_bantuan')->result_array();
        $data['list_wilayah'] = $this->db->get('wilayah_desa')->result_array();
        $data['status_pen'] = $this->db->get('status_dasar')->result_array();

        $list['title'] = 'Bantuan';
        $this->load->view('templates/header', $list);
        $this->load->view('templates/sidebar', $list);
        $this->load->view('bantuan/peserta_program/tabel', $data);
        $this->load->view('templates/footer');
    }

    public function form_anggotaPeserta($id)
    {
        $list['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
        $list['desa'] = $this->db->get('identitas_desa')->result_array();
        $list['setting'] = $this->db->get('setting')->result_array();

         if (isset($_POST['no_nik'])) {
            $nik_pen=$_POST['no_nik'];
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
            WHERE u.id=$nik_pen";
            $query = $this->db->query($sql);
            $data  = $query->row_array();  
        }

        if (isset($_POST['nomor_kk'])) {
            $kk_pen=$_POST['nomor_kk'];
            $sql = "SELECT u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status,
            p.nama AS pendidikan_kk, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan
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
            WHERE u.no_kk=$kk_pen
            ORDER BY u.hubungan_keluarga_id";
            $query = $this->db->query($sql);
            $data  = $query->row_array();
        }

        if (isset($_POST['no_klompok'])) {
            $id_klp=$_POST['no_klompok'];
            $sql = "SELECT k.*, j.kategori_kelompok as nama_kategori, p.nama_penduduk as nama_penduduk, p.alamat_sekarang as alamat_sekarang, p.tempat_lahir as tempat_lahir, p.tgl_lahir as tgl_lahir, h.nama AS sex, s.nama AS pendidikan_sedang, p.status_warganegara as wg_ketua, a.nama as agama_ketua, w.nama_dusun as dusun, p.nik as nik, sd.nama as status_dasar
                FROM data_kelompok k 
                LEFT JOIN kategori_kelompok j ON k.id_kategori = j.id
                LEFT JOIN data_penduduk p ON k.id_ketua = p.id
                LEFT JOIN tweb_penduduk_sex h ON p.jenis_kelamin = h.id
                LEFT JOIN penduduk_pendidikan s ON p.pendidikan_sedang_id = s.id
                LEFT JOIN penduduk_agama a ON p.agama_id = a.id
                LEFT JOIN wilayah_desa w ON p.dusun_id = w.id
                LEFT JOIN status_dasar sd ON p.status_dasar_id = sd.id
                WHERE k.id=$id_klp";
            $query = $this->db->query($sql);
            $data  = $query->row_array();
        }

        $where = array('id' => $id);
        $data['detailProgram'] = $this->Program_bantuan_model->detail_program($where, 'program_bantuan')->result();
        $data['list_kel']   = $this->keluarga->getDataKeluarga();
        $data['list_klpk']  = $this->kelompok->getDataKelompok();

       
        $this->form_validation->set_rules('no_kartu', 'Kartu Peserta', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('nik_peserta', 'NIK Peserta', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);
        $this->form_validation->set_rules('alamat_peserta', 'alamat_peserta', 'required',[
            'required' => 'Kolom ini diperlukan!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $list['title'] = 'Bantuan';
            $this->load->view('templates/header', $list);
            $this->load->view('templates/sidebar', $list);
            $this->load->view('bantuan/peserta_program/form', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_program'    => $this->input->post('id_program'),
                'id_anggota'    => $this->input->post('id_anggota'),
                'id_sasaran'   => $this->input->post('id_sasaran'),
                'no_kartu'    => $this->input->post('no_kartu'),
                'nik_peserta'       => $this->input->post('nik_peserta'),
                'nama_peserta'         => $this->input->post('nama_peserta'),
                'tmp_lahir'    => $this->input->post('tmp_lahir'),
                'tgl_lahir'    => $this->input->post('tgl_lahir'),
                'jk'    => $this->input->post('jk'),
                'alamat_peserta'    => $this->input->post('alamat_peserta'),
                'keterangan'    => $this->input->post('keterangan')
            ];
            $this->db->insert('peserta_bantuan', $data);
            $this->session->set_flashdata('flash', 'Data Peserta ditambahkan');
            $link1 = site_url() . "program_bantuan/list_peserta/{$id}";
            redirect($link1);
        }
    }

    public function update_peserta($id)
    {
        $this->Program_bantuan_model->updatePesertaById($id);
        $this->session->set_flashdata('flash', 'Data Peserta Bantuan Diupdate!');
        $urlpage1 = $_SERVER['HTTP_REFERER'];
        redirect($urlpage1);
    }

    public function hapus_peserta($id)
    {
        $where = array('id' => $id);
        $this->Program_bantuan_model->hapus_data_pes($where, 'peserta_bantuan');
        $this->session->set_flashdata('flash', 'Data Peserta Bantuan Dihapus!');
        $urlpage2 = $_SERVER['HTTP_REFERER'];
        redirect($urlpage2);
    }

    public function cetak_datapeserta($id)
    {
        $row = $this->Program_bantuan_model->get_by_id($id);
        $data = array(
            'id' => $row->id,
            'nama_program' => $row->nama_program,
            'sasaran_program' => $row->sasaran_program,
            'keterangan' => $row->keterangan,
            'asal_dana' => $row->asal_dana,
            'sdate' => $row->sdate,
            'edate' => $row->edate
        );
        $data['desa']               = $this->db->get('identitas_desa')->result_array();
        $data['setting']            = $this->db->get('setting')->result_array();
        $data['anggota_list']       = $this->Program_bantuan_model->daftar_PesertaID($id);
        $this->load->view('bantuan/peserta_program/cetak', $data);
    }

}

/* End of file Program_bantuan.php */
/* Location: ./application/controllers/Program_bantuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-04-14 13:17:05 */
/* http://harviacode.com */