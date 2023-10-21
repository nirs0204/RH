<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Conge extends CI_Model
{
    //    enregistrer un congé (create)
    public function saveLeave($idemploye, $reste){
        $sql = "insert into conge (idemploye, resteconge) values (%s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($reste));
        $this->db->query($sql);
    }

    //    mettre à jour reste conge (update)
    public function updateLeaveRemained($id, $reste){
        $sql = "update conge set resteconge = %s  where idemploye = %s";
        $sql = sprintf($sql,$this->db->escape($reste),$this->db->escape($id));
        $this->db->query($sql);
    }
}

?>