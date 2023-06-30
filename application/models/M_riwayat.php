<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat extends CI_Model {
    function getRiwayat($kode_titik = "")
	{
        // $query = $this->join('data_titik', 'nilai.kode_titik=data_titik.kode_titik')->get_where('nilai', array('kondisi'=>'tidak aman' ));

		// $query = $this->db->get_where('nilai',array('portal'=>'terbuka' ));
		
        
        $where = array('portal'=>'terbuka' );
        $join = array('data_titik', 'nilai.kode_titik=data_titik.kode_titik');
        $query = $this->db->join($join[0], $join[1])->get_where('nilai', $where);
        return $query->result();
	}
}