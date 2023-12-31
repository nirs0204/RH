<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class MDA_Essai extends CI_Model
    {
    //    enregistrer un contrat d'essai (create)
        function saveTrialContract($idemploye,$duree,$salaire, $lieutravail, $eventualite, $debut,$fin, $creation){
            $sql = "insert into essaicontrat (idemploye,duree,salaire, lieutravail, eventualite, debut,fin, creation) values (%s, %s, %s, %s, %s, %s, %s, %s) ";
            $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($duree),$this->db->escape($salaire),$this->db->escape($lieutravail),$this->db->escape($eventualite),$this->db->escape($debut),$this->db->escape($fin),$this->db->escape($creation));
            $this->db->query($sql);
        }

        function getLastContrat() 
        {
            $this->db->select('*');
            $this->db->from('essaicontrat ec');
            $this->db->join('employe e', 'e.idemploye = ec.idemploye');
            $this->db->order_by('idessaicontrat', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->result();
        }

        // obtenir un contrat d'essai spécifique à un employé
        function getEssaiContrat($idemploye)
        {
            $sql = "select * from essaicontrat where idemploye = %s";
            $sql = sprintf($sql,$this->db->escape($idemploye));
            $this->db->query($sql);
        }
        
        public function OneEssai($idemploye) {
            $this->db->select('*');
            $this->db->from('essaicontrat ec');
            $this->db->join('employe e', 'e.idemploye = ec.idemploye');
            $this->db->where('ec.idemploye', $idemploye);
            $query = $this->db->get();
            return $query->result();
        }

        public function OneEssai2($idemploye) {

            $result = $this->db->join('employe', 'employe.idemploye = essaicontrat.idemploye')->get_where('essaicontrat', $idemploye)->row();

            return $result;
        }


    }

?>