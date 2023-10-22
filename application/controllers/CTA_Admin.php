<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Admin');
    }

    public function login_view(){
        $data = array();
        if($this->input->get('error') != null  )
        {
            $data['error'] = $this->input->get('error');
        }
        $this->load->view('ADMIN/pages/login',$data);
    }

    public function subscribe_view(){
        $this->load->view('ADMIN/pages/create-account');
    }

    public function login() {
        $pseudo = $this->input->post('pseudo');
        $mdp = $this->input->post('mdp');
        $admin = $this->MDA_Admin->verifyAdmin($pseudo, $mdp);
        $employee = $this->MDA_Admin->verifyEmployee($pseudo, $mdp);

        if ($admin){
            $idadmin = $this->MDA_Admin->getIdAdmin($pseudo, $mdp);
            $idservice = $this->MDA_Admin->getIdServiceAdmin($idadmin);
            $this->session->set_userdata('service', $idservice);
            $this->session->set_userdata('admin', $idadmin);
            redirect('CTA_Besoin/need_view');
            return;
        }
        elseif ($employee){
            $idadmin = $this->MDA_Admin->getIdAdmin($pseudo, $mdp);
            $idservice = $this->MDA_Admin->getIdServiceAdmin($idadmin);
            $this->session->set_userdata('service', $idservice);
            $this->session->set_userdata('admin', $idadmin);
            redirect('CTA_Conge/');
            return;
        }
        else{
            $data['error'] = 'Pseudo ou mot de passe invalide';
        }
        redirect('CTA_Admin/login_view?error=' . urlencode($data['error']));
    }
    public function deconnect()	{
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('service');
        redirect('CTA_Admin/login_view');
    }
}
?>