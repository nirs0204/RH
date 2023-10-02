<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
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
            $this->session->set_userdata('admin', $admin->idadmin);
            redirect(base_url('CTA_Accueil/cv_list'));
            return;
        }
        else{
            $data['error'] = 'Pseudo ou mot de passe invalide';
        }
        redirect(base_url('CTA_Admin/login_view'));
    }
}
?>