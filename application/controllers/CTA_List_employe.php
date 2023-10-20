<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_List_employe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDA_Employe');
        $this->load->model('MDC_CV');
        $this->load->model('MDA_Tache');
        $this->load->helper('main_helper');
     
    }
    private function viewer($page, $data)
    {
        $v = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('ADMIN/pages/template/basepage', $v);
    }
    public function index(){
        $idservice = $_SESSION['service'];
        $data['emp'] = $this->MDA_Employe->getEmployes($idservice,5);
        $data['posts'] = $this->MDA_Tache->getAllTasksByService($idservice);
        $this->viewer('/listPersonnel',$data);
    }
    public function resultat(){
        $idservice = $_SESSION['service'];
        $genre = $_GET['genre']; // Valeur du genre
        $age = $_GET['age']; // Ordre de tri par âge
        $poste = $_GET['poste']; 
        $data['emp'] = $this->MDA_Employe->filtreEmploye($idservice, $genre, $age, $poste);
        $data['posts'] = $this->MDA_Tache->getAllTasksByService($idservice);
        $this->viewer('/listPersonnel',$data);
    }
}
