<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "M_user");
    }
	
	function Mypage($content,$data=NULL){

		 $id = $this->session->userdata('id_user');
         $user = $this->M_user;
         $data["myuser"] = $user->getById($id);
		 
		$data['headernya'] = $this->load->view('template/header',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}

   function Mypage2($content,$data=NULL){

		 $id = $this->session->userdata('id_user');
         $user = $this->M_user;
         $data["myuser"] = $user->getById($id);
		 
		$data['headernya'] = $this->load->view('template/header_prodi_kmhs',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}
   

	function PageDekan($content,$data=NULL){

		 $id = $this->session->userdata('id_user');
         $user = $this->M_user;
         $data["myuser"] = $user->getById($id);
		 
		$data['headernya'] = $this->load->view('template/header_dk',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}

	function PageKaprodi($content,$data=NULL){

		 $id = $this->session->userdata('id_user');
         $user = $this->M_user;
         $data["myuser"] = $user->getById($id);
		 
		$data['headernya'] = $this->load->view('template/header_kaprodi',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}

	function PageAlumni($content,$data=NULL){

		$id = $this->session->userdata('id_user');
        $user = $this->M_user;
        $data["myuser"] = $user->getById($id);
        $data["myuser2"] = $user->getById2($id);
		 
		$data['headernya'] = $this->load->view('template/header_al',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}

	function PageStakeholder($content,$data=NULL){

		$id = $this->session->userdata('id_user');
        $user = $this->M_user;
        $data["myuser"] = $user->getById($id);
        $data["myuser2"] = $user->getById3($id);
		 
		$data['headernya'] = $this->load->view('template/header_pl',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js',$data,TRUE);
		$this->load->view('template/index',$data);
	}

	function Mysurvey($content,$data=NULL){
		$id = $this->session->userdata('id_user');
        $user = $this->M_user;
        $data["myuser"] = $user->getById($id);
        $data["myuser2"] = $user->getById3($id);
		 
		$data['headernya'] = $this->load->view('template/header',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer2',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js2',$data,TRUE);
		$this->load->view('template/index2',$data);
	} 

function SurveyAlumni($content,$data=NULL){
		$id = $this->session->userdata('id_user');
        $user = $this->M_user;
        $data["myuser"] = $user->getById($id);
        $data["myuser2"] = $user->getById2($id);
		 
		$data['headernya'] = $this->load->view('template/header_al',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer2',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js2',$data,TRUE);
		$this->load->view('template/index2',$data);
	}

	function SurveyStakeholder($content,$data=NULL){
		$id = $this->session->userdata('id_user');
        $user = $this->M_user;
        $data["myuser"] = $user->getById($id);
        $data["myuser2"] = $user->getById3($id);
		 
		$data['headernya'] = $this->load->view('template/header_pl',$data,TRUE);
		$data['isinya'] = $this->load->view($content,$data,TRUE);
		$data['footernya'] = $this->load->view('template/footer2',$data,TRUE);
		$data['jsnya'] = $this->load->view('template/js2',$data,TRUE);
		$this->load->view('template/index2',$data);
	}

	

}
