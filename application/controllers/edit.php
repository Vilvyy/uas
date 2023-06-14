<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function edit_supplier(){
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('supplier', array('id_supplier' => $id));
		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$data['id_supplier']		= $row->id_supplier;
			$data['nama_supplier'] 		= $row->nama_supplier;
			$data['no_telp'] 			= $row->no_telp;
			$data['alamat']				= $row->alamat;

		}else{
			echo "data tidak tersedia";
		}

		$this->load->view('crud/edit/aksi_edit_supplier.php', $data);
	}

		public function aksi_edit_supplier(){
		$id = $this->input->post('id_supplier');

		$update['nama_supplier'] 		= $this->input->post('nama_supplier');
		$update['no_telp'] 				= $this->input->post('no_telp');
		$update['alamat'] 				= $this->input->post('alamat');

		$this->db->where('id_supplier', $id);
		$update = $this->db->update('supplier', $update);
		if ($update) {
			redirect('index.php/menu/supplier');
		}else{
			echo "Gagal Update";
		}
	}

	public function edit_barang(){
			if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('barang', array('kode_brg' => $id));
		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$data['kode_brg']			= $row->kode_brg;
			$data['nama_barang'] 		= $row->nama_brg;
			$data['jenis_barang']	 	= $row->jenis_brg;
			$data['stok_barang']		= $row->stok;
			$data['harga_jual'] 		= $row->hrg_jual;
			$data['harga_beli'] 		= $row->hrg_beli;

		}else{
			echo "data tidak tersedia";
		}
		$this->load->view('crud/edit/aksi_edit_barang.php', $data);
	}

	public function aksi_edit_barang(){
		$id = $this->input->post('kode_brg');

		$update['nama_brg'] = $this->input->post('nama_barang');
		$update['jenis_brg'] = $this->input->post('jenis_barang');
		$update['stok']		 = $this->input->post('stok_barang');
		$update['hrg_jual'] = $this->input->post('harga_jual');
		$update['hrg_beli'] = $this->input->post('harga_beli');

		$this->db->where('kode_brg', $id);
		$update = $this->db->update('barang', $update);
		if ($update) {
			redirect('index.php/menu/index');
		}else{
			echo "Gagal Update";
		}
	}

	public function edit_user(){
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('users', array('id_user' => $id));
		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$data['id_user']		= $row->id_user;
			$data['username'] 		= $row->username;
			$data['password'] 		= $row->password;

		}else{
			echo "data tidak tersedia";
		}
		$this->load->view('crud/edit/aksi_edit_user', $data);
	}

		public function aksi_edit_user(){
		$id = $this->input->post('id_user');

		$update['username'] 		= $this->input->post('username');
		$update['password'] 		= $this->input->post('password');

		$this->db->where('id_user', $id);
		$update = $this->db->update('users', $update);
		if ($update) {
			redirect('index.php/menu/pengguna');
		}else{
			echo "Gagal Update";
		}
	}

}


	
	