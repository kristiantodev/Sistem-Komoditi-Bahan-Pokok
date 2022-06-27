<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends My_Controller {

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

        $distributor = $this->db->query("SELECT distributor.id_distributor, distributor.id_jenis, distributor.nm_distributor, jenis_distributor.nm_jenis,
        distributor.telpon, distributor.alamat, distributor.keterangan
        FROM distributor LEFT JOIN jenis_distributor ON distributor.id_jenis = jenis_distributor.id_jenis WHERE distributor.deleted=0");
        $jenis = $this->db->query("SELECT*FROM jenis_distributor WHERE deleted=0");

         $data=array(
            "distributorku"=>$distributor->result(),
            "jenisku"=>$jenis->result(),
        );
		 $this->Mypage('isi/adm/distributor',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_distributor', 'nm_distributor', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/distributor');
        }else{
            $data=array(
                "nm_distributor"=>$_POST['nm_distributor'],
                "keterangan"=>$_POST['keterangan'],
                "id_jenis" => $_POST['id_jenis'],
                "telpon" => $_POST['telpon'],
                "alamat" => $_POST['alamat'],
                "deleted" => 0
            );
            $this->db->insert('distributor',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/distributor');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_distributor', 'id_distributor', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/distributor');
        }else{
            $data=array(
                "nm_distributor"=>$_POST['nm_distributor'],
                "keterangan"=>$_POST['keterangan'],
                "id_jenis" => $_POST['id_jenis'],
                "telpon" => $_POST['telpon'],
                "alamat" => $_POST['alamat'],
            );
            $this->db->where('id_distributor', $_POST['id_distributor'] );
            $this->db->update('distributor',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/distributor');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/distributor');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_distributor', $id);
            $this->db->update('distributor',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/distributor');
        }
    }
}
