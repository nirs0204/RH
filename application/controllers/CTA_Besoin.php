<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_Besoin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Besoin');
        $this->load->model('MDA_Tache');
        $this->load->model('MDA_Service');
        $this->load->model('MDA_Questionnaire');
    }
    private function viewer($page, $data)
    {
        $v = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('ADMIN/pages/template/basepage', $v);
    }

    public function need_view(){
        $service = $_SESSION['service'];
        $data['posts'] = $this->MDA_Tache->getAllTasksByService($service);

        $this->viewer('/besoin', $data);
    }

    public function save_need(){
        $idtache = $this->input->post('tache');
        $volumeTache = $this->input->post('volumetache');
        $volumeHoraire = $this->input->post('volumehoraire');

        $this->MDA_Besoin->saveNeed($idtache, $volumeTache, $volumeHoraire);

        redirect('CTA_Critere/criteria_view');
    }

    public function insertQuestion_view(){
        $data['services'] = $this->MDA_Service->allServices();
        $this->load->view('ADMIN/pages/create-quiz',$data);
    }

    public function insertReponse_view(){
        $data['questions'] = $this->MDA_Questionnaire->allQuizs();
        $this->load->view('ADMIN/pages/create-response',$data);
    }
}
?>