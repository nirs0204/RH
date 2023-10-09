<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Noteclient extends CI_Model
{
    //    enregistrer une reponse(create)
    public function saveNote( $idb, $note, $client){
        $sql = "insert into noteclient (idbesoin, noteclient, idclient) values (%s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idb),$this->db->escape($note),$this->db->escape($client));
        $this->db->query($sql);
    }

    
    public function toComplete($id,$idB) {
        $this->db->select("*");
        $this->db->from('noteclient');
        $this->db->where('idclient', $id);
        $this->db->where('idbesoin', $idB);
        echo $this->db->last_query();
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>