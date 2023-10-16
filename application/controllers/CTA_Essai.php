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

        $idemp = $this->MDA_Employe->saveEmployee($nom, $prenom, $dtn, $cin, $pere, $mere, $adresse, $tel, 0, $cnaps);
        $this->MDA_Essai->saveTrialContract($idemp, $duree, $salaire, $lieutravail, $eventualite, $debutessai, $finessai, $creationessai);

        redirect('CTA_Essai/');

    }

    public function contrat_essai(){
		$this->load->library('Essai');
		$pdf = new Essai();
		$pdf->AddPage();
		$pdf->ajouterEmp('No002092e8781', 'Nom ', 'Prenom', '10 Juin 2002', 'Madagascar', 'Celibataire', 'Ambalavao', '0348902873', 'mdkncwdir', 'hdbhwgiqwwi', '202000', '02 fev 2023', '05 mmai 2023', 'Antsirabe', '23 oct 2022');
		$pdf->Output();
	}

}
?>