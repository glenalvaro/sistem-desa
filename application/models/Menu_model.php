<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	
	function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
	}

	function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_sub($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_sub($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function list_icon()
	{
		$list_icon = array();

		$file = FCPATH.'assets/fonts/fontawesome.txt';

		if (file_exists($file))
		{
			$list_icon = file_get_contents($file);
			$list_icon = explode('.', $list_icon);
			$list_icon = array_map(function ($a) { return explode(':', $a)[0]; }, $list_icon);
			return $list_icon;
		}

		return FALSE;
	}

	//panggil dari sub menu utama
	function sub_menu_lock($id = '', $val = 0)
	{
		$sql = "UPDATE user_sub_menu SET is_active = ? WHERE id = ?";
		$hasil = $this->db->query($sql, array($val, $id));
		$this->session->success = ($hasil === TRUE ? 1 : -1);
	}

	//panggil dari sub menu detail menu
	function sub_lockById($id = '', $val = 0)
	{
		$sql = "UPDATE user_sub_menu SET is_active = ? WHERE id = ?";
		$hasil = $this->db->query($sql, array($val, $id));
		$this->session->success = ($hasil === TRUE ? 1 : -1);
	}

	function detail_menu($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function ambilSubModul()
    {
        $query = "SELECT * FROM `user_sub_menu` ORDER BY `id` DESC";
        return $this->db->query($query)->result_array();
    }

    function editSubModulById($id)
    {
    	$title = $this->input->post('title');
        $icon = $this->input->post('icon');

        $data = [
            'title' => $title,
            'icon' => $icon
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }

  // ambil data menu
  function getDataMenu()
  {
    $query = "SELECT * FROM `user_menu` ORDER BY `id` DESC";
    return $this->db->query($query)->result_array();
  }

  function updateMenuById($id)
  {
	$menu = $this->input->post('menu');

	$data = [
		'menu' => $menu
	];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_menu', $data);
  }

}