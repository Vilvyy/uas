<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index()
	{
		$data['data_barang'] = $this->db->get('barang');
		$this->load->view('menu/index', $data);
	}

	public function supplier(){
		$data['data_supplier'] = $this->db->get('supplier');
		$this->load->view('menu/lihat_supplier', $data);
	}

		public function pengguna(){
		$data['data_user'] = $this->db->get('users');
		$this->load->view('menu/lihat_user.php', $data);
	}

	public function po(){
		
		$this->db->select('po.no_po as po_no,
							po.tgl_po,
							po.stat_po,
							supplier.id_supplier as id_supplier,
							supplier.nama_supplier,');
		$this->db->from('po');
		$this->db->join('supplier', 'supplier.id_supplier = po.id_supplier');

		$data['data_po'] = $this->db->get();
		$this->load->view('menu/lihat_po.php', $data); 
	}

	public function detail_po(){
		
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
			$data['alamat']	= $row4->alamat;
			$data['no_telp']	= $row4->no_telp;
			$data['qty']			= $row2->qty;
			$data['harga_belis']	= $row2->harga_belis;
			$data['nama_barang']	= $row3->nama_brg;
			$data['kode_brg']		= $row3->kode_brg;
			$data['stat_po']		= $row->stat_po;
			$data['harga']			= $row2->harga_belis / $row2->qty;
				
		}else{
			echo "data tidak tersedia";
		}
		$this->load->view('menu/lihat_detail_po.php', $data);
	
	}

	public function jual(){
		$data['data_jual'] = $this->db->get('jual');
		$this->load->view('menu/lihat_jual.php', $data); 
	}

	public function detail_jual(){
		
		$id = $this->uri->segment(3);
		$cek = $this->db->get_where('jual', array('no_faktur' => $id));

		if ($cek->num_rows() > 0) {
			$row = $cek->row();
			$cek2 = $this->db->get_where('jual_dt', array('no_faktur' => $id));
			$row2 = $cek2->row();
			$cek3 = $this->db->get_where('barang', array('kode_brg' => $row2->kode_brg));
			$row3 = $cek3->row();

			$qty = $row2->qty;
			$harga_jual = $row3->hrg_jual;
			$sub_total = $qty * $harga_jual;

			$data['no_faktur']		= $row->no_faktur;
			$data['tgl_faktur'] 	= $row->tgl_faktur;
			$data['nama_barang']	= $row3->nama_brg;
			$data['harga_jual']		= $row3->hrg_jual;
			$data['qty']			= $row2->qty;
			$data['sub_total']		= $sub_total;
			$data['total']			= $sub_total;
				
		}else{
			echo "data tidak tersedia";
		}
		$this->load->view('menu/lihat_detail_jual.php', $data);
	
	}

}
