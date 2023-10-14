<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Employe extends CI_Model
{
//    enregistrer un employe (create)
    function saveEmployee($nom,$prenom,$dtn, $cin, $pere, $mere,$adresse, $contact, $embauche, $cnaps){
        $sql = "insert into employe (nom,prenom,dtn, cin, pere, mere,adresse,contact, embauche, cnaps) values ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($dtn),$this->db->escape($cin),$this->db->escape($pere),$this->db->escape($mere),$this->db->escape($adresse),$this->db->escape($contact),$this->db->escape($embauche),$this->db->escape($cnaps));
        $this->db->query($sql);

        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //    liste de tous les employes (read)
    function getAllEmployees(){
        $sql="select * from employe";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r)
        {
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }


}
?>