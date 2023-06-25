<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MonitoringSensor extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('titikmodel');
        $this->load->helper('url');
        $this->load->model('M_sensor');
    }

    public function cekdebit($kode_titik = NULL)
    {
        $this->load->model('M_sensor');

        $nilaiSensor = $this->M_sensor->getDataSensor($kode_titik);
        
        $data = array('cekdebit' => $nilaiSensor);
        $this->load->view('Monitoring/cekdebit', $data);
    }


    public function kirim()
    {
        $kode_titik = $this->uri->segment(3);
        $debit = $this->uri->segment(4);
        $tinggi = $this->uri->segment(5);
        $hujan = $this->uri->segment(6);
        $portal = $this->uri->segment(7);

        $say = array(
            'kode_titik' => $kode_titik,
            'debit' => $debit,
            'tinggi' => $tinggi,
            'hujan' => $hujan,
            // 'kondisi' => $kondisi,
            'portal' => $portal,
        );
        $this->M_sensor->tambahdata($say);
    }
}
