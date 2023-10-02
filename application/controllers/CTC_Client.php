<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Client');
        $this->load->helper('main_helper');
    }
	private function viewer($page, $data){
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('CLIENT/pages/template/basepage', $v);
	}

    public function index(){
        $data = array();
        if($this->input->get('error') != null  )
        {
            $data['error'] = $this->input->get('error');
        }
        if($this->input->get('success') != null)
        {
            $data['success'] = $this->input->get('success');
        }
        $this->load->view('CLIENT/pages/login', $data);
    }

    public function register(){
        if($this->input->get('error') != null)
        {
            $data['error'] = $this->input->get('error');
        }
        $this->load->view('CLIENT/pages/register');
    }

	public function login(){
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
        $client = $this->MDC_Client->verify($email, $mdp);

        if ($client){
            $this->session->set_userdata('client', $client->idclient);
            redirect(bu('CTC_Accueil/cv'));
            return;
        }
        else{
            $data['error'] = 'Email ou mot de passe invalide';
        }
        redirect(bu('CTC_Client/index?error=' . urlencode($data['error'])));
    }

	public function addClient() {
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
    

        $result = $this->MDC_Client->saveClient($email, $mdp);

        if ($result) {
            $data['success'] = 'Nouveau client ajouté avec succès';
            redirect(bu('CTC_Client/index?success=' . urlencode($data['success'])));
        } else {
            $data['error'] = 'Erreur lors de l\'ajout du nouvel client';
            redirect(bu('CTC_Client/register?error=' . urlencode($data['error'])));
        }
    }
}
