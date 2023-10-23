<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_DemandeConge extends CI_Model
{
    //    enregistrer un demande de congé (create)
    public function saveLeaveRequest($idemploye, $type, $datedebut, $nbjours){
        $sql = "insert into conge_demande (idemploye, type, datedebut, nbjours, decision, datedemande) values (%s, %s, %s, %s, 1, CURRENT_DATE ) ";
        $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($type), $this->db->escape($datedebut), $this->db->escape($nbjours));
        $this->db->query($sql);
    }

    //    valider le demande de conge (update)
    public function approveLeaveRequest($idemploye, $iddemande){
        $sql = "update conge_demande set decision = 2  where idemploye = %s and idcongedemande = %s";
        $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($iddemande));
        $this->db->query($sql);
    }

    //    refuser le demande de conge (update)
    public function rejectLeaveRequest($id, $iddemande){
        $sql = "update conge_demande set decision = 5  where idemploye = %s and idcongedemande = %s";
        $sql = sprintf($sql,$this->db->escape($id),$this->db->escape($iddemande));
        $this->db->query($sql);
    }

    public function getAllLeaveRequest(){
        $this->db->select('*');
        $this->db->from('conge_demande');
        $query = $this->db->get();
        return $query->result();
    }

//    Demande de conge ou decision = 1
    public function getLeaveRequestBy1(){
        $this->db->select('cd.idcongedemande, cd.idemploye, e.pseudo, cd.type, cd.datedebut, cd.nbjours, cd.datedemande');
        $this->db->from('conge_demande cd');
        $this->db->join('admin e', 'cd.idemploye = e.idadmin');
        $this->db->where('cd.decision', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    function getDemandeConge($emp){
        $this->db->where('idcongedemande', $emp);
        $query = $this->db->get('conge_demande'); 
        return $query->row(); 
    }
}
?>
