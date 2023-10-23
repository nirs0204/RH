<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_ContratTravail extends CI_Model
{
//    enregistrer un contrat de travail (create)
    function saveEmployementContract($idemploye, $debut, $fin, $salaire, $lieutravail, $conditiontravail, $categorie){
        $sql = "insert into contrat_travail (idemploye, debut, fin, salaire, lieutravail, conditiontravail, categorie, creation) values (%s, %s, %s, %s, %s, %s, %s, CURRENT_DATE) ";
        $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($debut),$this->db->escape($fin),$this->db->escape($salaire),$this->db->escape($lieutravail),$this->db->escape($conditiontravail),$this->db->escape($categorie));
        echo $sql;
        $this->db->query($sql);
    }

    // get contral de travail d'un employé
    function getOneWorkContract($idemploye)
    {
        $this->db->select('*');
        $this->db->from('contrat_travail ctt');
        $this->db->join('employe e', 'e.idemploye = ctt.idemploye');
        $this->db->where('ctt.idemploye', $idemploye);
        $query = $this->db->get();
        return $query->result();
    }
}
?>