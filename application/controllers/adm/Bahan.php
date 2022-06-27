<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends My_Controller {

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

         $data=array(
            "bahanku"=>$bahan->result(),
        );
		 $this->Mypage('isi/adm/bahan',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_bahan', 'nm_bahan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/bahan');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/bahan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
              if ($this->upload->do_upload('foto')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/bahan');
                  }

              }else{
                $img = 'default.jpg';
              }

            $data=array(
                "nm_bahan"=>$_POST['nm_bahan'],
                "keterangan"=>$_POST['keterangan'],
                "foto" => $img,
                "deleted" => 0
            );
            $this->db->insert('bahan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/bahan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_bahan', 'id_bahan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/bahan');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/bahan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {

                 $img = $this->upload->data('file_name');

                 if($_POST['old_image'] != 'default.jpg'){
                    $path = './assets/images/bahan/'.$_POST['old_image'];
                    chmod($path, 0777);
                    unlink($path);
                 }

                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/bahan');
                  }

              }else{
                $img = $_POST['old_image'];
              }

            $data=array(
                "nm_bahan"=>$_POST['nm_bahan'],
                "keterangan"=>$_POST['keterangan'],
                "foto" => $img
            );
            $this->db->where('id_bahan', $_POST['id_bahan'] );
            $this->db->update('bahan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/bahan');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/bahan');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_bahan', $id);
            $this->db->update('bahan',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/bahan');
        }
    }


	
}
