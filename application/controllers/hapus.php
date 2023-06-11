<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hapus extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function hapus_supplier(){
		// 1. dapatkan id yang di kirim
		$id = $this->uri->segment(3);

		// 2. cek data nya ada atau tidak di table menu
		$this->db->where("id_supplier", $id);
		$cek = $this->db->get("supplier");
		if($cek->num_rows() > 0){ // jika data menu ditemukan.
			// 3. hapus data menu
			$this->db->where('id_supplier', $id);
			$delete = $this->db->delete('supplier');
			if($delete){
				redirect('index.php/menu/supplier');
			}else{
				echo "data supplier gagal di hapus";
			}
		}else{
			echo "data tidak tersedia";
		}
	}

		public function hapus_barang(){
		// 1. dapatkan id yang di kirim
		$id = $this->uri->segment(3);

		// 2. cek data nya ada atau tidak di table menu
		$this->db->where("kode_brg", $id);
		$cek = $this->db->get("barang");
		if($cek->num_rows() > 0){ // jika data menu ditemukan.
			// 3. hapus data menu
			$this->db->where('kode_brg', $id);
			$delete = $this->db->delete('barang');
			if($delete){
				redirect('index.php/menu/index');
			}else{
				echo "data barang gagal di hapus";
			}
		}else{
			echo "data tidak tersedia";
		}
	}

		public function hapus_user(){
		// 1. dapatkan id yang di kirim
		$id = $this->uri->segment(3);

		// 2. cek data nya ada atau tidak di table menu
		$this->db->where("id_user", $id);
		$cek = $this->db->get("users");
		if($cek->num_rows() > 0){ // jika data menu ditemukan.
			// 3. hapus data menu
			$this->db->where('id_user', $id);
			$delete = $this->db->delete('users');
			if($delete){
				redirect('index.php/menu/pengguna');
			}else{
				echo "data user gagal di hapus";
			}
		}else{
			echo "data tidak tersedia";
		}
	}	

	public function hapus_po(){
		// 1. dapatkan id yang di kirim
		$id = $this->uri->segment(3);

		// 2. cek data nya ada atau tidak di table po
		$this->db->where("no_po", $id);
		$cek = $this->db->get("po");
		if($cek->num_rows() > 0){ // jika data menu ditemukan.
			$this->db->where("no_po", $id);
			$this->db->delete('po');

			$cek2 = $this->db->get("po_dt");
			if($cek2->num_rows() > 0){ // jika data menu ditemukan.
				$this->db->where('no_po', $id);
				$this->db->delete('po_dt');
			redirect('index.php/menu/po');
				
			}
		}else{
		echo "data tidak tersedia";
		}
	}	

		public function hapus_jual(){
		// 1. dapatkan id yang di kirim
		$id = $this->uri->segment(3);

		// 2. cek data nya ada atau tidak di table po
		$this->db->where("no_faktur", $id);
		$cek = $this->db->get("jual");
		if($cek->num_rows() > 0){ // jika data menu ditemukan.
			$this->db->where("no_faktur", $id);
			$this->db->delete('jual');

			$cek2 = $this->db->get("jual_dt");
			if($cek2->num_rows() > 0){ // jika data menu ditemukan.
				$this->db->where('no_faktur', $id);
				$this->db->delete('jual_dt');
			redirect('index.php/menu/jual');
				
			}
		}else{
		echo "data tidak tersedia";
		}
	}	


}
