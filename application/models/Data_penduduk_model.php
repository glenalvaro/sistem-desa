<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_penduduk_model extends CI_Model
{

    public $table = 'data_penduduk';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all data penduduk
    function get_all()
    {
        $query = "SELECT u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status,
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
			LEFT JOIN golongan_darah c ON u.golongan_darah = c.id";

		$result = $this->db->query($query)->result();
		return $result;
    }

    // get all data penduduk
    function get_penduduk_sementara()
    {
        $query = "SELECT u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status,
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
			WHERE status_penduduk_id=2";

		$result = $this->db->query($query)->result();
		return $result;
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db
				->select('u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status, p.nama AS pendidikan_kk, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan')
				->from('data_penduduk u')
				->join('penduduk_hubungan h', 'u.hubungan_keluarga_id = h.id', 'left')
				->join('tweb_penduduk_sex k', 'u.jenis_kelamin = k.id', 'left')
				->join('penduduk_agama a', 'u.agama_id = a.id', 'left')
				->join('penduduk_status t', 'u.status_penduduk_id = t.id', 'left')
				->join('penduduk_pendidikan_kk p', 'u.pendikan_kk_id = p.id', 'left')
				->join('penduduk_pendidikan s', 'u.pendidikan_sedang_id = s.id', 'left')
				->join('penduduk_pekerjaan e', 'u.pekerjaan_id = e.id', 'left')
				->join('penduduk_suku su', 'u.suku = su.id', 'left')
				->join('status_dasar sd', 'u.status_dasar_id = sd.id', 'left')
				->join('wilayah_desa j', 'u.dusun_id = j.id', 'left')
				->join('golongan_darah c', 'u.golongan_darah = c.id', 'left')
				->where('u.id', $id);

		 $query = $this->db->get();
   		 return $query->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('id', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nama_penduduk', $q);
	$this->db->or_like('hubungan_keluarga_id', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('agama_id', $q);
	$this->db->or_like('status_penduduk_id', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('kelahiran_anak_ke', $q);
	$this->db->or_like('pendikan_kk_id', $q);
	$this->db->or_like('pendidikan_sedang_id', $q);
	$this->db->or_like('pekerjaan_id', $q);
	$this->db->or_like('suku', $q);
	$this->db->or_like('status_warganegara', $q);
	$this->db->or_like('dokumen_paspor', $q);
	$this->db->or_like('tgl_paspor', $q);
	$this->db->or_like('dokumen_kitas', $q);
	$this->db->or_like('negara_asal', $q);
	$this->db->or_like('nik_ayah', $q);
	$this->db->or_like('nik_ibu', $q);
	$this->db->or_like('nama_ayah', $q);
	$this->db->or_like('nama_ibu', $q);
	$this->db->or_like('dusun_id', $q);
	$this->db->or_like('alamat_sebelumnya', $q);
	$this->db->or_like('alamat_sekarang', $q);
	$this->db->or_like('no_telepon', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('status_kawin', $q);
	$this->db->or_like('golongan_darah', $q);
	$this->db->or_like('asuransi_kesehatan', $q);
	$this->db->or_like('no_asuransi', $q);
	$this->db->or_like('bpjs_ketenagakerjaan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('status_dasar_id', $q);
	$this->db->or_like('tgl_terdaftar', $q);
	$this->db->or_like('created_by', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data penduduk dan search
    function get_limit_data($limit, $start = 0, $q = NULL) 
    {

    	$this->db
			 ->select('u.*, h.nama AS hubungan, k.nama AS sex, a.nama as agama, t.nama as status, p.nama AS pendidikan_kk, s.nama AS pendidikan_sedang, e.nama AS pekerjaan, su.suku as suku_penduduk, sd.nama as status_dasar, j.nama_dusun as dusun, c.nama as darah_golongan')
			 ->from('data_penduduk u')
			 ->join('penduduk_hubungan h', 'u.hubungan_keluarga_id = h.id', 'left')
			 ->join('tweb_penduduk_sex k', 'u.jenis_kelamin = k.id', 'left')
			 ->join('penduduk_agama a', 'u.agama_id = a.id', 'left')
			 ->join('penduduk_status t', 'u.status_penduduk_id = t.id', 'left')
			 ->join('penduduk_pendidikan_kk p', 'u.pendikan_kk_id = p.id', 'left')
			 ->join('penduduk_pendidikan s', 'u.pendidikan_sedang_id = s.id', 'left')
			 ->join('penduduk_pekerjaan e', 'u.pekerjaan_id = e.id', 'left')
			 ->join('penduduk_suku su', 'u.suku = su.id', 'left')
			 ->join('status_dasar sd', 'u.status_dasar_id = sd.id', 'left')
			 ->join('wilayah_desa j', 'u.dusun_id = j.id', 'left')
			 ->join('golongan_darah c', 'u.golongan_darah = c.id', 'left')
			 ->order_by($this->id, $this->order)
			 ->like('nik', $q)
			 ->or_like('nama_penduduk', $q)
			 ->limit($limit, $start);

		return $this->db->get()->result();
    }

    function tambah_penduduk()
    {
    	$foto_penduduk = $_FILES['image']['name'];

    	if ($foto_penduduk ='') {
    	} else {
    		$config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pic_penduduk/';
            $config['file_name'] = $this->input->post('nik', true); //beri nama nik pada foto yang diupload
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

            	$sex = $this->input->post('jenis_kelamin', TRUE);

            	if($sex == '1'){
            		$no_image = 'kuser.png';
            	} else {
            		$no_image = 'wuser.png';
            	}
                $data = [
                    'nik' 					=> $this->input->post('nik',TRUE),
					'no_kk' 				=> $this->input->post('no_kk',TRUE),
					'nama_penduduk' 		=> $this->input->post('nama_penduduk',TRUE),
					'hubungan_keluarga_id' 	=> $this->input->post('hubungan_keluarga_id',TRUE),
					'jenis_kelamin' 		=> $this->input->post('jenis_kelamin',TRUE),
					'agama_id' 				=> $this->input->post('agama_id',TRUE),
					'status_penduduk_id' 	=> $this->input->post('status_penduduk_id',TRUE),
					'tempat_lahir' 			=> $this->input->post('tempat_lahir',TRUE),
					'tgl_lahir' 			=> $this->input->post('tgl_lahir',TRUE),
					'kelahiran_anak_ke' 	=> $this->input->post('kelahiran_anak_ke',TRUE),
					'pendikan_kk_id' 		=> $this->input->post('pendikan_kk_id',TRUE),
					'pendidikan_sedang_id' 	=> $this->input->post('pendidikan_sedang_id',TRUE),
					'pekerjaan_id' 			=> $this->input->post('pekerjaan_id',TRUE),
					'suku' 					=> $this->input->post('suku',TRUE),
					'status_warganegara' 	=> $this->input->post('status_warganegara',TRUE),
					'dokumen_paspor' 		=> $this->input->post('dokumen_paspor',TRUE),
					'tgl_paspor' 			=> $this->input->post('tgl_paspor',TRUE),
					'dokumen_kitas' 		=> $this->input->post('dokumen_kitas',TRUE),
					'negara_asal' 			=> $this->input->post('negara_asal',TRUE),
					'nik_ayah'	 			=> $this->input->post('nik_ayah',TRUE),
					'nik_ibu' 				=> $this->input->post('nik_ibu',TRUE),
					'nama_ayah' 			=> $this->input->post('nama_ayah',TRUE),
					'nama_ibu' 				=> $this->input->post('nama_ibu',TRUE),
					'dusun_id' 				=> $this->input->post('dusun_id',TRUE),
					'alamat_sebelumnya' 	=> $this->input->post('alamat_sebelumnya',TRUE),
					'alamat_sekarang' 		=> $this->input->post('alamat_sekarang',TRUE),
					'no_telepon' 			=> $this->input->post('no_telepon',TRUE),
					'email' 				=> $this->input->post('email',TRUE),
					'status_kawin' 			=> $this->input->post('status_kawin',TRUE),
					'golongan_darah' 		=> $this->input->post('golongan_darah',TRUE),
					'asuransi_kesehatan' 	=> $this->input->post('asuransi_kesehatan',TRUE),
					'no_asuransi' 			=> $this->input->post('no_asuransi',TRUE),
					'bpjs_ketenagakerjaan' 	=> $this->input->post('bpjs_ketenagakerjaan',TRUE),
					'keterangan' 			=> $this->input->post('keterangan',TRUE),
					'status_dasar_id' 		=> $this->input->post('status_dasar_id',TRUE),
					'tgl_terdaftar' 		=> $this->input->post('tgl_terdaftar',TRUE),
					'created_by' 			=> $this->input->post('created_by',TRUE),
                    'foto' 					=> $no_image
                	];

                $this->db->insert($this->table, $data);

            } else {

            	 $foto_penduduk = $this->upload->data('file_name', true);

            	 $data = [
                    'nik' 					=> $this->input->post('nik',TRUE),
					'no_kk' 				=> $this->input->post('no_kk',TRUE),
					'nama_penduduk' 		=> $this->input->post('nama_penduduk',TRUE),
					'hubungan_keluarga_id' 	=> $this->input->post('hubungan_keluarga_id',TRUE),
					'jenis_kelamin' 		=> $this->input->post('jenis_kelamin',TRUE),
					'agama_id' 				=> $this->input->post('agama_id',TRUE),
					'status_penduduk_id' 	=> $this->input->post('status_penduduk_id',TRUE),
					'tempat_lahir' 			=> $this->input->post('tempat_lahir',TRUE),
					'tgl_lahir' 			=> $this->input->post('tgl_lahir',TRUE),
					'kelahiran_anak_ke' 	=> $this->input->post('kelahiran_anak_ke',TRUE),
					'pendikan_kk_id' 		=> $this->input->post('pendikan_kk_id',TRUE),
					'pendidikan_sedang_id' 	=> $this->input->post('pendidikan_sedang_id',TRUE),
					'pekerjaan_id' 			=> $this->input->post('pekerjaan_id',TRUE),
					'suku' 					=> $this->input->post('suku',TRUE),
					'status_warganegara' 	=> $this->input->post('status_warganegara',TRUE),
					'dokumen_paspor' 		=> $this->input->post('dokumen_paspor',TRUE),
					'tgl_paspor' 			=> $this->input->post('tgl_paspor',TRUE),
					'dokumen_kitas' 		=> $this->input->post('dokumen_kitas',TRUE),
					'negara_asal' 			=> $this->input->post('negara_asal',TRUE),
					'nik_ayah'	 			=> $this->input->post('nik_ayah',TRUE),
					'nik_ibu' 				=> $this->input->post('nik_ibu',TRUE),
					'nama_ayah' 			=> $this->input->post('nama_ayah',TRUE),
					'nama_ibu' 				=> $this->input->post('nama_ibu',TRUE),
					'dusun_id' 				=> $this->input->post('dusun_id',TRUE),
					'alamat_sebelumnya' 	=> $this->input->post('alamat_sebelumnya',TRUE),
					'alamat_sekarang' 		=> $this->input->post('alamat_sekarang',TRUE),
					'no_telepon' 			=> $this->input->post('no_telepon',TRUE),
					'email' 				=> $this->input->post('email',TRUE),
					'status_kawin' 			=> $this->input->post('status_kawin',TRUE),
					'golongan_darah' 		=> $this->input->post('golongan_darah',TRUE),
					'asuransi_kesehatan' 	=> $this->input->post('asuransi_kesehatan',TRUE),
					'no_asuransi' 			=> $this->input->post('no_asuransi',TRUE),
					'bpjs_ketenagakerjaan' 	=> $this->input->post('bpjs_ketenagakerjaan',TRUE),
					'keterangan' 			=> $this->input->post('keterangan',TRUE),
					'status_dasar_id' 		=> $this->input->post('status_dasar_id',TRUE),
					'tgl_terdaftar' 		=> $this->input->post('tgl_terdaftar',TRUE),
					'created_by' 			=> $this->input->post('created_by',TRUE),
                    'foto' 					=> $foto_penduduk
                	];

                	$this->db->insert($this->table, $data);
            }
    	}
    }

    function update_penduduk($id)
    {
    	$data['penduduk'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

    	// cek jika ada gambar yang di upload/diupdate
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pic_penduduk/';
            $config['file_name'] = $data['penduduk']['nik']; //beri nama nik pada foto penduduk yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['penduduk']['foto'];
                $path = './assets/img/pic_penduduk/';

                // hapus foto lama
                if ($old_image) {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
            } else {

                $data = [
                    'nik' 					=> $this->input->post('nik',TRUE),
					'no_kk' 				=> $this->input->post('no_kk',TRUE),
					'nama_penduduk' 		=> $this->input->post('nama_penduduk',TRUE),
					'hubungan_keluarga_id' 	=> $this->input->post('hubungan_keluarga_id',TRUE),
					'jenis_kelamin' 		=> $this->input->post('jenis_kelamin',TRUE),
					'agama_id' 				=> $this->input->post('agama_id',TRUE),
					'status_penduduk_id' 	=> $this->input->post('status_penduduk_id',TRUE),
					'tempat_lahir' 			=> $this->input->post('tempat_lahir',TRUE),
					'tgl_lahir' 			=> $this->input->post('tgl_lahir',TRUE),
					'kelahiran_anak_ke' 	=> $this->input->post('kelahiran_anak_ke',TRUE),
					'pendikan_kk_id' 		=> $this->input->post('pendikan_kk_id',TRUE),
					'pendidikan_sedang_id' 	=> $this->input->post('pendidikan_sedang_id',TRUE),
					'pekerjaan_id' 			=> $this->input->post('pekerjaan_id',TRUE),
					'suku' 					=> $this->input->post('suku',TRUE),
					'status_warganegara' 	=> $this->input->post('status_warganegara',TRUE),
					'dokumen_paspor' 		=> $this->input->post('dokumen_paspor',TRUE),
					'tgl_paspor' 			=> $this->input->post('tgl_paspor',TRUE),
					'dokumen_kitas' 		=> $this->input->post('dokumen_kitas',TRUE),
					'negara_asal' 			=> $this->input->post('negara_asal',TRUE),
					'nik_ayah'	 			=> $this->input->post('nik_ayah',TRUE),
					'nik_ibu' 				=> $this->input->post('nik_ibu',TRUE),
					'nama_ayah' 			=> $this->input->post('nama_ayah',TRUE),
					'nama_ibu' 				=> $this->input->post('nama_ibu',TRUE),
					'dusun_id' 				=> $this->input->post('dusun_id',TRUE),
					'alamat_sebelumnya' 	=> $this->input->post('alamat_sebelumnya',TRUE),
					'alamat_sekarang' 		=> $this->input->post('alamat_sekarang',TRUE),
					'no_telepon' 			=> $this->input->post('no_telepon',TRUE),
					'email' 				=> $this->input->post('email',TRUE),
					'status_kawin' 			=> $this->input->post('status_kawin',TRUE),
					'golongan_darah' 		=> $this->input->post('golongan_darah',TRUE),
					'asuransi_kesehatan' 	=> $this->input->post('asuransi_kesehatan',TRUE),
					'no_asuransi' 			=> $this->input->post('no_asuransi',TRUE),
					'bpjs_ketenagakerjaan' 	=> $this->input->post('bpjs_ketenagakerjaan',TRUE),
					'keterangan' 			=> $this->input->post('keterangan',TRUE),
					'status_dasar_id' 		=> $this->input->post('status_dasar_id',TRUE),
					'tgl_terdaftar' 		=> $this->input->post('tgl_terdaftar',TRUE),
					'created_by' 			=> $this->input->post('created_by',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
        	'nik' 					=> $this->input->post('nik',TRUE),
			'no_kk' 				=> $this->input->post('no_kk',TRUE),
			'nama_penduduk' 		=> $this->input->post('nama_penduduk',TRUE),
			'hubungan_keluarga_id' 	=> $this->input->post('hubungan_keluarga_id',TRUE),
			'jenis_kelamin' 		=> $this->input->post('jenis_kelamin',TRUE),
			'agama_id' 				=> $this->input->post('agama_id',TRUE),
			'status_penduduk_id' 	=> $this->input->post('status_penduduk_id',TRUE),
			'tempat_lahir' 			=> $this->input->post('tempat_lahir',TRUE),
			'tgl_lahir' 			=> $this->input->post('tgl_lahir',TRUE),
			'kelahiran_anak_ke' 	=> $this->input->post('kelahiran_anak_ke',TRUE),
			'pendikan_kk_id' 		=> $this->input->post('pendikan_kk_id',TRUE),
			'pendidikan_sedang_id' 	=> $this->input->post('pendidikan_sedang_id',TRUE),
			'pekerjaan_id' 			=> $this->input->post('pekerjaan_id',TRUE),
			'suku' 					=> $this->input->post('suku',TRUE),
			'status_warganegara' 	=> $this->input->post('status_warganegara',TRUE),
			'dokumen_paspor' 		=> $this->input->post('dokumen_paspor',TRUE),
			'tgl_paspor' 			=> $this->input->post('tgl_paspor',TRUE),
			'dokumen_kitas' 		=> $this->input->post('dokumen_kitas',TRUE),
			'negara_asal' 			=> $this->input->post('negara_asal',TRUE),
			'nik_ayah'	 			=> $this->input->post('nik_ayah',TRUE),
			'nik_ibu' 				=> $this->input->post('nik_ibu',TRUE),
			'nama_ayah' 			=> $this->input->post('nama_ayah',TRUE),
			'nama_ibu' 				=> $this->input->post('nama_ibu',TRUE),
			'dusun_id' 				=> $this->input->post('dusun_id',TRUE),
			'alamat_sebelumnya' 	=> $this->input->post('alamat_sebelumnya',TRUE),
			'alamat_sekarang' 		=> $this->input->post('alamat_sekarang',TRUE),
			'no_telepon' 			=> $this->input->post('no_telepon',TRUE),
			'email' 				=> $this->input->post('email',TRUE),
			'status_kawin' 			=> $this->input->post('status_kawin',TRUE),
			'golongan_darah' 		=> $this->input->post('golongan_darah',TRUE),
			'asuransi_kesehatan' 	=> $this->input->post('asuransi_kesehatan',TRUE),
			'no_asuransi' 			=> $this->input->post('no_asuransi',TRUE),
			'bpjs_ketenagakerjaan' 	=> $this->input->post('bpjs_ketenagakerjaan',TRUE),
			'keterangan' 			=> $this->input->post('keterangan',TRUE),
			'status_dasar_id' 		=> $this->input->post('status_dasar_id',TRUE),
			'tgl_terdaftar' 		=> $this->input->post('tgl_terdaftar',TRUE),
			'created_by' 			=> $this->input->post('created_by',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

    // delete data penduduk
    function hapus_penduduk($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_penduduk_hubungan()
    {
    	return $this->db->get('penduduk_hubungan')->result_array();
    }
    function get_jk()
    {
    	return $this->db->get('tweb_penduduk_sex')->result_array();
    }
    function get_penduduk_agama()
    {
    	return $this->db->get('penduduk_agama')->result_array();
    }
    function get_penduduk_status()
    {
    	return $this->db->get('penduduk_status')->result_array();
    }
    function get_pendidikan_kk()
    {
    	return $this->db->get('penduduk_pendidikan_kk')->result_array();
    }
    function get_pendidikan_sedang()
    {
    	return $this->db->get('penduduk_pendidikan')->result_array();
    }
    function get_penduduk_pekerjaan()
    {
    	return $this->db->get('penduduk_pekerjaan')->result_array();
    }
    function get_penduduk_suku()
    {
    	return $this->db->get('penduduk_suku')->result_array();
    }
    function get_status_warganegara()
    {
    	return $this->db->get('penduduk_warganegara')->result_array();
    }
    function get_wilayah_penduduk()
    {
    	return $this->db->get('wilayah_desa')->result_array();
    }
    function get_golongan_darah()
    {
    	return $this->db->get('golongan_darah')->result_array();
    }

    public function list_data($tabel, $kecuali = '', $termasuk = null)
    {
        if ($kecuali) {
            $this->db->where("id NOT IN ({$kecuali})");
        }

        if ($termasuk) {
            $this->db->where("id IN ({$termasuk})");
        }

        return $this->db->select('*')->order_by('id')->get($tabel)->result_array();
    }

    public function get_penduduk_id($id = 0)
    {
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
			WHERE u.id=?";
		$query = $this->db->query($sql, $id);
        $data  = $query->row_array();
        return $data;
    }

	public function Delete_all($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('data_penduduk');
    }

}

/* End of file Data_penduduk_model.php */
/* Location: ./application/models/Data_penduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-10-05 08:31:53 */
/* http://harviacode.com */