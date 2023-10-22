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

        public function get_emp()
        {
            $data['emp']= $this->MDA_Employe->getAllEmployees();
            $this->viewer('/get_emp_fiche_paie', $data);

        }

        public function create_formulaire_fichedepaie()
        {
            $idemploye= $this->input->get('idemploye');
            $date= $this->input->get('date');
            $irsa = 0;
            $salaireDebase = 0;
            $salaireNet = 0;
            $data['employe'] = $this->MDA_Employe->getOneEmployee($idemploye);
            $data['contrattrav'] = $this->MDA_ContratTravail->getOneWorkContract($idemploye);
            $data['contratessai'] = $this->MDA_Essai->OneEssai($idemploye);
            
            
            if ($data['contratessai'] != null) 
            {
                $finValue = $data['contratessai'][0]->fin;
                if ($date > $finValue) 
                {
                    $data['contratessai'] = null;
                } else {
                    $salaireDebase = $data['contratessai'][0]->salaire;
                }
            } 
            if ($data['contrattrav'] != null && $data['contratessai'] == null) 
            {
                if($date >= $data['contrattrav'][0]->debut && $date <= $data['contrattrav'][0]->fin) 
                {
                    $salaireDebase = $data['contrattrav'][0]->salaire;
                }
            }
            
            if($salaireDebase <= 350000)
            {
                $salaireNet = $salaireDebase;
                $irsa = 0;
            }
            elseif($salaireDebase>=350001 && $salaireDebase<=400000)
            {
                $salaireNet = $salaireDebase - 2500;
                $irsa = 5;
            }
            elseif ($salaireDebase>=400001 && $salaireDebase<=500000) {
                $salaireNet = $salaireDebase - 10000;
                $irsa = 10;
            }
            elseif ($salaireDebase>=500001 && $salaireDebase<=600000) {
                $salaireNet = $salaireDebase - 15000;
                $irsa = 15;

            }
            elseif ($salaireDebase>=600001) {
                $salaireNet = $salaireDebase - (($salaireDebase*20)/100);
                $irsa = 20;

            }
            $data['salaireDebase'] = $salaireDebase;
            $data['salaireNet'] = $salaireNet;

            if($data['contrattrav']==null)
            {
                $this->MDA_FicheDepaie->createFicheDePaie($idemploye,null,$data['contratessai'][0]->idessaicontrat,$date,$irsa,null);
            }
            elseif ($data['contratessai']==null) {
                $this->MDA_FicheDepaie->createFicheDePaie($idemploye,$data['contrattrav'][0]->id_contrat_travail,null,$date,$irsa,null);

            }

            $this->viewer('/create_fiche_paie', $data);
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