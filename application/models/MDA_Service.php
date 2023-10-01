<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Service extends CI_Model
{
    //    enregistrer un service(create)
    public function saveService($nom){
        $sql = "insert into service (nom) values (%s) ";
        $sql = sprintf($sql,$this->db->escape($nom));
        $this->db->query($sql);
    }

//    liste de tous les services (read)
    public function allServices(){
        $sql="select * from service";
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

//    un service (read)
    public function oneService($id){
        $sql="select * from service  where  idservice = %s";
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

    //    supprimer un service (delete)
    public function deleteService($id){
        $sql = "delete from cv where idservice =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier un service (update)
    public function updateService($id,$nom){
        $sql = "update service set nom = %s  where idservice =%s";
        $sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($id));
        $this->db->query($sql);
    }
}

?>