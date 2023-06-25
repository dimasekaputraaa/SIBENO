<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sensor extends CI_Model
{

    public function getDataSensor($kode_titik = NULL)
    {
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->order_by('id', 'desc');
        $this->db->join('data_titik', 'data_titik.kode_titik = nilai.kode_titik');
        if ($kode_titik) $this->db->where('nilai.kode_titik', $kode_titik);
        $query = $this->db->get();
        return $query->row();
    }

    public function UpdateData($dataUpdate)
    {
        $this->db->update('nilai', $dataUpdate);
    }

    function tambahdata($say)
    {
        $this->db->insert('nilai', $say);
    }

    public function detail_data($kode_titik)
    {

        $query = $this->db->query("SELECT * FROM nilai LEFT JOIN data_titik ON nilai.kode_titik=data_titik.kode_titik WHERE  data_titik.kode_titik = '$kode_titik'")->row();

        return $query;
    }
}
