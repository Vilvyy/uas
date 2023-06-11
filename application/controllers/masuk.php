<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function barang_masuk()
	{
		$id = $this->uri->segment(2); // 59182
		
		$this->db->where('id_menu', $id);
		$cek = $this->db->get("keranjang");
		if($cek->num_rows() > 0){
			$this->session->set_flashdata("failed", "data sudah ada sebelumnya");
		}else{
			
			$data['id_menu'] = $id;
			$result = $this->db->insert('keranjang', $data);

			if($result){
				$this->session->set_flashdata("success", "berhasil tambah keranjang");
			}else{
				$this->session->set_flashdata("failed", "gagal tambah keranjang");
			}

		}

		redirect('index.php/menu/index');
	}
}
