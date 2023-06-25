<?php

class Auth extends CI_Controller{

	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->model('AuthModel');
	// }

	public function index(){

		//$output = $this->AuthModel->do_login();
		$this->load->view('temp/head');
		$this->load->view('auth/login');
	}

	public function cekLogin(){
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$this->load->model('M_login');
		$this->M_login->ambilLogin($name, $password);

		// echo "<pre>";
		// print_r($name);
		// echo "</pre>";
	}

	public function logout(){
		$this->session->set_userdata('name', FALSE);
		$this->session->sess_destroy();
		redirect('auth');
	}
 
}

