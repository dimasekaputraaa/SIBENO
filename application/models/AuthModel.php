<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function is_login()
	{
		$is_login = $this->session->userdata('auth');
		if(!empty($is_login)){
			return true;
		}
		else{
			return false;
		}
	}

	public function do_login(){
		$post = $this->input->post();
		if (!empty($post)){
			$name = @$post['name'];
			$password = @$post['password'];
			$user = $this->db->query('SELECT * FROM users WHERE name = ?', $name)->row_array();
			if(!empty($user)){
				if($user['password']==$password){
					
				}
				else{
					return 'sandi dan user tidak sesuai';
				}
			}
			else{
				return 'Gagal login';
			}
		}
	}
}
