<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Umkm_model extends CI_Model
{

    public $table = 'umkm';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $sql = "SELECT u.*, k.nama AS nama_kat, p.nama_penduduk as nama_pemilik
        FROM umkm u 
        LEFT JOIN kategori_umkm k ON u.id_kategori = k.id
        LEFT JOIN data_penduduk p ON u.nik = p.nik
        ORDER BY u.id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    //untuk di view layanan penduduk dan web
    function get_all_limit()
    {
        $sql = "SELECT u.*, k.nama AS nama_kat, p.nama_penduduk as nama_pemilik
        FROM umkm u 
        LEFT JOIN kategori_umkm k ON u.id_kategori = k.id
        LEFT JOIN data_penduduk p ON u.nik = p.nik
        ORDER BY u.id DESC LIMIT 8";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    // get data by id
    function get_by_id($id)
    {
         $this->db
             ->select('u.*, k.nama AS nama_kat, p.nama_penduduk as nama_pemilik')
             ->from('umkm u ')
             ->join('kategori_umkm k', 'u.id_kategori = k.id', 'left')
             ->join('data_penduduk p', 'u.nik = p.nik', 'left')
             ->where('u.id', $id);

         $query = $this->db->get();
         return $query->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('nik', $q);
    	$this->db->or_like('no_tlp', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('harga_produk', $q);
        $this->db->or_like('satuan_produk', $q);
    	$this->db->or_like('nama_usaha', $q);
    	$this->db->or_like('id_kategori', $q);
    	$this->db->or_like('deskripsi', $q);
    	$this->db->or_like('latitude', $q);
    	$this->db->or_like('longitude', $q);
    	$this->db->or_like('tgl_posting', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
       $this->db
             ->select('u.*, k.nama AS nama_kat, p.nama_penduduk as nama_pemilik')
             ->from('umkm u ')
             ->join('kategori_umkm k', 'u.id_kategori = k.id', 'left')
             ->join('data_penduduk p', 'u.nik = p.nik', 'left')
             ->order_by($this->id, $this->order)
             ->like('nama_usaha', $q)
             ->or_like('id_kategori', $q)
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

    function updateKategoriById($id)
    {
        $kat = $this->input->post('nama');

        $data = [
            'nama' => $kat
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kategori_umkm', $data);
    }

    function hapus_data_kat($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function tambah_umkm()
    {
        //Siapkan nama gambar acak
        $convert_bytes = random_bytes(5);
        $hasil_bytes = bin2hex($convert_bytes);

        $gambar_utama = $_FILES['image']['name'];

        if ($gambar_utama ='') {
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '5048';
            $config['upload_path'] = './assets/img/foto_umkm/';
            $config['file_name'] = $hasil_bytes; //beri nama acak pada gambar
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {

               $no_image = '404-image-not-found.jpg';
               
                $data = [
                    'nik'               => $this->input->post('nik',TRUE),
                    'no_tlp'            => $this->input->post('no_tlp',TRUE),
                    'alamat'            => $this->input->post('alamat',TRUE),
                    'harga_produk'      => $this->input->post('harga_produk',TRUE),
                    'satuan_produk'     => $this->input->post('satuan_produk',TRUE),
                    'nama_usaha'        => $this->input->post('nama_usaha',TRUE),
                    'id_kategori'       => $this->input->post('id_kategori',TRUE),
                    'deskripsi'         => $this->input->post('deskripsi',TRUE),
                    'latitude'          => $this->input->post('latitude',TRUE),
                    'longitude'         => $this->input->post('longitude',TRUE),
                    'tgl_posting'       => $this->input->post('tgl_posting',TRUE),
                    'gambar'            => $no_image
                    ];

                $this->db->insert($this->table, $data);

            } else {

                 $gambar_utama = $this->upload->data('file_name', true);

                 $data = [
                    'nik'               => $this->input->post('nik',TRUE),
                    'no_tlp'            => $this->input->post('no_tlp',TRUE),
                    'alamat'            => $this->input->post('alamat',TRUE),
                    'harga_produk'      => $this->input->post('harga_produk',TRUE),
                    'satuan_produk'     => $this->input->post('satuan_produk',TRUE),
                    'nama_usaha'        => $this->input->post('nama_usaha',TRUE),
                    'id_kategori'       => $this->input->post('id_kategori',TRUE),
                    'deskripsi'         => $this->input->post('deskripsi',TRUE),
                    'latitude'          => $this->input->post('latitude',TRUE),
                    'longitude'         => $this->input->post('longitude',TRUE),
                    'tgl_posting'       => $this->input->post('tgl_posting',TRUE),
                    'gambar'            => $gambar_utama
                    ];

                $this->db->insert($this->table, $data);
            }
        }
    }


    function update_umkm($id)
    {
        //Siapkan nama gambar acak
        $update_bytes = random_bytes(5);
        $proses_bytes = bin2hex($update_bytes);

        $data['umkm'] = $this->db->get_where($this->table, ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload/diupdate
        $update_gambar_utama = $_FILES['image'];

        if ($update_gambar_utama) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '5048';
            $config['upload_path'] = './assets/img/foto_umkm/';
            $config['file_name'] = $proses_bytes; //update nama acak pada gambar

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $foto_lama = $data['umkm']['gambar'];
                $path = './assets/img/foto_umkm/';

                // hapus foto lama
                if ($foto_lama != '404-image-not-found.jpg') {
                    unlink(FCPATH . $path . $foto_lama);
                }
                // ganti foto lama dengan baru
                $foto_baru = $this->upload->data('file_name');
                $this->db->set('gambar', $foto_baru);
            } else {

                $data = [
                    'nik'               => $this->input->post('nik',TRUE),
                    'no_tlp'            => $this->input->post('no_tlp',TRUE),
                    'alamat'            => $this->input->post('alamat',TRUE),
                    'harga_produk'      => $this->input->post('harga_produk',TRUE),
                    'satuan_produk'     => $this->input->post('satuan_produk',TRUE),
                    'nama_usaha'        => $this->input->post('nama_usaha',TRUE),
                    'id_kategori'       => $this->input->post('id_kategori',TRUE),
                    'deskripsi'         => $this->input->post('deskripsi',TRUE),
                    'latitude'          => $this->input->post('latitude',TRUE),
                    'longitude'         => $this->input->post('longitude',TRUE)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update($this->table, $data);
            }
        }

                $data = [
                    'nik'               => $this->input->post('nik',TRUE),
                    'no_tlp'            => $this->input->post('no_tlp',TRUE),
                    'alamat'            => $this->input->post('alamat',TRUE),
                    'harga_produk'      => $this->input->post('harga_produk',TRUE),
                    'satuan_produk'     => $this->input->post('satuan_produk',TRUE),
                    'nama_usaha'        => $this->input->post('nama_usaha',TRUE),
                    'id_kategori'       => $this->input->post('id_kategori',TRUE),
                    'deskripsi'         => $this->input->post('deskripsi',TRUE),
                    'latitude'          => $this->input->post('latitude',TRUE),
                    'longitude'         => $this->input->post('longitude',TRUE)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

    function gambar_UmkmById($id)
    {
        $query = "SELECT `galeri_umkm`.`id_umkm`,`foto`
                  FROM `umkm` 
                  INNER JOIN `galeri_umkm` ON `umkm`.`id`=`galeri_umkm`.`id_umkm` 
                  Where `galeri_umkm`.`id_umkm`= $id";
        return $this->db->query($query)->result_array();
    }

    //ambil gambar di table galeri
    function get_gambar($id)
    {
        $query = "SELECT * FROM galeri_umkm WHERE id_umkm = $id";
        return $this->db->query($query)->result_array();
    }

}

/* End of file Umkm_model.php */
/* Location: ./application/models/Umkm_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-07-22 07:55:29 */
/* http://harviacode.com */