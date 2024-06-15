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

}