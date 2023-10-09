<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Etape extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Annonce');
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
        $data= array();
        $this->viewer('/cv',$data);
    }
   
}
