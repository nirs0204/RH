<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Client');
        $this->load->helper('main_helper');
        $this->load->library('session');

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
        $besoin = $this->input->get('besoin');
        $this->session->set_userdata('besoin', $besoin);      
        $this->load->view('CLIENT/pages/login', $data);
    }
    public function sign(){
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
        $val1 = $this->session->userdata('val'); // Utilisez $this->session->userdata() pour accéder à la session
        echo $val1;
    
        if($this->input->get('error') != null)
        {
            $data['error'] = $this->input->get('error');
        }
        $this->load->view('CLIENT/pages/register');
    }
    
	public function login(){
        echo $_SESSION['besoin'];
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
        $client = $this->MDC_Client->verify($email, $mdp);

        if ($client){
            $this->session->set_userdata('client', $client);
            redirect('CTC_Etape');
            return;
        }
        else{
            $data['error'] = 'Email ou mot de passe invalide';
        }
        redirect('CTC_Client/sign?error=' . urlencode($data['error']));
    }

	public function addClient() {
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
    

        $result = $this->MDC_Client->saveClient($email, $mdp);

        if ($result) {
            $data['success'] = 'Nouveau client ajouté avec succès';
            redirect('CTC_Client/sign?success=' . urlencode($data['success']));
        } else {
            $data['error'] = 'Erreur lors de l\'ajout du nouvel client';
            redirect('CTC_Client/register?error=' . urlencode($data['error']));
        }
    }
    public function deconnect()	{
        $this->session->unset_userdata('client');
        $this->session->unset_userdata('besoin');
        redirect('CTC_Annonce');
    }

    public function login_view(){
        $this->load->view('CLIENT/pages/login');
    }
}
