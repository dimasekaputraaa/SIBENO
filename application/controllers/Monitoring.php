<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('titikmodel');
		$this->load->helper('url');
		$this->load->model('M_sensor');
		$this->load->model('M_login');
		$this->M_login->keamanan();
	}

	public function index()
	{
		$queryTitik = $this->titikmodel->getDataTitik();
		$DATA = array('queryAllTitik' => $queryTitik);

		$this->load->view('temp/head');
		$this->load->view('temp/side');
		$this->load->view('temp/topbar', $this->datas);
		$this->load->view('Monitoring/index', $DATA);
		$this->load->view('temp/footer');
	}

	public function tambah()
	{
		$this->load->view('temp/head');
		$this->load->view('temp/side');
		$this->load->view('temp/topbar', $this->datas);
		$this->load->view('Monitoring/tdata');
		$this->load->view('temp/footer');
	}

	public function fungsiTambah()
	{
		$kode_titik = $this->input->post('kode_titik');
		$nama_titik = $this->input->post('nama_titik');
		$link = $this->input->post('link');
		$deskripsi = $this->input->post('deskripsi');
		$data['foto'] = '';
		$foto = $_FILES['foto'];

		$config['upload_path'] = 'assets/foto';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('foto')) {
			echo "upload gagal";
		} else {
			$foto = $this->upload->data('file_name');
			$data['foto'] = $foto;
		}

		$ArrInsert = array(
			'kode_titik' => $kode_titik,
			'nama_titik' => $nama_titik,
			'link' => $link,
			'deskripsi' => $deskripsi,
			'foto' => $foto
		);
		// echo "<pre>";
		// print_r($ArrInsert);
		// echo "</pre>";
		$this->titikmodel->insertDataTitik($ArrInsert);
		redirect(base_url("monitoring"));
	}



	public function ubah($kode_titik)
	{
		$queryTitikDetail = $this->titikmodel->getDataTitikDetail($kode_titik);
		$datadetail = array('queryAllTitikdetail' => $queryTitikDetail);

		// echo "<pre>";
		// print_r($queryTitikDetail);
		// echo "</pre>";


		$this->load->view('temp/head');
		$this->load->view('temp/side');
		$this->load->view('temp/topbar', $this->datas);
		$this->load->view('Monitoring/udata', $datadetail);
		$this->load->view('temp/footer');
	}

	public function fungsiUbah()
	{
		$kode_titik = $this->input->post('kode_titik');
		$nama_titik = $this->input->post('nama_titik');
		$link = $this->input->post('link');
		$deskripsi = $this->input->post('deskripsi');
		$data['foto'] = '';
		$foto = $_FILES['foto'];

		$config['upload_path'] = 'assets/foto';
		$config['allowed_types'] = 'jpg|jpeg|png';

		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('foto')) {
			echo "upload gagal";
		} else {
			$foto = $this->upload->data('file_name');
			$data['foto'] = $foto;
		}


		$ArrUbah = array(

			'nama_titik' => $nama_titik,
			'link' => $link,
			'deskripsi' => $deskripsi,
			'foto' => $foto
		);

		// echo "<pre>";
		// print_r($ArrUbah);
		// echo "</pre>";
		$this->titikmodel->ubahDataTitik($kode_titik, $ArrUbah);
		redirect(base_url("monitoring"));
	}

	public function fungsiHapus($kode_titik)
	{
		$this->titikmodel->hapusDataTitik($kode_titik);
		redirect(base_url("monitoring"));
	}
	public function detail($kode_titik)
	{
		$this->load->model('M_sensor');
		$detail = $this->M_sensor->detail_data($kode_titik);
		$data['kode_titik'] = $kode_titik;
		$data['detail'] = $detail;
		$this->load->view('temp/head', ['kode_titik' => $kode_titik]);
		$this->load->view('temp/side');
		$this->load->view('temp/topbar', $this->datas);
		$this->load->view('Monitoring/detailMonitoring', $data);
		$this->load->view('temp/footer');
	}

	public function cekdebit($kode_titik = NULL)
	{
		$this->load->model('M_sensor');

		$nilaiSensor = $this->M_sensor->getDataSensor($kode_titik);
		// $nilaiSensor = $this->M_sensor->detail_data();
		$data = array('cekdebit' => $nilaiSensor);
		$this->load->view('Monitoring/cekdebit', $data);
	}

	public function cektinggi($kode_titik = NULL)
	{
		$this->load->model('M_sensor');

		$nilaiSensor = $this->M_sensor->getDataSensor($kode_titik);
		// $nilaiSensor = $this->M_sensor->detail_data();
		$data = array('cektinggi' => $nilaiSensor);
		$this->load->view('Monitoring/cektinggi', $data);
	}
	
	public function cekhujan($kode_titik = NULL)
	{
		$this->load->model('M_sensor');

		$nilaiSensor = $this->M_sensor->getDataSensor($kode_titik);
		// $nilaiSensor = $this->M_sensor->detail_data();
		$data = array('cekhujan' => $nilaiSensor);
		$this->load->view('Monitoring/cekhujan', $data);
	}
	public function cekportal($kode_titik = NULL)
	{
		$this->load->model('M_sensor');

		$nilaiSensor = $this->M_sensor->getDataSensor($kode_titik);
		// $nilaiSensor = $this->M_sensor->detail_data();
		$data = array('cekportal' => $nilaiSensor);
		$this->load->view('Monitoring/cekportal', $data);
	}


	//tambah data
	// public function kirim()
	// {
	// 	$kode_titik = $this->uri->segment(3);
	// 	$suhu = $this->uri->segment(4);
	// 	// $co = $this->uri->segment(5);
	// 	// $kondisi = $this->uri->segment(6);

	// 	$say = array(
	// 		'kode_titik' => $kode_titik,
	// 		'suhu' => $suhu,
	// 		// 'co' => $co,
	// 		// 'kondisi' => $kondisi,
	// 	);
	// 	$this->M_sensor->tambahdata($say);
	// }
}
