<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_login');
		$this->M_login->keamanan();
	}

	public function index()
	{
		$this->load->view('temp/head');
		$this->load->view('temp/side');
		$this->load->view('temp/topbar', $this->datas);
		$this->load->view('Home/index');
		$this->load->view('temp/footer');
	}
}
