<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Reponse extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Reponse');
        $this->load->helper('main_helper');
        if($this->session->userdata('client') === null) 
		{
			redirect(bu('CTC_Client/sign?error=' . urlencode('Vous n`êtes pas connectée en tant que client')));
		}
    }
	private function viewer($page, $data){
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('CLIENT/pages/template/basepage', $v);
	}

    public function index(){
        $rps = $this->input->get('reponse');         
        $a = 0;
        for ($j=0; $j <count($rps) ; $j++) { 
            $tab = $this->MDC_Reponse->correctTrue($rps[$j]);
            for ($i=0; $i <count($tab) ; $i++) { 
               if($tab[$i]['reponseverif'] == 't'){
                    $a += $tab[$i]['coef'];
               }
            }
        }
        echo 'Reponse ='.$a;
    }
  
}
