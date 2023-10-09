<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Question extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDA_Questionnaire');
        $this->load->model('MDA_Service');
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
        $besoin = $this->session->userdata('besoin');
        $qr = $this->MDA_Questionnaire->getQuestion($besoin);
        $data['questions'] = $qr;
        $rps = array();
        for($i=0 ; $i<count($qr); $i++ ) {
          $rps = $this->MDA_Questionnaire->eachReponses($qr[$i]['idquestion']);
          $questions_reponses[$qr[$i]['question']] = $rps; 
        }
        $data['reponse'] = $questions_reponses;                  
        $this->viewer('/questionnaire',$data);
    }

    // Creer une question
    public function create()
    {
        $data['services'] = $this->MDA_Service->allServices();
        $this->load->view('ADMIN/pages/create-quiz', $data);
    }

    // Inserer la question dans la base
    public function store()
    {
        $idservice= $this->input->post('idservice');
        $question= $this->input->post('question');
        $coef= $this->input->post('coef');

        $this->MDA_Questionnaire->saveQuiz($idservice, $question, $coef);
        redirect('CTC_Question/index');

    }
  
}
