  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jdistributor extends My_Controller {

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

        $jenis = $this->db->query("SELECT*FROM jenis_distributor WHERE deleted=0");

         $data=array(
            "jenisku"=>$jenis->result(),
        );
		 $this->Mypage('isi/adm/jenis',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_jenis', 'nm_jenis', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/jenis');
        }else{
            $data=array(
                "nm_jenis"=>$_POST['nm_jenis'],
                "keterangan"=>$_POST['keterangan'],
                "deleted" => 0
            );
            $this->db->insert('jenis_distributor',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/jdistributor');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_jenis', 'id_jenis', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/jenis');
        }else{
            $data=array(
                "nm_jenis"=>$_POST['nm_jenis'],
                "keterangan"=>$_POST['keterangan']
            );
            $this->db->where('id_jenis', $_POST['id_jenis'] );
            $this->db->update('jenis_distributor',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/jdistributor');
        }
    }



    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/jdistributor');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_jenis', $id);
            $this->db->update('jenis_distributor',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/jdistributor');
        }
    }


	
}
