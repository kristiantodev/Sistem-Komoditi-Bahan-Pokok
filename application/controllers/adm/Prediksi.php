<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
        
        if( isset($_POST['id_bahan']) )
        {
            $bahan = $_POST['id_bahan'];
            $lokasi = $_POST['id_lokasi'];
        }else{
            $bahan = 0;
            $lokasi = 0;
        }
        $prediksi= $this->db->query("SELECT*FROM update_harga 
        LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi
        WHERE bahan.deleted=0 AND update_harga.id_bahan='$bahan' AND update_harga.id_lokasi='$lokasi'
         ORDER BY update_harga.tgl_harga ASC, lokasi.nm_lokasi ASC");

         $data=array(
            "prediksiResult"=>$prediksi->result_array(),
         );
		 $this->Mypage('isi/adm/prediksi',$data);
	}
	
}
