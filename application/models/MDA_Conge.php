<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Conge extends CI_Model
{
    //    enregistrer un congé (create)
    public function saveLeave($idemploye, $reste){
        $sql = "insert into conge (idemploye, resteconge,dateinsert) values (%s, %s , current_date) ";
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
        $sql = "UPDATE conge SET dateinsert= current_date , resteconge = resteconge + %s WHERE idemploye = %s";
        $sql = sprintf($sql, $this->db->escape($reste), $this->db->escape($employeeId));
        $this->db->query($sql);
    }

    //  update fucntion minus
    function updateMin($employeeId,$reste) {
        $sql = "UPDATE conge SET dateinsert= current_date, resteconge = resteconge - %s WHERE idemploye = %s";
        $sql = sprintf($sql,$this->db->escape($reste), $this->db->escape($employeeId));
        $this->db->query($sql);
    }

    // conge if exitste
   function getConge($emp){
        $this->db->where('idemploye', $emp);
        $query = $this->db->get('conge'); 
        return $query->row(); 
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