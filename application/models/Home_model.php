<?php

class Home_model extends CI_Model{


  //mendapatkan data akses yang login
  function getlevel()
  {
    $query ="SELECT `role_id`,`role` FROM `user_role` INNER JOIN `user` ON `user_role`.`id`=`user`.`role_id`";
     return $this->db->query($query)->result_array();
  }

  function getPengguna()
  {
     $query ="SELECT u.*, h.role AS akses FROM user u LEFT JOIN user_role h ON u.role_id = h.id";
     return $this->db->query($query)->result_array();
  }

  //query file size database
  function getSizeDB()
  {
    //ambil nama database dari config database.php
    $nama_db = $this->db->database;
    $sql = "SELECT `table_schema` AS 'list_db', SUM(data_length + index_length) / 1024 / 1024, 1 AS 'size_db' FROM `information_schema`.`TABLES` WHERE `table_schema` = '$nama_db' GROUP BY `table_schema`";
    return $this->db->query($sql)->result_array();
  }

  // ambil data user role
  function getDataGroup()
  {
    $query = "SELECT * FROM `user_role` ORDER BY `id` DESC";
    return $this->db->query($query)->result_array();
  }

  function editRoleById($id)
  {
    $role = $this->input->post('role');

    $data = [
      'role' => $role
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_role', $data);
  }

  function jmlKK()
  {
     $query = $this->db->query("SELECT * FROM data_penduduk where hubungan_keluarga_id =1");
     return $query->num_rows();
  }

  function jmlPenduduk()
  {   
    $query = $this->db->get('data_penduduk');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  function jmlKelompok()
  {   
    $query = $this->db->get('data_kelompok');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  function jmlWilayah()
  {   
    $query = $this->db->get('wilayah_desa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  function jmlPengguna()
  {   
    $query = $this->db->get('user');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

  function jmlLayananPenduduk()
  {   
    $query = $this->db->get('layanan_penduduk');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }

}