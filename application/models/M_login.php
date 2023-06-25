<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	public function ambilLogin($name, $password){
		$this->db->where('name', $name);
		$this->db->where('password', md5($password));
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$sess = array ('name'=>$row->name,
								'password'=>$row->password
							);
			}
			$this->session->set_userdata($sess);
			redirect('');
			
		}
		else{
			$this->session->set_flashdata('info', 'Maaf Username / Password Anda Salah!');
			redirect('auth');
		}
	}

	public function keamanan(){
		$name = $this->session->userdata('name');
		if(empty($name)){
			$this->session->sess_destroy();
			redirect('auth');
		}
	}
}
