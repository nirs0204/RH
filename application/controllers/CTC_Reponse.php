<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Reponse extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Reponse');
        $this->load->model('MDA_Questionnaire');

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

    
        // Créez un tableau pour stocker les ID des questions déjà traitées
        $processedQuestions = array();
        
        // Initialisez la variable $coef en dehors de la boucle
        $coef = 0;
    
        for ($j = 0; $j < count($rps); $j++) {
            $tab = $this->MDC_Reponse->correctTrue($rps[$j]);
    
            for ($i = 0; $i < count($tab); $i++) {
                if ($tab[$i]['reponseverif'] == 't') {
                    $a += $tab[$i]['coef'];
                }else  if ($tab[$i]['reponseverif']  == 'f') {
                    $a += 0; 
                }
                $questionID = $tab[$i]['idquestion'];
                array_push($processedQuestions, $questionID);
            }
        }
        $questionCounts = array_count_values($processedQuestions);
        foreach ($questionCounts as $questionID => $count) {
            if ($count > 1) {
                $questM = $this->MDA_Questionnaire->oneQuiz($questionID); 
                for ($i=0; $i < count($questM); $i++) { 
                    echo $questM[$i]->idquestion;
                    $a -= $questM[$i]->coef;
                }
            }
        }
    
        echo 'Reponse =' . $a;
    }
    

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
