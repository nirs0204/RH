<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Conge extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Conge');
        $this->load->model('MDA_DemandeConge');
        $this->load->library('calendar');
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
        $data = array();
        if($this->input->get('error') != null  )
        {
            $data['error'] = $this->input->get('error');
        }
        $this->load->view('ADMIN/pages/conge',$data);
    }

    public function leave_request_submit(){
        $idemploye = $_SESSION['admin'];
        $type = $this->input->post('type');
        $nb = $this->input->post('nbjour');
        $datedebut = $this->input->post('datedebut');
        $conge = $this->MDA_Conge->getConge($idemploye);
        $value = $conge->resteconge - $nb;
        if($value >= 0){
            $this->MDA_DemandeConge->saveLeaveRequest($idemploye, $type, $datedebut, $nb);
            redirect('CTA_Conge/');
        } else{
            $data['error'] = 'Reste congé insufisant';
        }
        redirect('CTA_Conge/index?error='. urlencode($data['error']));
    }

//    Listes des demandes de congé
    public function list_leave_request(){
        date_default_timezone_set('Europe/Moscow');
        $data['demandeDisponible'] = array();
        $tab = $this->MDA_DemandeConge->getLeaveRequestBy1();
        foreach ($tab as $item) {
            $date_demande = new DateTime($item->datedemande);
            $date_depart = new DateTime($item->datedebut);
            $limite_date = clone $date_demande;
            $limite_date -> modify('+15 days');
            if ($limite_date <= $date_depart) {
                $data['demandeDisponible'][] = $item;
            }
        }
        $this->viewer('/list-demande-conge', $data);
    }

    public function reject_leave_request(){
        $idemploye = $this->input->get('idemploye');
        $iddemande = $this->input->get('iddemande');
        $this->MDA_DemandeConge->rejectLeaveRequest($idemploye, $iddemande);
        redirect('CTA_Conge/list_leave_request');
    }

    public function approve_leave_request(){
        $idemploye = $this->input->get('idemploye');
        $iddemande = $this->input->get('iddemande');
        $this->MDA_DemandeConge->approveLeaveRequest($idemploye, $iddemande);   
        $demande = $this->MDA_DemandeConge->getDemandeConge($iddemande);
        $conge = $this->MDA_Conge->getConge($idemploye);
        if($demande->type ==='normal'){
            if(empty($conge)){
              $this->MDA_Conge->saveLeave($idemploye,$demande->nbjours);
             }else{
                $this->MDA_Conge->updateMin($idemploye,$demande->nbjours);
             }
        }
        redirect('CTA_Conge/list_leave_request');
    }

    public function encours(){
        $data['encours'] =  $this->MDA_DemandeConge->getCongeencours();
        $this->viewer('/congeActuel', $data);
    }
    public function arrivee(){
        $idemploye = $this->input->get('idemploye');
        $iddemande = $this->input->get('demande');
        $fin =  $this->input->get('fin');
        $conge = $this->MDA_Conge->getConge($idemploye);
        $demande = $this->MDA_DemandeConge->getDemandeConge($iddemande);
        date_default_timezone_set('Indian/Antananarivo'); 
        $date = date('Y-m-d');

        $tf = strtotime($fin);
        $td = strtotime($date);
        $diff= floor(($td - $tf) / (60 * 60 * 24));
        $value=$demande->nbjours - $diff;
        if($value >= 0){
            $this->MDA_Conge->updateMin($idemploye,$demande->nbjours);
            $this->MDA_DemandeConge->updateDemande($idemploye, $iddemande,8);   
            echo  'nb jours  = '.$diff;
            echo $conge
        }else{
            echo  'moins salaire = '.$diff;
        }
       
    }
}
?>