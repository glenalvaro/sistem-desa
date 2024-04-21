<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_kelompok_model extends CI_Model
{
    function getDataKelompok()
    {
        $sql = "SELECT k.*, j.kategori_kelompok AS nama_kategori, p.nama_penduduk as nama_ketua 
        FROM data_kelompok k 
        LEFT JOIN kategori_kelompok j ON k.id_kategori = j.id
        LEFT JOIN data_penduduk p ON k.id_ketua = p.id
        ORDER BY k.id DESC";
        $result = $this->db->query($sql)->result();
		return $result;
    }

    function filter_data($filter)
    {
          $query = "SELECT k.*, j.kategori_kelompok AS nama_kategori, p.nama_penduduk as nama_ketua 
          FROM data_kelompok k 
          LEFT JOIN kategori_kelompok j ON k.id_kategori = j.id
          LEFT JOIN data_penduduk p ON k.id_ketua = p.id
          WHERE kategori_kelompok = '$filter'
          ORDER BY k.id DESC";
		  $result = $this->db->query($query);
		  $count = $result->num_rows();
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

    function getDataKelompokID($id)
    {		
        $this->db
        ->select('k.*, j.kategori_kelompok as nama_kategori, p.nama_penduduk as nama_ketua')
        ->from('data_kelompok k')
        ->join('kategori_kelompok j', 'k.id_kategori = j.id', 'left')
        ->join('data_penduduk p', 'k.id_ketua = p.id', 'left')
        ->where('k.id', $id);
        $query = $this->db->get();
   		return $query->row();
    }

    function getDataID($id_kelompok)
    {		
        $this->db
        ->select('k.*, j.kategori_kelompok as nama_kategori, p.nama_penduduk as nama_ketua')
        ->from('data_kelompok k')
        ->join('kategori_kelompok j', 'k.id_kategori = j.id', 'left')
        ->join('data_penduduk p', 'k.id_ketua = p.id', 'left')
        ->where('k.id', $id_kelompok);
        $query = $this->db->get();
   		return $query->row();
    }

    function edit_data($where,$table)
    {		
        return $this->db->get_where($table,$where);
    }

    function update_form_kategori($where,$data,$table)
    {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function hapus_kategori($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}

    function edit_kelompok($where,$table)
    {		
        return $this->db->get_where($table,$where);
    }

    function update_kelompokID($where,$data,$table)
    {
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function hapus_kelompok($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}

    function get_api_search($cari_penduduk="")
    {
    // Fetch users
      $this->db->select('k.*, j.nama_dusun as wilayah_desa');
      $this->db->join('wilayah_desa j', 'k dusun_id = j.id', 'left');
      $this->db->Where("k.nama_penduduk like '%".$cari_penduduk."%'");
      $this->db->or_where("k.nik like '%".$cari_penduduk."%'");
      $this->db->or_where("j.nama_dusun like '%".$cari_penduduk."%'");
      $fetched_records = $this->db->get('data_penduduk k');
      $result = $fetched_records->result();
      // Initialize Array with fetched data
      $data = array();
      foreach($result as $item){
        //   $data[] = array("id"=>$user['id'], "text"=>$user['nama_penduduk']);
        $data[] = array(
            'id'   => $item->id,
            'text' => 'NIK : ' . $item->nik . ' - ' . strtoupper($item->nama_penduduk) . '-' . strtoupper($item->wilayah_desa),
        );
      }
      return $data;
    }

    function daftar_anggotaID($id)
    {
        $sql = "SELECT k.*, j.nama_penduduk AS anggota_nama, j.nik as nik_anggota, j.tempat_lahir, j.tgl_lahir, j.jenis_kelamin, n.nama as anggota_sex, w.nama_dusun as wilayah_anggota, j.foto as foto_anggota, p.nama_kelompok as kelompok_nama, l.nama as nama_jabatan
        FROM anggota_kelompok k 
        LEFT JOIN data_penduduk j ON k.id_anggota = j.id
        LEFT JOIN tweb_penduduk_sex n ON j.jenis_kelamin = n.id
        LEFT JOIN wilayah_desa w ON j.dusun_id = w.id
        LEFT JOIN data_kelompok p ON k.id_kelompok = p.id
        LEFT JOIN jabatan l ON k.jabatan = l.id
        WHERE k.id_kelompok = $id
        ORDER BY k.jabatan ASC";
        $result = $this->db->query($sql)->result();
		return $result;
    }

    function edit_anggota($where,$table)
    {		
        return $this->db->get_where($table,$where);
    }

    function hapus_anggota($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}

    function update_AnggotaID($where,$data,$table)
    {
        $this->db->where($where);
		$this->db->update($table,$data);
    }
}