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

    public function list_leave_request_view(){
        $this->viewer('/list-demande-conge', array());
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
        $aujourd_hui = new DateTime();
        $aujourd_hui_formatte = $aujourd_hui->format('Y-m-d');
        $data['demandeDisponible'] = array();
        $tab = $this->MDA_DemandeConge->getLeaveRequestBy1();
        foreach ($tab as $item) {
            // Convertir la date de la demande en objet DateTime
            $date_demande = new DateTime($item->datedemande);

            // Ajouter 15 jours à la date actuelle
            $limite_date = clone $aujourd_hui;
            $limite_date = $aujourd_hui->modify('+15 days');

            // Comparer la date de la demande avec la limite
            if ($date_demande >= $limite_date) {
                // Ajouter la demande au tableau
                $data['demandeDisponible'][] = $item;
            }
        }
        $this->viewer('/list-demande-conge', $data);

    }


}
?>