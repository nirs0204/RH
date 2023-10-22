<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Contrat_Travail extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Employe');
        $this->load->model('MDA_Essai');
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
        $this->viewer('/contrat-travail-form', $data);
    }

    public function employement_contract_submit(){
        $idemploye = $this->input->post('idemploye');
        $debut = $this->input->post('debut');
        $fin = $this->input->post('fin');
        $categorie = $this->input->post('categorie');
        $salaire = $this->input->post('salaire');
        $lieu = $this->input->post('lieut');
        $condition = $this->input->post('ctravail');
        $this->MDA_Employe->updateEmployeeEmbauche($idemploye, 5);
        
        $this->MDA_ContratTravail->saveEmployementContract($idemploye, $debut, $fin, $salaire, $lieu, $condition, $categorie);
        $matricule = "EMP".$idemploye;
        $emp = $this->MDA_Employe->getOneEmployee($idemploye);
        $essai = $this->MDA_Essai->OneEssai($idemploye);

        ob_start(); 
        $this->load->library('Employement');
        $pdf = new Employement();
        $pdf->AddPage();
        $pdf->ajouterEmp($matricule,$emp->nom,$emp->prenom,$emp->dtn,$essai[0]->cin,$categorie,$essai[0]->adresse,$essai[0]->contact,$essai[0]->pere,$essai[0]->mere,$salaire,$condition,$debut,$fin,$lieu, '23 oct 2022');
        $pdfData = $pdf->Output('','S'); 
        ob_end_clean(); 
    
        $pdfData = base64_encode($pdfData); 

        echo '<script>';
        echo 'var win = window.open();';
        echo 'win.document.write(\'<iframe width="100%" height="100%" src="data:application/pdf;base64,' . $pdfData . '"></iframe>\');'; 
        echo 'window.location.href = "' . base_url() . 'CTA_List_employe/";'; 
        echo '</script>';  

    }
}
?>