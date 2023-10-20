<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_FichePoste extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDA_Service');
        $this->load->model('MDA_Tache');
        $this->load->model('MDA_FichePoste');
        $this->load->helper('main_helper');
        if($this->session->userdata('admin') === null) 
		{
			redirect(bu('CTA_Admin/sign?error=' . urlencode('Vous n`êtes pas connectée en admin')));
		}
    }
	private function viewer($page, $data){
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('ADMIN/pages/template/basepage', $v);
	}

    public function index(){
        $besoin = $this->session->userdata('besoin');
    }

    // Creer une question
    public function create()
    {
        $data['service']=$this->MDA_Service->allServices();
        $data['tache']=$this->MDA_Tache->allTasks();
        $this->viewer('/create-ficheposte', $data);
    }

    // Inserer la question dans la base
    public function store()
    {
        $idservice= $this->input->post('idservice');
        $idtache= $this->input->post('idtache');
        $mission= $this->input->post('mission');
        $responsabilite= $this->input->post('responsb');
        $objectif= $this->input->post('objecti');
        $compreq= $this->input->post('cpreq');
        $superieur= $this->input->post('suphi');

        $this->MDA_FichePoste->insertFichePoste($idservice, $idtache, $mission, $responsabilite, $objectif, $compreq);
        redirect('CTA_FichePoste/create');
    }

    // Afficher une fiche de poste
    public function displayFicheDePoste($id_service, $id_tache) {
        $descriptionsPoste = $this->MDA_FichePoste->displayFicheDePoste($id_service, $id_tache);
    }

    // Display fiche de poste
    public function displayFichePostView()
    {
        $this->viewer('displayficheposte');
    }
  
}
