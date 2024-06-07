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
        $this->db->order_by($this->id, $this->order);
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

    //tambah data perangkat desa
    function tambah_perangkat()
    {
        $foto_perangkat = $_FILES['image']['name'];

        if ($foto_perangkat ='') {
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/pic_penduduk/';
            $config['file_name'] = $this->input->post('nip', true); //beri nama nik pada foto yang diupload
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
    

}

/* End of file Perangkat_desa_model.php */
/* Location: ./application/models/Perangkat_desa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-06-03 06:33:32 */
/* http://harviacode.com */