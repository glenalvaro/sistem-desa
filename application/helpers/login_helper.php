<?php 

	function cek_login()
	{
		$ci = get_instance();
		if(!$ci->session->userdata('email')){
			redirect('auth');
		}
	}

	function check_access($role_id, $menu_id)
	{
		$ci = get_instance();

		$ci->db->where('role_id', $role_id);
		$ci->db->where('menu_id', $menu_id);
		$result = $ci->db->get('user_access_menu');

		if($result->num_rows() > 0) {
			return "checked='checked'";
		}
	}

	function cek_penduduk()
	{
		$ci = get_instance();
		if(!$ci->session->userdata('nik_pend')){
			redirect('/layanan/masuk');
		}
	}


