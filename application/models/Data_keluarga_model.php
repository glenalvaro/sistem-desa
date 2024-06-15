<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_keluarga_model extends CI_Model
{
	public $table = 'data_penduduk';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

	function get_penduduk_hubungan()
    {
    	$query = "SELECT * FROM `penduduk_hubungan` WHERE id != 1";
		return $this->db->query($query)->result_array();
    }

    public function getDataKeluarga()
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
			WHERE u.hubungan_keluarga_id=1
			ORDER BY u.id DESC";
		$result = $this->db->query($sql)->result();
		return $result;
    }

	public function anggota_KK($no_kk)
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
		WHERE u.no_kk=$no_kk
		ORDER BY u.hubungan_keluarga_id";
		$result = $this->db->query($sql)->result();
		return $result;
	}

	function tambah_anggota_kk()
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

	function ubah_data_kk($id)
    {
    	$alamat_sekarang = $this->input->post('alamat_sekarang');
        $dusun_id 	= $this->input->post('dusun_id');

        $data = [
            'alamat_sekarang' => $alamat_sekarang,
            'dusun_id' => $dusun_id
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_penduduk', $data);
    }
}