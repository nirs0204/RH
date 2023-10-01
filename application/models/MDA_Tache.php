<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Tache extends CI_Model
{
    //    enregistrer une tache(create)
    public function saveTask($idservice, $nom){
        $sql = "insert into service (idservice, nomTache) values (%s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idservice),$this->db->escape($nom));
        $this->db->query($sql);
    }

//    liste de tous les taches (read)
    public function allTasks(){
        $sql="select * from tache";
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

//    une tache (read)
    public function oneTask($id){
        $sql="select * from tache  where  idtache = %s";
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

    //    supprimer une tache (delete)
    public function deleteTask($id){
        $sql = "delete from tache where idtache =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier une tache (update)
    public function updateTask($id,$nom){
        $sql = "update tache set nomTache = %s  where idtache =%s";
        $sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($id));
        $this->db->query($sql);
    }
}

?>