<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_CV extends CI_Model
{
//    enregistrer un CV (create)
    function saveCV($idclient, $diplome, $langue, $sexe, $Smatri, $nom, $adresse, $prenom, $dtn, $experience){
        $sql = "insert into client ($idclient, $diplome, $langue, $sexe, $Smatri, $nom, $adresse, $prenom, $dtn, $experience) values ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idclient),$this->db->escape($diplome),$this->db->escape($langue),$this->db->escape($sexe),$this->db->escape($Smatri),$this->db->escape($nom),$this->db->escape($adresse),$this->db->escape($prenom),$this->db->escape($dtn),$this->db->escape($experience));
        $this->db->query($sql);
    }
//    Liste de tous les CV (read)
    function allCV(){
        $sql="select * from cv";
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

//    un CV (read)
    function oneCV($idclient){
        $sql="select * from cv  where  idclient = %s";
        $sql = sprintf($sql,$this->db->escape($idclient));
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

//    supprimer un CV (delete)
    function deleteCV($idclient){
        $sql = "delete from cv where idclient =%s";
        $sql = sprintf($sql,$this->db->escape($idclient));
        $this->db->query($sql);
    }
}
?>