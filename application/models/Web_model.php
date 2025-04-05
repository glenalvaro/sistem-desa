<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Artikel_model', 'artikel');
        $this->load->model('Umkm_model', 'umkm');
        $this->load->model('Setting_model', 'pengaturan');
        $this->load->model('Perangkat_desa_model', 'perangkat');
        $this->load->model('Home_model', 'home');
        $this->load->model('Media_sosial_model', 'medsos');
        $this->load->model('Setting_web_model', 'setting_web');
        $this->load->model('Pembangunan_model', 'pembangunan');
        $this->load->model('Informasi_publik_model', 'informasi');
        $this->load->model('Wilayah_desa_model', 'wilayah');
        $this->load->model('Sambutan_model', 'sambutan');
        $this->load->model('Inventaris_model', 'inventaris');
    }

    function config_web()
    {
       $data_app           = $this->pengaturan->get_data_app();
       $data_desa          = $this->pengaturan->get_data_desa();
       $data_perangkat     = $this->perangkat->get_kepdes_web();
       $setting_website    = $this->setting_web->get_all();
       $sambutan_data      = $this->sambutan->get_data_sambutan();
        
        // buat array
        $data = [
            'sambutan_isi'      => $sambutan_data['isi_sambutan'],
            'vendor'            => $data_app['vendor'],
            'sebutan_desa'      => $data_app['sebutan_desa'],
            'sebutan_wilayah'   => $data_app['sebutan_dusun'],
            'sebutan_kab'       => $data_app['sebutan_kabupaten'],
            'nomor_artikel'     => $data_app['artikel_page'],
            'zoom_peta'         => $data_app['zoom_peta'],
            'jenis_peta'        => $data_app['jenis_peta'],
            'latar_web'         => $data_app['latar_website'],
            'nama_desa'         => $data_desa['nama_desa'],
            'kode_pos'          => $data_desa['kode_pos'],
            'alamat_kantor'     => $data_desa['alamat_kantor'],
            'email_desa'        => $data_desa['email_desa'],
            'no_hp'             => $data_desa['no_hp'],
            'nama_kecamatan'    => $data_desa['nama_kecamatan'],
            'nama_kabupaten'    => $data_desa['nama_kabupaten'],
            'nama_provinsi'     => $data_desa['nama_provinsi'],
            'logo_desa'         => $data_desa['logo_desa'],
            'gambar_desa'       => $data_desa['gambar_desa'],
            'latitude'          => $data_desa['latitude'],
            'longitude'         => $data_desa['longitude'],
            'wilayah_desa'      => $data_desa['wilayah_desa'],
            'kepala_desa'       => $data_perangkat['nama_pegawai'],
            'jabatan'           => $data_perangkat['jabatan'],
            'gelar'             => $data_perangkat['gelar'],
            'sex'               => $data_perangkat['jenis_kelamin'],
            'foto_kepdes'       => $data_perangkat['foto_pegawai'],
            'layout_gambar'     => $setting_website['layout_gambar'],
            'tema_warna'        => $setting_website['tema_warna'],
            'teks_warna'        => $setting_website['teks_warna'],
            'tampil_statistik'  => $setting_website['tampil_statistik'],
            'total_pend'        => $this->home->jmlPenduduk(),
            'total_kel'         => $this->home->jmlKK(),
            'total_wilayah'     => $this->home->jmlWilayah(),
            'total_sementara'   => $this->home->penduduk_sementara(),     
            'total_pria'        => $this->home->get_pria(),
            'total_wanita'      => $this->home->get_wanita(),
            'total_layanan'     => $this->home->layanan_surat(),
            'total_umkm'        => $this->home->get_umkm(),
        ];

        $data['media_sosial'] = $this->medsos->get_all();

        return $data;
    }

    function load_data_umkm()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/data_umkm'); 
        $pagination['total_rows']       = $this->db->count_all('umkm'); 
        $pagination['per_page']         = 8;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_umkm']              = $this->umkm->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }

    function load_data_berita()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/data_berita'); 
        $pagination['total_rows']       = $this->db->count_all('artikel'); 
        $pagination['per_page']         = 6;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_berita']            = $this->artikel->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }

    function load_data_pembangunan()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/pembangunan'); 
        $pagination['total_rows']       = $this->db->count_all('pembangunan'); 
        $pagination['per_page']         = 6;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_pembangunan']       = $this->pembangunan->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }

    function load_data_informasi_publik()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/informasi_publik'); 
        $pagination['total_rows']       = $this->db->count_all('informasi_publik'); 
        $pagination['per_page']         = 10;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_informasi']         = $this->informasi->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }

    function load_data_wilayah()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/wilayah'); 
        $pagination['total_rows']       = $this->db->count_all('wilayah_desa'); 
        $pagination['per_page']         = 10;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_wilayah']           = $this->wilayah->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }

    function load_data_inventaris()
    {
        //konfigurasi pagination
        $pagination['base_url']         = site_url('web/data_inventaris'); 
        $pagination['total_rows']       = $this->db->count_all('inventaris'); 
        $pagination['per_page']         = 10;  
        $pagination["uri_segment"]      = 3;  
        $choice                         = $pagination["total_rows"] / $pagination["per_page"];
        $pagination["num_links"]        = floor($choice);
        $pagination['next_link']        = 'Selanjutnya';
        $pagination['prev_link']        = 'Sebelumnya';
        $pagination['full_tag_open']    = '<nav><ul class="pagination page-pagging justify-content-center">';
        $pagination['full_tag_close']   = '</ul></nav>';
        $pagination['cur_tag_open']     = '<li><a class="active">';
        $pagination['cur_tag_close']    = '</a></li>';
 
        $this->pagination->initialize($pagination);
        $data['page']                   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['list_inventaris']        = $this->inventaris->get_limit_data($pagination["per_page"], $data['page']);
        $data['halaman_data']           = $this->pagination->create_links();
        return $data;
    }
}