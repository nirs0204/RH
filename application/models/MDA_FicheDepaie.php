<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class MDA_FicheDepaie extends CI_Model
    {
        function createFicheDePaie($idemploye,$idcontrattrav,$idcontratessai,$datefdp,$taux1,$taux2)
        {
            $sql = "insert INTO fiche_paie (idemploye,id_contrat_travail,idessaicontrat,datefichedp,id_taux1,id_taux2) VALUES (%s, %s, %s, %s, %s, %s)";
            $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($idcontrattrav),$this->db->escape($idcontratessai),$this->db->escape($datefdp),$this->db->escape($taux1),$this->db->escape($taux2));
            $this->db->query($sql);
        }
    }
?>