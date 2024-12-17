<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Perpustakaan";
		$this->load->view('errors/error_404', $data);
	}
}