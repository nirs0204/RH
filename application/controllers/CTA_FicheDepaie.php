<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class CTA_FicheDepaie extends CI_Controller
    {
        public function __construct() {
            parent::__construct();
            $this->load->model('MDA_Employe');
            $this->load->model('MDA_Essai');
            $this->load->model('MDA_FicheDepaie');
            $this->load->model('MDA_ContratTravail');
            if($this->session->userdata('admin') === null) 
            {
                redirect('CTA_Admin/login_view?error=' . urlencode('Vous n`êtes pas connectée!'));
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

        public function create_formulaire_fichedepaie($idemploye)
        {
            $data['employe'] = $this->MDA_Employe->getOneEmployee($idemploye);
            $data['essaicontrat'] = $this->MDA_Essai->getEssaiContrat($idemploye);
            $data['contratrav'] = $this->MDA_ContratTravail->getOneWorkContract($idemploye);
            
        }

        public function store_ficheDePaie()
        {
            $idempl = $this->input->get('idemploye');
            $idcontrattrav = $this->input->get('idcontrav');
            $idessai = $this->input->get('idessai');
            $datefichedepaie = $this->input->get('datefdp');
            $tauxIrsa = $this->input->get('irsa');
            $tauxCnaps = $this->input->get('cnaps');
            $this->MDA_FicheDepaie->createFicheDePaie($idempl,$idcontrattrav,$idessai,$datefichedepaie,$tauxIrsa,$tauxCnaps);
            $this->viewer('/index');
        }

    }
?>