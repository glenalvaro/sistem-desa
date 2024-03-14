<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	function getGrub()
  {
    $query ="SELECT `user`.`id`,`role_id`,`role` FROM `user_role` INNER JOIN `user` ON `user_role`.`id`=`user`.`id`";
     return $this->db->query($query)->result_array();
  }

	function getUser()
	{
		$query ="SELECT `user`.`id`,`role_id`,`role` FROM `user_role` INNER JOIN `user` ON `user_role`.`id`=`user`.`role_id`";
		 return $this->db->query($query)->result_array();
	}

	public function getUserById($id)
  {
      return $this->db->get_where('user', ['id' => $id])->row_array();
  }

	function edit_data($where,$table)
	{
		 return $this->db->get_where($table,$where);
	}

	function detail_user($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_user($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function delete_semua($id){
    $this->db->where_in('id', $id);
    $this->db->delete('data_pemohon');
  }

  function delete_terpilih($id){
    $this->db->where_in('id', $id);
    $this->db->delete('perizinan');
  }

	function user_lock($id = '', $val = 0)
	{
		$sql = "UPDATE user SET is_active = ? WHERE id = ?";
		$hasil = $this->db->query($sql, array($val, $id));
		$this->session->success = ($hasil === TRUE ? 1 : -1);
	}

	function edit_role($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_role($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapus_role($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}


	//functio untuk pengguna admin
   function hapus_Datapegawai($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_Pegawai($where,$table){		
	return $this->db->get_where($table,$where);
	}

	function update_dataPegawai($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function getAnggotaById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

   function updatePasswordById($id)
    {
        $password_baru = $this->input->post('pas_1');
        $password_security = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->set('password', $password_security);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user');
    }

    function editUserById($id)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        // cek jika ada gambar yang di upload
				$upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile/';
            $config['file_name'] = $data['user']['name']; //beri nama pada foto yang diupload

            $this->load->library('upload', $config);

            // upload foto baru
            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                $path = './assets/img/profile/';

                // hapus foto lama selain foto default
                if ($old_image != 'default.png') {
                    unlink(FCPATH . $path . $old_image);
                }
                // ganti foto lama dengan baru
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {

                $data = [
                    'name' => $this->input->post('name', true),
                    'no_hp' => $this->input->post('no_hp', true),
                    'alamat' => $this->input->post('alamat', true),
                    'role_id' => $this->input->post('role_id', true)
                ];

                $this->db->where('id', $this->input->post('id'));
                $this->db->update('user', $data);
            }
        }

       $data = [

              'name' => $this->input->post('name', true),
              'no_hp' => $this->input->post('no_hp', true),
              'alamat' => $this->input->post('alamat', true),
              'role_id' => $this->input->post('role_id', true)
       ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

}