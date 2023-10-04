<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Besoin extends CI_Model
{
    //    enregistrer un besoin(create)
    public function saveNeed($idtache, $volumetache, $volumehoraire){
        $sql = "insert into besoin (idtache, volumetache, volumehoraire) values (%s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idtache),$this->db->escape($volumetache),$this->db->escape($volumehoraire));
        $this->db->query($sql);
    }

//    liste de tous les besoins (read)
    public function allNeeds(){
        $sql="select * from besoin";
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

//    un besoin (read)
    public function oneNeed($id){
        $sql="select * from besoin  where  idbesoin = %s";
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

    //    un besoin selon le tache (read)
    public function oneNeedbyTask($id){
        $sql="select * from besoin  where  idtache = %s";
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

    //    supprimer un besoin (delete)
    public function deleteNeed($id){
        $sql = "delete from besoin where idbesoin =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier un besoin (update)
    public function updateNeed($id,$heure,$jour){
        $sql = "update besoin set heure = %s, jour = %s  where idbesoin =%s";
        $sql = sprintf($sql,$this->db->escape($heure),$this->db->escape($jour),$this->db->escape($id));
        $this->db->query($sql);
    }
}
?>