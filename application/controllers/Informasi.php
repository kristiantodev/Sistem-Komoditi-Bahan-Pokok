<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends My_Controller {

	function __construct(){
		parent::__construct();		
	}

	public function index()
	{
		$update_harga = $this->db->query("SELECT*FROM update_harga 
        LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi ORDER BY update_harga.tgl_harga DESC, lokasi.nm_lokasi ASC");

         $data=array(
            "update"=>$update_harga->result(),
        );
		 $this->load->view('isi/front/home',$data);
	}

	public function about()
	{
		 $this->load->view('isi/front/about');
	}

	public function kontak()
	{
		 $this->load->view('isi/front/kontak');
	}
	
}
