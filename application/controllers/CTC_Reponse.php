<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Reponse extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Reponse');
        $this->load->model('MDC_Noteclient');
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
        $besoin = $this->session->userdata('besoin');      
        $a = 0;
        $processedQuestions = array();
        $coef = 0;    
        $receivedTrueCoeff = array(); // Tableau pour suivre les questions qui ont déjà reçu un coefficient vrai
        
        for ($j = 0; $j < count($rps); $j++) {
            $tab = $this->MDC_Reponse->correctTrue($rps[$j]);
    
            for ($i = 0; $i < count($tab); $i++) {
                $questionID = $tab[$i]['idquestion']; // ID de la question associée à la réponse
    
                // Vérifiez si la question a déjà été traitée
                if (isset($questionResponses[$questionID])) {
                    // La question a déjà été traitée, ajoutez la réponse au tableau
                    $questionResponses[$questionID][] = $tab[$i];
                } else {
                    // La question n'a pas encore été traitée, créez une nouvelle entrée
                    $questionResponses[$questionID] = array($tab[$i]);
                }
    
                echo 'Question = ' . $questionID . '<br>';
                // Affichez les informations de la réponse ici si nécessaire
                echo 'Réponse = ' . $tab[$i]['idreponse'] . '<br>';
                echo 'Réponse Verif = ' . $tab[$i]['reponseverif'] . '<br>';
                echo 'Coef = ' . $tab[$i]['coef'] . '<br>';
    
                // Ajustez la valeur de $a en fonction de la réponse
                if ($tab[$i]['reponseverif'] == 't' && !in_array($questionID, $receivedTrueCoeff)) {
                    echo 'Vrais = ' . $tab[$i]['coef'] . '<br>';
                    $a += $tab[$i]['coef'];
                    $receivedTrueCoeff[] = $questionID; // Marquez la question comme ayant reçu un coefficient vrai
                } else if ($tab[$i]['reponseverif'] == 'f' && count($questionResponses[$questionID]) > 1) {
                    echo 'Faux = ' . $tab[$i]['coef'] . '<br>';
                    // La question a été répondue plus d'une fois, déduisez le coefficient
                    $a -= $tab[$i]['coef'];
                }
            }
        }
        $idclient = $_SESSION['client'][0]['idclient'];
    
        echo '<br>Reponse =' . $a;
        $this->MDC_Noteclient->saveNote( $besoin, $a, $idclient);
        redirect('CTC_Etape/index');
    }
    
    // Creer une reponse
    public function create()
    {
        $data['questions'] = $this->MDA_Questionnaire->allQuizs();
        return $this->load->view('ADMIN/pages/create-response' ,$data);
    }
    
    // Inserer la reponse dans la base
    public function store()
    {
        $idquestion= $this->input->post('idquestion');
        $reponse= $this->input->post('reponse');
        $reponseVerif= $this->input->post('reponseVerif');
        $this->MDC_Reponse->saveQuiz($idquestion, $reponse, $reponseVerif);
        redirect('CTC_Reponse/create');
        
    }

  
}
