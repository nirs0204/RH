<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Critere extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Critere');
        $this->load->model('MDA_Besoin');
        $this->load->model('MDA_Tache');
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

    public function criteria_view(){
        $service = $_SESSION['service'];
        $data['posts'] = $this->MDA_Tache->getAllTasksByService($service);
        $this->viewer('/critere', $data);
    }

    public function save_criteria(){
        $service = $_SESSION['service'];
        $idbesoin = $this->input->post('besoin');
        $diplome = $this->input->post('diplome');
        $experience = $this->input->post('experience');
        $langue1 = $this->input->post('langue1');
        $langue2 = $this->input->post('langue2');
        $langue3 = $this->input->post('langue3');
        $nationalite = $this->input->post('nationalite');
        $sexe = $this->input->post('sexe');
        $smatri = $this->input->post('smatri');
        $datefin = $this->input->post('datefin');
        $debutentretien = $this->input->post('debutentretien');
        $besoin = $this->MDA_Besoin->LastBesoin();
        $this->MDA_Critere->saveCriteria($service, $besoin[0]['idbesoin'], $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $datefin, $debutentretien);
        redirect('CTA_Cv_list/');
    }

    public function schedule_job_interview() {
        // Call the programmeHeureEntretien function from the model
        $result = $this->MDA_Critere->programmeHeureEntretien($id);
        
        // Handle the result as needed
        if ($result === 'Interviews scheduled successfully') {
            // Interviews were scheduled successfully
            // You can show a success message or redirect to another page
        } else {
            // Criteria not found or other error
            // Handle the error case
        }
    }
}
?>