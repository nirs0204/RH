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
        $this->viewer('/conge', array());
    }

    public function leave_request_submit(){
        $idemploye = $_SESSION['admin'];
        $type = $this->input->post('type');
        $nb = $this->input->post('nbjour');
        $datedebut = $this->input->post('datedebut');
        $this->MDA_DemandeConge->saveLeaveRequest($idemploye, $type, $datedebut, $nb);
        redirect('CTA_Conge/');
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
            if ($limite_date >= $date_depart) {
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
        $demande = $this->MDA_DemandeConge->getDemandeConge($idemploye);
        $this->MDA_Conge->updateMin($idemploye,$demande->nbjours);
        redirect('CTA_Conge/list_leave_request');
    }
}
?>