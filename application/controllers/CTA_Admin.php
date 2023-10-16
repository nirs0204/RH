<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Admin');
    }

    public function login_view(){
        $this->load->view('ADMIN/pages/login');
    }

    public function subscribe_view(){
        $this->load->view('ADMIN/pages/create-account');
    }

    public function login() {
        $pseudo = $this->input->post('pseudo');
        $mdp = $this->input->post('mdp');
        $admin = $this->MDA_Admin->verify($pseudo, $mdp);

        if ($admin){
            $idadmin = $this->MDA_Admin->getIdAdmin($pseudo, $mdp);
            $idservice = $this->MDA_Admin->getIdServiceAdmin($idadmin);
            $this->session->set_userdata('service', $idservice);
            $this->session->set_userdata('admin', $idadmin);
            redirect('CTA_Besoin/need_view');
            return;
        }
        else{
            $data['error'] = 'Pseudo ou mot de passe invalide';
        }
        redirect('CTA_Admin/login_view');
    }
}
?>