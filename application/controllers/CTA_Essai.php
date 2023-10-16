<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Essai extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDC_CV');
        $this->load->model('MDA_Employe');
        $this->load->model('MDA_Essai');
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
        $idclient = $this->input->get('idclient');
        $data['cv'] = $this->MDC_CV->oneCV($idclient);
        $besoin = $_GET['idbesoin'];
        $type =5;
        $this->MDC_CV->updateCv($type,$idclient,$besoin);
        $this->viewer('/contrat-essai-form', $data);
    }

    public function trial_contract_submit  (){
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $dtn = $this->input->post('dtn');
        $lieun = $this->input->post('lieun');
        $smatri = $this->input->post('smatri');
        $adresse = $this->input->post('adresse');
        $cin = $this->input->post('cin');
        $tel = $this->input->post('contact');
        $pere = $this->input->post('pere');
        $mere = $this->input->post('mere');
        $debutessai = $this->input->post('debutessai');
        $finessai = $this->input->post('finessai');
        $creationessai = $this->input->post('creationessai');
        $lieutravail = $this->input->post('lieutravail');
        $cnaps = $this->input->post('cnaps');
        $duree = $this->input->post('duree');

        $salaire = $this->input->post('salaire');
        $eventualite = $this->input->post('eventualite');
        $service =$_SESSION['service'];

        $idemp = $this->MDA_Employe->saveEmployee($nom, $prenom, $dtn, $cin, $pere, $mere, $adresse, $tel, 0, $cnaps,$service);
        $this->MDA_Essai->saveTrialContract($idemp, $duree, $salaire, $lieutravail, $eventualite, $debutessai, $finessai, $creationessai);

        ob_start(); 
        $this->load->library('Essai');
        $pdf = new Essai();
        $pdf->AddPage();
        $pdf->ajouterEmp($idemp, $nom, $prenom, $dtn, $lieun, $smatri, $adresse, $tel, $pere, $mere, $salaire, $debutessai, $finessai, $lieutravail, $creationessai); 
        $pdfData = $pdf->Output('','S'); 
        ob_end_clean(); 
    
        $pdfData = base64_encode($pdfData); 

        echo '<script>';
        echo 'var win = window.open();';
        echo 'win.document.write(\'<iframe width="100%" height="100%" src="data:application/pdf;base64,' . $pdfData . '"></iframe>\');'; 
        echo 'window.location.href = "' . base_url() . 'CTA_Cv_list/";'; 
        echo '</script>';   
    }


}
?>