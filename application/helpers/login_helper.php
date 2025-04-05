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


	//looging user
	function helper_log($tipe = "", $str = "")
	{
    $CI =& get_instance();
 
    if (strtolower($tipe) == "login"){
        $log_tipe   = 0;
    }
    elseif(strtolower($tipe) == "logout")
    {
        $log_tipe   = 1;
    }
    elseif(strtolower($tipe) == "add"){
        $log_tipe   = 2;
    }
    elseif(strtolower($tipe) == "edit"){
        $log_tipe  = 3;
    }
    elseif(strtolower($tipe) == "delete"){
        $log_tipe  = 4;
    }
    else{
        $log_tipe  = 5;
    }

    echo date_default_timezone_set("Asia/Makassar");

    $tgl    = date('d-m-Y H:i:s');
    $users  = $CI->session->userdata('name');
    $emails  = $CI->session->userdata('email');

    $param = $tgl. '-' .$emails. '-' .$users. '-' .$log_tipe. '-' .$str."\r\n";
 
    //load model
    $CI->load->model('User_model');
 
    //save to database
    $CI->User_model->save_log($param);
 
	}



