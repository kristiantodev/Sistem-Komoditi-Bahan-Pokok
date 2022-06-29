<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan extends My_Controller {

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
        $distributor = $this->db->query("SELECT*FROM distributor WHERE deleted=0");
        $persediaan = $this->db->query("SELECT*FROM persediaan 
        LEFT JOIN bahan ON persediaan.id_bahan=bahan.id_bahan
        LEFT JOIN lokasi ON persediaan.id_lokasi=lokasi.id_lokasi 
        LEFT JOIN distributor ON persediaan.id_distributor=distributor.id_distributor
        WHERE bahan.deleted=0
        ORDER BY persediaan.update_persediaan DESC, lokasi.nm_lokasi ASC, distributor.nm_distributor ASC");

         $data=array(
            "bahanku"=>$bahan->result(),
            "lokasiku"=>$lokasi->result(),
            "distributorku"=>$distributor->result(),
            "persediaan"=>$persediaan->result(),
         );
		 $this->Mypage('isi/adm/persediaan',$data);
	}


	
      public function add()
    {
            $i=1;
            $id_lokasi = $_POST['id_lokasi'];
            $distributor = $_POST['id_distributor'];
            while (isset($_POST['id_bahan'.$i])) {

                 $id_bahan = $_POST['id_bahan'.$i];
                 $persediaan = $_POST['persediaan'.$i];
                 $tgl = $_POST['tgl'.$i];
                 $satuan = $_POST['satuan'.$i];

                 $data=array(
                     "id_bahan"=>$id_bahan,
                     "id_lokasi"=>$id_lokasi,
                     "persediaan"=>$persediaan,
                     "update_persediaan"=>$tgl,
                     "satuan"=>$satuan,
                     "id_distributor"=>$distributor
                 );

                $cekQuery = $this->db->query("SELECT * FROM persediaan WHERE id_bahan = '$id_bahan' AND id_lokasi= '$id_lokasi' AND update_persediaan='$tgl' AND id_distributor='$distributor'")->result_array();
                if(count($cekQuery) <= 0 && $persediaan != 0){
                    $this->db->insert('persediaan',$data);
                }
                 $i++;
            }

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/persediaan');
    
    }

	
}
