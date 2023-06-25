<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    protected $datas = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('titikmodel');
        $this->load->model('M_sensor');

        $titik = $this->titikmodel->getDataTitik();
        $this->datas = [
            'datas' => []
        ];
        // foreach ($titik as $data) {
        //     $kebakaran = $this->M_sensor->getDataSensor($data->kode_titik);
        //     if ($kebakaran && $kebakaran->kondisi == 'Kebakaran' ) {
        //         $this->datas['datas'][] = $kebakaran;
        //     }
        // }
    }
}
