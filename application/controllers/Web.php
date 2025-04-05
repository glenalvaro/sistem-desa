<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('Artikel_model', 'artikel');
        $this->load->model('Text_berjalan_model', 'info');
        $this->load->model('Umkm_model', 'umkm');
        $this->load->model('Galeri_model', 'galeri');
        $this->load->model('Web_model', 'website');
        $this->load->model('Halaman_statis_model', 'halaman_statis');
        $this->load->model('Statistik_model', 'statistik_pend');
        $this->load->model('Slider_model', 'slider');
        $this->load->model('Perangkat_desa_model', 'sotk');
        $this->load->model('Program_bantuan_model', 'bantuan');
        $this->load->model('Lembaga_masyarakat_model', 'lembaga');
        $this->load->model('Pembangunan_model', 'pembangunan');
        $this->load->model('Agenda_model', 'agenda');
	}

	public function index()
	{
		//ambil data di model
		$data                     = $this->website->config_web();
        $data['artikel']          = $this->artikel->get_artikel();
        $data['info']             = $this->info->get_all();
        $data['umkm_data']        = $this->umkm->get_all_limit();
        $data['galeri_data']      = $this->galeri->get_all();
        $data['data_slide']       = $this->slider->get_all();
        $data['sotk_data']        = $this->sotk->get_all();
        $data['data_agenda']      = $this->agenda->get_all();

		$this->load->view('tema/modern/component/navbar', $data);
		$this->load->view('tema/modern/component/header', $data);
		$this->load->view('tema/modern/layout/beranda');
		$this->load->view('tema/modern/component/footer', $data);
	}

	//ambil foto di database tampilkan di view web
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

    public function detail_album($id, $slug)
    {
    	$data  = $this->website->config_web();
    	$row   = $this->galeri->get_by_id($id);
        $value = array(
            'id' => $row->id,
            'nama_album' => $row->nama_album
        );
        $value['album_id'] = $this->galeri->get_album_id($id);
		$data['title']     = 'Album Galeri';
		$this->load->view('tema/modern/component/navbar', $data);
		$this->load->view('tema/modern/component/content_header', $data);
		$this->load->view('tema/modern/layout/detail_album', $value);
		$this->load->view('tema/modern/component/footer', $data);
    }

    public function detail_artikel($id, $slug)
    {
    	$data  = $this->website->config_web();
    	$row   = $this->artikel->get_by_id($id);
        $value = array(
    		'id' => $row->id,
    		'judul' => $row->judul,
    		'isi' => $row->isi,
    		'user' => $row->user,
    		'gambar' => $row->gambar,
    		'tgl_created' => $row->tgl_created,
    	);
    	$data['title'] = 'Artikel';
		$this->load->view('tema/modern/component/navbar', $data);
		$this->load->view('tema/modern/layout/detail_artikel', $value);
		$this->load->view('tema/modern/component/footer', $data);
    }

    public function detail_ukm($id, $slug)
    {
    	$data  = $this->website->config_web();
    	$row   = $this->umkm->get_by_id($id);
        $value = array(
    		'id' => $row->id,
    		'nik' => $row->nik,
    		'no_tlp' => $row->no_tlp,
            'alamat' => $row->alamat,
            'harga_produk' => $row->harga_produk,
            'satuan_produk' => $row->satuan_produk,
    		'nama_usaha' => $row->nama_usaha,
            'nama_pemilik' => $row->nama_pemilik,
            'nama_kat' => $row->nama_kat,
    		'id_kategori' => $row->id_kategori,
    		'deskripsi' => $row->deskripsi,
    		'latitude' => $row->latitude,
    		'longitude' => $row->longitude,
    		'tgl_posting' => $row->tgl_posting,
    		'gambar' => $row->gambar,
    	);
        $value['foto_ukm']  = $this->umkm->gambar_UmkmById($id);
    	$data['title']      = 'UMKM';
		$this->load->view('tema/modern/component/navbar', $data);
		$this->load->view('tema/modern/layout/detail_ukm', $value);
		$this->load->view('tema/modern/component/footer', $data);
    }

    public function artikel($id, $slug)
    {
        $data   = $this->website->config_web();
        $row    = $this->halaman_statis->get_by_id($id);
        $value  = array(
            'id' => $row->id,
            'judul_artikel' => $row->judul,
            'isi_artikel' => $row->isi,
            'penulis' => $row->user,
            'tgl_posting' => $row->tgl_posting,
        );

        $data['title'] = 'Artikel';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/artikel_statis', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function statistik($id, $slug)
    {
        $data       = $this->website->config_web();
        $data_stat  = $this->statistik_pend->get_data($id);
        $row        = $this->statistik_pend->get_by_id($id);

        $value = [
            'id'                => $row->id,
            'jenis_statistik'   => $row->menu,
            'data_stat'         => $data_stat,
        ];

        $data['title'] = 'Data Statistik';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/statistik', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function data_umkm()
    {
        $data   = $this->website->config_web();
        $value  = $this->website->load_data_umkm();
        $data['title'] = 'Data UMKM';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/layout/data_umkm', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function data_berita()
    {
        $data   = $this->website->config_web();
        $value  = $this->website->load_data_berita();
        $data['title'] = 'Data Berita';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/layout/data_berita', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function struktur_organisasi()
    {
        $data                 = $this->website->config_web();
        $value['data_staff']  = $this->sotk->get_all();
        $data['title'] = 'Struktur Organisasi';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/data_sotk', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function peta()
    {
        $data  = $this->website->config_web();
        $data['title'] = 'Peta Wilayah';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/peta', $data);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function bantuan()
    {
        $data  = $this->website->config_web();
        $data['title'] = 'Program Bantuan';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/bantuan');
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function get_bantuan()
    {
        $nik_pend     = $_POST['nik_pend'];
        $data_bantuan = $this->bantuan->get_peserta_bantuan($nik_pend);
        $no =1;
        if($data_bantuan) {
        foreach ($data_bantuan as $key){
            echo "
            <tr>
                <td data-title='No'>".$no++."</td>
                <td data-title='Nama'>".set_ucwords($key->nama_peserta)."</td>
                <td data-title='Umur'>".umur($key->tgl_lahir)."</td>
                <td data-title='Penerima Bantuan'>{$key->program_nama}</td>
            </tr>";
        }
        } else {
            echo "
            <tr>
                <td colspan='4'><center>Data Tidak Tersedia</center></td>
            </tr>";
        }
    }

    //jangan lupa tambah slug
    public function lembaga($id, $slug)
    {
        $data  = $this->website->config_web();
        $row   = $this->lembaga->get_by_id($id);
        $value = array(
            'id' => $row->id,
            'nama_lembaga' => $row->nama,
            'isi_lembaga' => $row->isi,
        );
        $data['title'] = 'Lembaga Masayarakat';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/lembaga', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function pembangunan()
    {
        $data   = $this->website->config_web();
        $value  = $this->website->load_data_pembangunan();
        $data['title'] = 'Data Pembangunan';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/layout/pembangunan', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function detail_pembangunan($id, $slug)
    {
        $data   = $this->website->config_web();
        $row    = $this->pembangunan->get_by_id($id);
        $value  = array(
            'id' => $row->id,
            'nama_kegiatan' => $row->nama_kegiatan,
            'volume' => $row->volume,
            'waktu' => $row->waktu,
            'jenis_waktu' => $row->jenis_waktu,
            'sumber_dana' => $row->sumber_dana,
            'tahun_anggaran' => $row->tahun_anggaran,
            'total_anggaran' => $row->total_anggaran,
            'sifat_proyek' => $row->sifat_proyek,
            'pelaksana_kegiatan' => $row->pelaksana_kegiatan,
            'keterangan' => $row->keterangan,
            'manfaat' => $row->manfaat,
            'lokasi_pembangunan' => $row->lokasi_pembangunan,
            'gambar_proyek' => $row->gambar_proyek,
            'latitude' => $row->latitude,
            'longitude' => $row->longitude,
            'status' => $row->status,
        );

        $value['list_dokumentasi'] = $this->pembangunan->getDokumentasi_ID($id);

        $data['title'] = 'Pembangunan';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/layout/detail_pembangunan', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function informasi_publik()
    {
        $data  = $this->website->config_web();
        $value = $this->website->load_data_informasi_publik();
        $data['title'] = 'Informasi Publik';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/informasi_publik', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function wilayah()
    {
        $data  = $this->website->config_web();
        $value = $this->website->load_data_wilayah();
        $data['title'] = 'Wilayah Administratif';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/wilayah', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

    public function data_inventaris()
    {
        $data  = $this->website->config_web();
        $value = $this->website->load_data_inventaris();
        $data['title'] = 'Data Aset';
        $this->load->view('tema/modern/component/navbar', $data);
        $this->load->view('tema/modern/component/content_header', $data);
        $this->load->view('tema/modern/layout/inventaris', $value);
        $this->load->view('tema/modern/component/footer', $data);
    }

}