<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Cv extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Client');
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
        echo $besoin;
        //$this->viewer('/cv',array());
    }
    public function insert(){
        echo $this->input->post('prenom')."/";
        echo $this->input->post('tel')."/";
        echo $this->input->post('add')."/";
        echo $this->input->post('nom')."/";
        echo $this->input->post('dtn')."/";
        echo $this->input->post('exp')."/";
        echo $this->input->post('diplome')."/";
        echo $this->input->post('langue1')."/";
        echo $this->input->post('langue2')."/";
        echo $this->input->post('langue3')."/";
        echo $this->input->post('sexe')."/";
        echo $this->input->post('sm')."/";

        echo 'Succes';
    }
}
