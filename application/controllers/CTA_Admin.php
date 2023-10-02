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
        // Définir les règles de validation
        $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
        $this->form_validation->set_rules('mdp', 'Mot de passe', 'required');

        if ($this->form_validation->run() == FALSE) {
            // La validation a échoué, afficher le formulaire avec les erreurs
            $this->load->view('ADMIN/pages/login');
        } else {
            // La validation a réussi, traiter les données du formulaire
            $pseudo = $this->input->post('pseudo');
            $mdp = $this->input->post('mdp');

            $user = $this->MDA_Admin->verify($pseudo, $mdp);

            if ($user && password_verify($mdp, $user->mdp)) {
                // Connexion réussie
                // Vous pouvez gérer la session utilisateur ici
                redirect('CTA_Accueil/cv_list'); // Rediriger vers la page de tableau de bord
            } else {
                // Échec de la connexion
                $this->load->view('ADMIN/pages/login');
            }
        }
    }
}
?>