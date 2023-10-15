<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Cv extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Cv');
        $this->load->helper('main_helper');
        $this->load->model('MDC_Noteclient');
        $this->load->model('MDC_Annonce');
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
        $data['coef'] = $this->MDC_Cv->allCoefCv($besoin);
        $this->viewer('/cv',$data);
    }
    public function insert(){
        $prenom = $this->input->post('prenom');         $nom = $this->input->post('nom');         $diplome = $this->input->post('diplome');                                 $langue3 = $this->MDC_Cv->fillCoef($this->input->post('langue3'));
        $tel  = $this->input->post('tel');              $dtn = $this->input->post('dtn');         $langue1 = $this->MDC_Cv->fillCoef($this->input->post('langue1'));
        $add = $this->input->post('add');               $exp = $this->input->post('exp');         $langue2 = $this->MDC_Cv->fillCoef($this->input->post('langue2'));
        $sexe = $this->input->post('sexe');             $sm = $this->input->post('sm');
        $idclient = $_SESSION['client'][0]['idclient'];
        $besoin = $this->session->userdata('besoin');
        $this->MDC_Cv->saveCV($idclient, $besoin , $diplome, $langue1, $langue2, $langue3, $sexe, $sm, $nom, $add, $prenom, $dtn, $exp);
        redirect('CTC_Question/index');
    }
    public function cvList(){
        $service = $_SESSION['service'];
        $besoin = $this->session->userdata('besoin');
        $detail = $this->MDC_Annonce->oneNews($besoin);
        $pers =$detail['personnel'];
        $data['news'] =  $this->MDC_Annonce->New_service($service);
        $data['selection'] = $this->MDC_Noteclient->note_trier($besoin,$pers);
        $interviews = $this->MDC_Noteclient->generateInterviewSchedule($data['selection']);
        $data['entretien'] = $interviews;
        $this->viewer('/cv_list',$data);
    }
}
