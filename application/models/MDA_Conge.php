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

    //  update fucntion max
    function updateMax($employeeId,$reste) {
        $date = date('Y-m-d');
        $sql = "UPDATE congeSET dateinsert=%s , resteconge = resteconge + %s WHERE idemploye = %s";
        $sql = sprintf($sql, $this->db->escape($date), $this->db->escape($reste), $this->db->escape($employeeId));
        $this->db->query($sql);
    }

    //  update fucntion minus
    function updateMin($employeeId,$reste) {
        $date = date('Y-m-d');
        $sql = "UPDATE congeSET dateinsert=%s , resteconge = resteconge - %s WHERE idemploye = %s";
        $sql = sprintf($sql, $this->db->escape($date), $this->db->escape($reste), $this->db->escape($employeeId));
        $this->db->query($sql);
    }

    // select conge tout le monde 
    function AllConge($service){
        $this->db->select('*');
        $this->db->from('conge c');
        $this->db->join('employe e', 'e.idemploye = c.idemploye');
        $this->db->where('e.idservice', $service);
        $query = $this->db->get();
        return $query->result();
    }
}

?>