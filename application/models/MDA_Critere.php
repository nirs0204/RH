<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Critere extends CI_Model
{
    //    enregistrer un critere(create)
    public function saveCriteria($idservice, $idbesoin, $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $dateFin, $debutEnt){
        $sql = "insert into critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idservice),$this->db->escape($idbesoin),$this->db->escape($diplome),$this->db->escape($experience),$this->db->escape($nationalite),$this->db->escape($sexe),$this->db->escape($smatri),$this->db->escape($langue1),$this->db->escape($langue2),$this->db->escape($langue3),$this->db->escape($dateFin),$this->db->escape($debutEnt));
        $this->db->query($sql);
    }

//    liste de tous les criteres (read)
    public function allCriterias(){
        $sql="select * from critere";
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

//    un critere d'un service (read)
    public function oneCriteria($id){
        $sql="select * from critere  where  idservice = %s";
        $sql = sprintf($sql,$this->db->escape($id));
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

    //    supprimer un critere (delete)
    public function deleteCriteria($id){
        $sql = "delete from critere where idservice =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier un critere (update)
//    public function updateCriteria($idservice, $idbesoin, $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $dateFin, $debutEnt){
//        $sql = "update critere set idbesoin = %s, diplome = %s, experience = %s, nationalite = %s, sexe = %s, Smatri = %s, langue1 = %s, langue2 = %s, langue3 = %s, dateFin = %s, debutEnt = %s   where idservice =%s";
//        $sql = sprintf($sql,$this->db->escape($idbesoin),$this->db->escape($diplome),$this->db->escape($experience),$this->db->escape($nationalite),$this->db->escape($sexe),$this->db->escape($smatri),$this->db->escape($langue1),$this->db->escape($langue2),$this->db->escape($langue3),$this->db->escape($dateFin),$this->db->escape($debutEnt), $this->db->escape($idservice));
//        $this->db->query($sql);
//    }
}
?>