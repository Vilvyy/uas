<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	public function tambah_supplier()
	{
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$this->load->view('crud/tambah/tambah_supplier.php');
	}

	public function aksi_tambah_supplier(){
		$tambah['nama_supplier'] = $this->input->post('nama_supplier');
		$tambah['no_telp'] = $this->input->post('telepon_supplier');
		$tambah['alamat'] = $this->input->post('alamat_supplier');

		$insert = $this->db->insert('supplier', $tambah);

		if ($insert) {
			redirect('index.php/menu/supplier');
		}else
		echo "Gagal Menambahkan Supplier";
	}

	public function tambah_barang()
	{
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$this->load->view('crud/tambah/tambah_barang.php');
	}

	public function aksi_tambah_barang(){
		$tambah['nama_brg'] = $this->input->post('nama_barang');
		$tambah['jenis_brg'] = $this->input->post('jenis_barang');
		$tambah['stok'] = $this->input->post('stok_barang');
		$tambah['hrg_jual'] = $this->input->post('harga_jual');
		$tambah['hrg_beli'] = $this->input->post('harga_beli');

		$insert = $this->db->insert('barang', $tambah);

		if ($insert) {
			redirect('index.php/menu/index');
		}else
		echo "Gagal Menambahkan Barang";
	}

	public function tambah_user(){
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$this->load->view('crud/tambah/tambah_user.php');		
	}

	public function aksi_tambah_user(){
		$tambah['username'] = $this->input->post('username');
		$tambah['password'] = $this->input->post('password');

		$insert = $this->db->insert('users', $tambah);

		if ($insert) {
			redirect('index.php/menu/pengguna');
		}else
		echo "Gagal Menambahkan Supplier";
	}	

	public function tambah_po(){
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$this->db->select(' supplier.id_supplier,
							supplier.nama_supplier,');
		$data['data_supplier'] = $this->db->get('supplier');

		$this->db->select('barang.kode_brg,
							barang.nama_brg');
		$data['data_barang'] = $this->db->get('barang');
		$this->load->view('crud/tambah/tambah_po.php', $data); 
	}

	public function aksi_tambah_po(){
		$id_barang = $this->input->post('kode_brg');
		$data_barang = $this->db->get_where('barang', array('kode_brg' => $id_barang));
		foreach ($data_barang->result() as $row) {
			$harga = $row->hrg_beli;
		}

		$tambah = array();
		$tambah['stat_po'] = "pending";
		$tambah['id_supplier'] = $this->input->post('id_supplier');

		$this->db->insert('po',$tambah);
		$no_po = $this->db->insert_id();

		$insert_detail['qty'] = $this->input->post('qty');
		$insert_detail['harga_belis'] = $harga * $this->input->post('qty');
		$insert_detail['no_po'] = $no_po;
		$insert_detail['kode_brg'] = $this->input->post('kode_brg');

		$this->db->insert('po_dt', $insert_detail);
		redirect('index.php/menu/po');
	}

		public function tambah_jual(){
		if(!$this->session->has_userdata('id')) { 
			$this->session->set_flashdata("failed", "anda tidak memiliki akses");
			redirect(base_url());
		}

		$this->db->select('barang.kode_brg,
							barang.nama_brg');
		$data['data_barang'] = $this->db->get('barang');
		$this->load->view('crud/tambah/tambah_jual.php', $data); 
	}

		public function aksi_tambah_jual(){
		$id_barang = $this->input->post('kode_brg');
		$data_barang = $this->db->get_where('barang', array('kode_brg' => $id_barang));
		foreach ($data_barang->result() as $row) {
			$stok	= $row->stok;
			$harga 	= $row->hrg_jual;
		}
		$waktu['tgl_faktur'] = $this->input->post('date');
		$qty = $this->input->post('qty');

		$this->db->insert('jual', $waktu);
		$no_faktur = $this->db->insert_id();

		$tambah = array();
		$tambah['harga_juals'] 	= $harga;
		$tambah['qty'] 			= $this->input->post('qty');
		$tambah['kode_brg'] 	= $this->input->post('kode_brg');
		$tambah['no_faktur']	= $no_faktur;

		$this->db->insert('jual_dt', $tambah);

		$barang_kurang['stok'] = $stok - $qty;
		$this->db->where('kode_brg', $id_barang);
		$this->db->update('barang', $barang_kurang);

		redirect('index.php/menu/jual');
	}
}

