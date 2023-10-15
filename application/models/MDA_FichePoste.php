<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_FichePoste extends CI_Model
{
    // Insertion fiche de poste
    public function insertFichePoste($idservice, $idtache, $mission, $responsabilite, $objectif, $competence_requise, $superieur_hierarchique) {
        $sql = "insert into fiche_poste (id_service, id_tache, mission, responsabilite, objectif, competence_requise, superieur_hierarchique) values (%s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idservice),$this->db->escape($idtache),$this->db->escape($mission),$this->db->escape($responsabilite),$this->db->escape($objectif),$this->db->escape($competence_requise),$this->db->escape($superieur_hierarchique));
        $this->db->query($sql);
    }
}
?>