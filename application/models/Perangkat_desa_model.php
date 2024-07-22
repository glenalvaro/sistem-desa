<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perangkat_desa_model extends CI_Model
{

    public $table = 'perangkat_desa';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $sql = "SELECT p.*, j.nama as jabatan
        FROM perangkat_desa p 
        LEFT JOIN jabatan_perangkat j ON p.jabatan_pegawai = j.id
        ORDER BY p.id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //ambil hanya data jabatan kepala desa
    function get_kepdes()
    {
        $sql = "SELECT p.*, j.nama as jabatan
        FROM perangkat_desa p 
        LEFT JOIN jabatan_perangkat j ON p.jabatan_pegawai = j.id
        WHERE p.jabatan_pegawai=1";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    // get data by id
    function get_by_id($id)
    {
        $sql = "SELECT p.*, j.nama as jabatan
        FROM perangkat_desa p 
        LEFT JOIN jabatan_perangkat j ON p.jabatan_pegawai = j.id
        WHERE p.id = $id";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('nama_pegawai', $q);
    	$this->db->or_like('gelar', $q);
    	$this->db->or_like('nik_pegawai', $q);
    	$this->db->or_like('nip', $q);
    	$this->db->or_like('tempat_lahir', $q);
    	$this->db->or_like('tgl_lahir', $q);
    	$this->db->or_like('jenis_kelamin', $q);
    	$this->db->or_like('pendidikan', $q);
    	$this->db->or_like('agama', $q);
    	$this->db->or_like('pangkat_golongan', $q);
    	$this->db->or_like('jabatan_pegawai', $q);
    	$this->db->or_like('status', $q);
    	$this->db->or_like('foto_pegawai', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db
             ->select('p.*, j.nama as jabatan')
             ->from('perangkat_desa p')
             ->join('jabatan_perangkat j', 'p.jabatan_pegawai = j.id', 'left')
             ->order_by('p.jabatan_pegawai')
             ->like('nip', $q)
             ->or_like('nama_pegawai', $q)
             ->limit($limit, $start);

     return $this->db->get()->result();
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

    //tambah data perangkat desa
    function tambah_perangkat()
    {
        $foto_perangkat = $_FILES['image']['name'];

        if ($foto_perangkat ='') {
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pic_penduduk/';
            $config['file_name'] = $this->input->post('nip', true); //beri nama nip pada foto yang diupload
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

                $sex = $this->input->post('jenis_kelamin', TRUE);

                if($sex == '1'){
                    $no_image = 'kuser.png';
                } else {
                    $no_image = 'wuser.png';
                }
                $data = [
                    'nama_pegawai'      => $this->input->post('nama_pegawai',TRUE),
                    'gelar'             => $this->input->post('gelar',TRUE),
                    'nik_pegawai'       => $this->input->post('nik_pegawai',TRUE),
                    'nip'               => $this->input->post('nip',TRUE),
                    'tempat_lahir'      => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'         => $this->input->post('tgl_lahir',TRUE),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin',TRUE),
                    'pendidikan'        => $this->input->post('pendidikan',TRUE),
                    'agama'             => $this->input->post('agama',TRUE),
                    'pangkat_golongan'  => $this->input->post('pangkat_golongan',TRUE),
                    'jabatan_pegawai'   => $this->input->post('jabatan_pegawai',TRUE),
                    'status'            => $this->input->post('status',TRUE),
                    'foto_pegawai'      => $no_image
                    ];

                $this->db->insert($this->table, $data);

            } else {

                 $foto_perangkat = $this->upload->data('file_name', true);

                 $data = [
                    'nama_pegawai'      => $this->input->post('nama_pegawai',TRUE),
                    'gelar'             => $this->input->post('gelar',TRUE),
                    'nik_pegawai'       => $this->input->post('nik_pegawai',TRUE),
                    'nip'               => $this->input->post('nip',TRUE),
                    'tempat_lahir'      => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'         => $this->input->post('tgl_lahir',TRUE),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin',TRUE),
                    'pendidikan'        => $this->input->post('pendidikan',TRUE),
                    'agama'             => $this->input->post('agama',TRUE),
                    'pangkat_golongan'  => $this->input->post('pangkat_golongan',TRUE),
                    'jabatan_pegawai'   => $this->input->post('jabatan_pegawai',TRUE),
                    'status'            => $this->input->post('status',TRUE),
                    'foto_pegawai'      => $foto_perangkat
                    ];

                $this->db->insert($this->table, $data);
            }
        }
  }

  function update_perangkat($id)
  {
        $data['perangkat'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload/diupdate
        $update_image = $_FILES['image'];

        if ($update_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pic_penduduk/';
            $config['file_name'] = $data['perangkat']['nip']; //beri nama nip pada foto perangkat yang diupdate

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['perangkat']['foto_pegawai'];
                $path = './assets/img/pic_penduduk/';

                // hapus foto lama
                if ($old_image) {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_pegawai', $new_image);
            } else {

                $data = [
                    'nama_pegawai'      => $this->input->post('nama_pegawai',TRUE),
                    'gelar'             => $this->input->post('gelar',TRUE),
                    'nik_pegawai'       => $this->input->post('nik_pegawai',TRUE),
                    'nip'               => $this->input->post('nip',TRUE),
                    'tempat_lahir'      => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'         => $this->input->post('tgl_lahir',TRUE),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin',TRUE),
                    'pendidikan'        => $this->input->post('pendidikan',TRUE),
                    'agama'             => $this->input->post('agama',TRUE),
                    'pangkat_golongan'  => $this->input->post('pangkat_golongan',TRUE),
                    'jabatan_pegawai'   => $this->input->post('jabatan_pegawai',TRUE),
                    'status'            => $this->input->post('status',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

        $data = [
             'nama_pegawai'      => $this->input->post('nama_pegawai',TRUE),
                    'gelar'             => $this->input->post('gelar',TRUE),
                    'nik_pegawai'       => $this->input->post('nik_pegawai',TRUE),
                    'nip'               => $this->input->post('nip',TRUE),
                    'tempat_lahir'      => $this->input->post('tempat_lahir',TRUE),
                    'tgl_lahir'         => $this->input->post('tgl_lahir',TRUE),
                    'jenis_kelamin'     => $this->input->post('jenis_kelamin',TRUE),
                    'pendidikan'        => $this->input->post('pendidikan',TRUE),
                    'agama'             => $this->input->post('agama',TRUE),
                    'pangkat_golongan'  => $this->input->post('pangkat_golongan',TRUE),
                    'jabatan_pegawai'   => $this->input->post('jabatan_pegawai',TRUE),
                    'status'            => $this->input->post('status',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
  }

  function updateJabatanById($id)
  {
    $jab = $this->input->post('nama');

    $data = [
        'nama' => $jab
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('jabatan_perangkat', $data);
  }

  function hapus_data_jab($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  //fungsi aktif nonaktif status perangkat desa
  function status_perangkat($id = '', $val = 0)
 {
        $sql = "UPDATE perangkat_desa SET status = ? WHERE id = ?";
        $hasil = $this->db->query($sql, array($val, $id));
        $this->session->success = ($hasil === TRUE ? 1 : -1);
 }
    

}

/* End of file Perangkat_desa_model.php */
/* Location: ./application/models/Perangkat_desa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-03 06:33:32 */
/* http://harviacode.com */