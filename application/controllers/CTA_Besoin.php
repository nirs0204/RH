<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_Besoin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Besoin');
        $this->load->model('MDA_Tache');
    }
    private function viewer($page, $data)
    {
        $v = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('ADMIN/pages/template/basepage', $v);
    }

    public function need_view(){
        $service = $_SESSION['service'];
        $data['posts'] = $this->MDA_Tache->getAllTasksByService($service);

        $this->viewer('/besoin', $data);
    }

    public function save_need(){
        $idtache = $this->input->post('tache');
        $volumeTache = $this->input->post('volumetache');
        $volumeHoraire = $this->input->post('volumehoraire');

        $this->MDA_Besoin->saveNeed($idtache, $volumeTache, $volumeHoraire);

        redirect('CTA_Critere/criteria_view');
    }
}
?>