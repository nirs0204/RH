<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class MDA_FicheDepaie extends CI_Model
    {
        function createFicheDePaie($idemploye,$idcontrattrav,$idcontratessai,$datefdp,$irsa,$cnaps)
        {
            $sql = "insert INTO fiche_paie (idemploye,id_contrat_travail,idessaicontrat,datefichedp,id_irsa,id_cnaps) VALUES (%s, %s, %s, %s, %s, %s)";
            $sql = sprintf($sql,$this->db->escape($idemploye),$this->db->escape($idcontrattrav),$this->db->escape($idcontratessai),$this->db->escape($datefdp),$this->db->escape($irsa),$this->db->escape($cnaps));
            $this->db->query($sql);
        }
    }
?>