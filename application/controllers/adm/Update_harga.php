<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_harga extends My_Controller {

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

        $bahan = $this->db->query("SELECT*FROM bahan WHERE deleted=0");
        $lokasi = $this->db->query("SELECT*FROM lokasi WHERE deleted=0");
        $update_harga = $this->db->query("SELECT*FROM update_harga 
        LEFT JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi ORDER BY update_harga.tgl_harga DESC, lokasi.nm_lokasi ASC");

         $data=array(
            "bahanku"=>$bahan->result(),
            "lokasiku"=>$lokasi->result(),
            "update"=>$update_harga->result(),
         );
		 $this->Mypage('isi/adm/update_harga',$data);
	}


	
      public function add()
    {
            $i=1;
            while (isset($_POST['id_bahan'.$i])) {

                 $id_bahan = $_POST['id_bahan'.$i];
                 $id_lokasi = $_POST['id_lokasi'.$i];
                 $harga = $_POST['harga'.$i];
                 $tgl = $_POST['tgl'.$i];
                 $satuan = $_POST['satuan'.$i];

                 $data=array(
                     "id_bahan"=>$id_bahan,
                     "id_lokasi"=>$id_lokasi,
                     "harga"=>$harga,
                     "tgl_harga"=>$tgl,
                     "satuan"=>$satuan
                 );
                 $this->db->insert('update_harga',$data);
                 $i++;
            }

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/update_harga');
    
    }

	
}
