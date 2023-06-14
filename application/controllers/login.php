<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function menu_login(){
		$this->load->view('login.php');
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect('index.php/login/menu_login');
	}

	public function do_login(){

		$cek['username'] = $this->input->post('form_username');
		$cek['password'] = $this->input->post('form_password');

		$cek_db = $this->db->get_where('users', $cek);

		if ($cek_db->num_rows() > 0) {
			$row = $cek_db->row();
			$level_akun = $row->level;

			$sess_login = array(
		    	'id'  		=> $row->id_user,
		    	'username'  => $row->username,
		    	'level'		=> $row->level
		    );

		    $this->session->set_userdata($sess_login);
			$this->session->set_flashdata("success", "Berhasil Login");

			
			if ($level_akun == 'user') {
				redirect('index.php/menu/menu_index');
			}elseif ($level_akun == 'admin') {
				redirect('index.php/menu/index');
			}else{
				redirect('index.php/login/menu_login');

			}
		}else{
			redirect('index.php/login/menu_login');
		}
	}
}