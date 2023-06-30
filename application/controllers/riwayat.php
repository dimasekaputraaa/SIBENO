<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_login');
		$this->load->model('M_riwayat');
		$this->M_login->keamanan();
		// $this->load->model('AuthModel');
		// $this->load->helper('url');
		// if(!$this->AuthModel->is_login()){
		// 	redirect('auth');
		// }
	}

	public function index(){
		
		$this->load->model('M_riwayat');
		$queryTitik = $this->M_riwayat->getRiwayat();
		$data = array('queryAllTitik' => $queryTitik);

		$this->load->view('temp/head');
		$this->load->view('temp/side');
		$this->load->view('temp/topbar');
		$this->load->view('Monitoring/riwayat', $data);
		$this->load->view('temp/footer');
	}
}