<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

	public function pending()
	{
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));
		if ($cek->num_rows() > 0) {
			$update['stat_po'] = "pending";
			$this->db->where('no_po', $id);
			$this->db->update('po', $update);
		redirect('index.php/menu/po');
		}else{
			echo "Data Tidak ada";
		}
	}

	public function process()
	{
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));
		if ($cek->num_rows() > 0) {
			$update['stat_po'] = "process";
			$this->db->where('no_po', $id);
			$this->db->update('po', $update);
			redirect('index.php/menu/po');
		}else{
			echo "Data Tidak ada";
		}
	}

	public function delivery()
	{
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));
		if ($cek->num_rows() > 0) {
			$update['stat_po'] = "delivery";
			$this->db->where('no_po', $id);
			$this->db->update('po', $update);
			redirect('index.php/menu/po');
		}else{
			echo "Data Tidak ada";
		}
	}

	public function success()
	{
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));
		if ($cek->num_rows() > 0) {
			$update['stat_po'] = "success";
			$this->db->where('no_po', $id);
			$this->db->update('po', $update);
			redirect('index.php/menu/po');
		}else{
			echo "Data Tidak ada";
		}
	}

	public function paid()
	{
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));
		if ($cek->num_rows() > 0) {
			foreach ($cek->result() as $row2){
			if ($row2->stat_po == "paid") {
			redirect('index.php/menu/po');
			}else{
				$update['stat_po'] = "paid";
				$this->db->where('no_po', $id);
				$this->db->update('po', $update);
			
				$po_detail = $this->db->get_where('po_dt', array('no_po' => $id));
				foreach ($po_detail->result() as $row) {
				$tambah['jumlah'] = $row->harga_belis; 
				$tambah['no_po'] = $id;
				$qty_masuk			= $row->qty;
				$kode_barang 	= $row->kode_brg;

			}
				$barang = $this->db->get_where('barang', array('kode_brg' => $kode_barang));
					foreach ($barang->result() as $row2) {
					$stok_barang	 = $row2->stok; 
				}
				$hasil['stok'] = $qty_masuk + $stok_barang;

				$this->db->where('kode_brg', $kode_barang);
				$this->db->update('barang', $hasil);
				$this->db->insert('pembayaran', $tambah);
				redirect('index.php/menu/po');

		}	



		}
	} 
		else{
		redirect('index.php/menu/po');
		}
	}

	public function nota(){
		
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('po', array('no_po' => $id));

		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$cek2 = $this->db->get_where('po_dt', array('no_po' => $id));
			$row2 = $cek2->row();
			$cek3 = $this->db->get_where('barang', array('kode_brg' => $row2->kode_brg));
			$row3 = $cek3->row();
			$cek4 = $this->db->get_where('supplier', array('id_supplier' => $row->id_supplier));
			$row4 = $cek4->row();

			$data['no_po']			= $row->no_po;
			$data['tgl_po'] 		= $row->tgl_po;
			$data['nama_supplier']	= $row4->nama_supplier;
			$data['id_supplier']	= $row4->id_supplier;
			$data['qty']			= $row2->qty;
			$data['harga_belis']	= $row2->harga_belis;
			$data['nama_barang']	= $row3->nama_brg;
			$data['kode_brg']		= $row3->kode_brg;
			$data['stat_po']		= $row->stat_po;
				
		}else{
			echo "data tidak tersedia";
		}
		$this->load->view('menu/lihat_nota_po.php', $data);
	
	}

}
