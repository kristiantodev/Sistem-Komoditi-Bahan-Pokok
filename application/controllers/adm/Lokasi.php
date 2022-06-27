<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends My_Controller {

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

        $lokasi = $this->db->query("SELECT*FROM lokasi WHERE deleted=0");

         $data=array(
            "lokasiku"=>$lokasi->result(),
        );
		 $this->Mypage('isi/adm/lokasi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_lokasi', 'nm_lokasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/lokasi');
        }else{
            $data=array(
                "nm_lokasi"=>$_POST['nm_lokasi'],
                "keterangan"=>$_POST['keterangan'],
                "deleted" => 0
            );
            $this->db->insert('lokasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/lokasi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_lokasi', 'id_lokasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/lokasi');
        }else{
            $data=array(
                "nm_lokasi"=>$_POST['nm_lokasi'],
                "keterangan"=>$_POST['keterangan']
            );
            $this->db->where('id_lokasi', $_POST['id_lokasi'] );
            $this->db->update('lokasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/lokasi');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/lokasi');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_lokasi', $id);
            $this->db->update('lokasi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/lokasi');
        }
    }


	
}
