  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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
 
    $persediaan = $this->db->query("SELECT bahan.nm_bahan, lokasi.nm_lokasi, MAX(update_harga.harga) as harga FROM update_harga LEFT JOIN bahan ON bahan.id_bahan = update_harga.id_bahan
    LEFT JOIN lokasi ON lokasi.id_lokasi=update_harga.id_lokasi
    WHERE bahan.deleted=0 GROUP BY bahan.nm_bahan");
      
         $data=array(
            "periodeku" => '',
            "grafik" => $persediaan->result(),
         
                  );
		 $this->Mypage('isi/adm/dashboard', $data);
	}

    
	
}
