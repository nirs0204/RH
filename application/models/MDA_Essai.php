<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Essai extends CI_Model
{
//    enregistrer un contrat d'essai (create)
    function saveTrialContract($idemploye,$duree,$salaire, $lieutravail, $eventualite, $debut,$fin, $creation){
        $sql = "insert into essaicontrat (idemploye,duree,salaire, lieutravail, eventualite, debut,fin, creation) values (%s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($duree),$this->db->escape($salaire),$this->db->escape($lieutravail),$this->db->escape($eventualite),$this->db->escape($debut),$this->db->escape($fin),$this->db->escape($creation));
        $this->db->query($sql);
    }
}
?>