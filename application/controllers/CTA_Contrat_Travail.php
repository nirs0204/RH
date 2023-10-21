<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Contrat_Travail extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Employe');
        $this->load->model('MDA_ContratTravail');
        if($this->session->userdata('admin') === null) 
		{
			redirect('CTA_Admin/login_view?error=' . urlencode('Vous n`êtes pas connectée !'));
		}
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
        $idemploye = $this->input->get('employe');
        $data['emp'] = $this->MDA_Employe->getOneEmployee($idemploye);
        $this->MDA_Employe->updateEmployeeEmbauche($idemploye, 5);
        $this->viewer('/contrat-travail-form', $data);
    }

    public function employement_contract_submit(){
        $idemploye = $this->input->post('employe');
        $debut = $this->input->post('debut');
        $fin = $this->input->post('fin');
        $categorie = $this->input->post('categorie');
        $salaire = $this->input->post('salaire');
        $lieu = $this->input->post('lieut');
        $condition = $this->input->post('ctravail');

        $this->MDA_ContratTravail->saveEmployementContract($idemploye, $debut, $fin, $salaire, $lieu, $condition, $categorie);

        $emp = $this->MDA_Employe->getOneEmployee($idemploye);


    }
}
?>