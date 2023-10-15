<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Etape extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Annonce');
        $this->load->model('MDC_Noteclient');
        $this->load->model('MDC_Cv');
        $this->load->helper('main_helper');
    }
	private function viewer($page, $data){
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('CLIENT/pages/template/basepage', $v);
	}

    public function index(){
        $besoin = $this->session->userdata('besoin');
        $client = $this->session->userdata('client');  
        $data['poste'] =  $this->MDC_Annonce->oneNews($besoin);
        $complete = $this->MDC_Noteclient->toComplete($client[0]['idclient'],$besoin);
        $apply = $this->MDC_Cv->verify($client[0]['idclient'],$besoin);
        $data['complete'] = $this->MDC_Annonce->updateS($complete,'warning','CTC_Question/index', 'success','CTC_Etape/');
        $data['apply'] = $this->MDC_Annonce->updateS($apply,'warning', 'CTC_Cv/index', 'success','CTC_Etape/');   
        $data['client'] = $this->MDC_Annonce->updateS($client,'warning','#', 'success','CTC_Etape/');
        $this->viewer('/etape',$data);
    }
   
}
