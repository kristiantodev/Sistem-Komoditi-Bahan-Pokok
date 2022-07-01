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
    
    $data = $this->db->get('bahan')->result_array();
    $dataTemp = [];
    foreach($data as $dt){
       $idBahan = $dt['id_bahan'];
       $persediaan = $this->db->query("SELECT lokasi.nm_lokasi, bahan.nm_bahan, update_harga.harga as harga 
       FROM update_harga 
       INNER JOIN lokasi ON update_harga.id_lokasi=lokasi.id_lokasi
       INNER JOIN bahan ON update_harga.id_bahan=bahan.id_bahan
       WHERE update_harga.id_bahan='$idBahan' ORDER BY update_harga.harga DESC LIMIT 1")->row_array();
       array_push($dataTemp, $persediaan);
    }
      
         $dataArray=array(
            "periodeku" => '',
            "grafik" => $dataTemp,
                  );
        // var_dump($dataArray);die;
		 $this->Mypage('isi/adm/dashboard', $dataArray);
	}

    
	
}
