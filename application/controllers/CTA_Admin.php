<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Admin extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function maMethode() {
        // Définir les règles de validation
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // La validation a échoué, afficher le formulaire avec les erreurs
            $this->load->view('mon_formulaire');
        } else {
            // La validation a réussi, traiter les données du formulaire
            $nom = $this->input->post('nom');
            $email = $this->input->post('email');

            // Faire quelque chose avec les données, par exemple, les enregistrer dans la base de données

            // Rediriger ou afficher une page de confirmation
            redirect('confirmation');
        }
    }
}
?>