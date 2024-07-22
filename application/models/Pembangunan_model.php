<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembangunan_model extends CI_Model
{

    public $table = 'pembangunan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	    $this->db->or_like('nama_kegiatan', $q);
    	$this->db->or_like('volume', $q);
    	$this->db->or_like('waktu', $q);
    	$this->db->or_like('jenis_waktu', $q);
    	$this->db->or_like('sumber_dana', $q);
    	$this->db->or_like('tahun_anggaran', $q);
    	$this->db->or_like('total_anggaran', $q);
    	$this->db->or_like('biaya_pemerintah', $q);
    	$this->db->or_like('biaya_provinsi', $q);
    	$this->db->or_like('biaya_kab', $q);
    	$this->db->or_like('biaya_swadaya', $q);
    	$this->db->or_like('sifat_proyek', $q);
    	$this->db->or_like('pelaksana_kegiatan', $q);
    	$this->db->or_like('lokasi_pembangunan', $q);
    	$this->db->or_like('manfaat', $q);
    	$this->db->or_like('keterangan', $q);
    	$this->db->or_like('gambar_proyek', $q);
    	$this->db->or_like('latitude', $q);
    	$this->db->or_like('longitude', $q);
        $this->db->or_like('status', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('nama_kegiatan', $q);
    	$this->db->or_like('volume', $q);
    	$this->db->or_like('waktu', $q);
    	$this->db->or_like('jenis_waktu', $q);
    	$this->db->or_like('sumber_dana', $q);
    	$this->db->or_like('tahun_anggaran', $q);
    	$this->db->or_like('total_anggaran', $q);
    	$this->db->or_like('biaya_pemerintah', $q);
    	$this->db->or_like('biaya_provinsi', $q);
    	$this->db->or_like('biaya_kab', $q);
    	$this->db->or_like('biaya_swadaya', $q);
    	$this->db->or_like('sifat_proyek', $q);
    	$this->db->or_like('pelaksana_kegiatan', $q);
    	$this->db->or_like('lokasi_pembangunan', $q);
    	$this->db->or_like('manfaat', $q);
    	$this->db->or_like('keterangan', $q);
    	$this->db->or_like('gambar_proyek', $q);
    	$this->db->or_like('latitude', $q);
    	$this->db->or_like('longitude', $q);
        $this->db->or_like('status', $q);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

  function tambah_pembangunan()
  {
    	$gambar_pembangunan = $_FILES['image']['name'];

        if ($gambar_pembangunan ='') {
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '5048';
            $config['upload_path'] = './assets/img/pembangunan/';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

               $no_image = '404-image-not-found.jpg';
               
                $data = [
                    'nama_kegiatan'      	=> $this->input->post('nama_kegiatan',TRUE),
                    'volume'             	=> $this->input->post('volume',TRUE),
                    'waktu'       			=> $this->input->post('waktu',TRUE),
                    'jenis_waktu'           => $this->input->post('jenis_waktu',TRUE),
                    'sumber_dana'     		=> $this->input->post('sumber_dana',TRUE),
                    'tahun_anggaran'        => $this->input->post('tahun_anggaran',TRUE),
                    'total_anggaran'     	=> $this->input->post('total_anggaran',TRUE),
                    'biaya_pemerintah'      => $this->input->post('biaya_pemerintah',TRUE),
                    'biaya_provinsi'        => $this->input->post('biaya_provinsi',TRUE),
                    'biaya_kab'  			=> $this->input->post('biaya_kab',TRUE),
                    'biaya_swadaya'   		=> $this->input->post('biaya_swadaya',TRUE),
                    'sifat_proyek'          => $this->input->post('sifat_proyek',TRUE),
                    'pelaksana_kegiatan'    => $this->input->post('pelaksana_kegiatan',TRUE),
                    'lokasi_pembangunan'    => $this->input->post('lokasi_pembangunan',TRUE),
                    'manfaat'  				=> $this->input->post('manfaat',TRUE),
                    'keterangan'   			=> $this->input->post('keterangan',TRUE),
                    'latitude'            	=> $this->input->post('latitude',TRUE),
                    'longitude'           	=> $this->input->post('longitude',TRUE),
                    'status'             => $this->input->post('status',TRUE),
                    'gambar_proyek'      	=> $no_image
                    ];

                $this->db->insert($this->table, $data);

            } else {

                 $gambar_pembangunan = $this->upload->data('file_name', true);

                 $data = [
                    'nama_kegiatan'      	=> $this->input->post('nama_kegiatan',TRUE),
                    'volume'             	=> $this->input->post('volume',TRUE),
                    'waktu'       			=> $this->input->post('waktu',TRUE),
                    'jenis_waktu'           => $this->input->post('jenis_waktu',TRUE),
                    'sumber_dana'     		=> $this->input->post('sumber_dana',TRUE),
                    'tahun_anggaran'        => $this->input->post('tahun_anggaran',TRUE),
                    'total_anggaran'     	=> $this->input->post('total_anggaran',TRUE),
                    'biaya_pemerintah'      => $this->input->post('biaya_pemerintah',TRUE),
                    'biaya_provinsi'        => $this->input->post('biaya_provinsi',TRUE),
                    'biaya_kab'  			=> $this->input->post('biaya_kab',TRUE),
                    'biaya_swadaya'   		=> $this->input->post('biaya_swadaya',TRUE),
                    'sifat_proyek'          => $this->input->post('sifat_proyek',TRUE),
                    'pelaksana_kegiatan'    => $this->input->post('pelaksana_kegiatan',TRUE),
                    'lokasi_pembangunan'    => $this->input->post('lokasi_pembangunan',TRUE),
                    'manfaat'  				=> $this->input->post('manfaat',TRUE),
                    'keterangan'   			=> $this->input->post('keterangan',TRUE),
                    'latitude'            	=> $this->input->post('latitude',TRUE),
                    'longitude'           	=> $this->input->post('longitude',TRUE),
                    'status'                => $this->input->post('status',TRUE),
                    'gambar_proyek'      	=> $gambar_pembangunan
                    ];

                $this->db->insert($this->table, $data);
            }
        }
  }

  function update_pembangunan($id)
  {
        $data['pembangunan'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload/diupdate
        $update_gambar_pem = $_FILES['image'];

        if ($update_gambar_pem) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pembangunan/';

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['pembangunan']['gambar_proyek'];
                $path = './assets/img/pembangunan/';

                // hapus foto lama
                if ($old_image != '404-image-not-found.jpg') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_proyek', $new_image);
            } else {

                $data = [
                   'nama_kegiatan'          => $this->input->post('nama_kegiatan',TRUE),
                    'volume'                => $this->input->post('volume',TRUE),
                    'waktu'                 => $this->input->post('waktu',TRUE),
                    'jenis_waktu'           => $this->input->post('jenis_waktu',TRUE),
                    'sumber_dana'           => $this->input->post('sumber_dana',TRUE),
                    'tahun_anggaran'        => $this->input->post('tahun_anggaran',TRUE),
                    'total_anggaran'        => $this->input->post('total_anggaran',TRUE),
                    'biaya_pemerintah'      => $this->input->post('biaya_pemerintah',TRUE),
                    'biaya_provinsi'        => $this->input->post('biaya_provinsi',TRUE),
                    'biaya_kab'             => $this->input->post('biaya_kab',TRUE),
                    'biaya_swadaya'         => $this->input->post('biaya_swadaya',TRUE),
                    'sifat_proyek'          => $this->input->post('sifat_proyek',TRUE),
                    'pelaksana_kegiatan'    => $this->input->post('pelaksana_kegiatan',TRUE),
                    'lokasi_pembangunan'    => $this->input->post('lokasi_pembangunan',TRUE),
                    'manfaat'               => $this->input->post('manfaat',TRUE),
                    'keterangan'            => $this->input->post('keterangan',TRUE),
                    'latitude'              => $this->input->post('latitude',TRUE),
                    'longitude'             => $this->input->post('longitude',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

                $data = [
                    'nama_kegiatan'        => $this->input->post('nama_kegiatan',TRUE),
                    'volume'                => $this->input->post('volume',TRUE),
                    'waktu'                 => $this->input->post('waktu',TRUE),
                    'jenis_waktu'           => $this->input->post('jenis_waktu',TRUE),
                    'sumber_dana'           => $this->input->post('sumber_dana',TRUE),
                    'tahun_anggaran'        => $this->input->post('tahun_anggaran',TRUE),
                    'total_anggaran'        => $this->input->post('total_anggaran',TRUE),
                    'biaya_pemerintah'      => $this->input->post('biaya_pemerintah',TRUE),
                    'biaya_provinsi'        => $this->input->post('biaya_provinsi',TRUE),
                    'biaya_kab'             => $this->input->post('biaya_kab',TRUE),
                    'biaya_swadaya'         => $this->input->post('biaya_swadaya',TRUE),
                    'sifat_proyek'          => $this->input->post('sifat_proyek',TRUE),
                    'pelaksana_kegiatan'    => $this->input->post('pelaksana_kegiatan',TRUE),
                    'lokasi_pembangunan'    => $this->input->post('lokasi_pembangunan',TRUE),
                    'manfaat'               => $this->input->post('manfaat',TRUE),
                    'keterangan'            => $this->input->post('keterangan',TRUE),
                    'latitude'              => $this->input->post('latitude',TRUE),
                    'longitude'             => $this->input->post('longitude',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
  }

    //fungsi aktif nonaktif status pembangunan
    function key_status($id = '', $val = 0)
    {
        $sql = "UPDATE pembangunan SET status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
    }


 function updateLokasiById($id)
 {
    $lat = $this->input->post('latitude');
    $long = $this->input->post('longitude');

    $data = [
        'latitude' => $lat,
        'longitude' => $long,
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('pembangunan', $data);
  }

  function tambah_dok()
  {
        $gambar_dok = $_FILES['image']['name'];

        if ($gambar_dok ='') {
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pembangunan/dokumentasi/';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

               $no_image = '404-image-not-found.jpg';
               
                $data = [
                    'id_pembangunan'   => $this->input->post('id_pembangunan',TRUE),
                    'presentase'       => $this->input->post('presentase',TRUE),
                    'ket'              => $this->input->post('ket',TRUE),
                    'tgl_rekam'        => $this->input->post('tgl_rekam',TRUE),
                    'foto_dok'         => $no_image
                    ];

                $this->db->insert('dokumentasi_pembangunan', $data);

            } else {

                 $gambar_dok = $this->upload->data('file_name', true);

                 $data = [
                    'id_pembangunan'   => $this->input->post('id_pembangunan',TRUE),
                    'presentase'       => $this->input->post('presentase',TRUE),
                    'ket'              => $this->input->post('ket',TRUE),
                    'tgl_rekam'        => $this->input->post('tgl_rekam',TRUE),
                    'foto_dok'         => $gambar_dok
                    ];

                $this->db->insert('dokumentasi_pembangunan', $data);
            }
        }
  }

  //load data dokumentasi berdasarkan id pembangunan
  function getDokumentasi_ID($id)
  {
    $query = "SELECT * FROM dokumentasi_pembangunan WHERE id_pembangunan=$id ORDER BY id DESC";
    $result = $this->db->query($query)->result();
    return $result;
  }


  //kirim di controller hapus dokumen
  function get_DokumentasiByID($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get('dokumentasi_pembangunan')->row();
  }

  //hapus data dokumentasi pembangunan berdasarkan id table
  function hapus_DokumentasiID($where,$table)
  {
        $this->db->where($where);
        $this->db->delete($table);
  }

}

/* End of file Pembangunan_model.php */
/* Location: ./application/models/Pembangunan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-25 20:19:52 */
/* http://harviacode.com */