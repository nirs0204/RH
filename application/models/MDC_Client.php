<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Client extends CI_Model {
//    enregistrer un client (create)
    function saveClient($email, $mdp){
        $sql = "insert into client ($email,$mdp) values ( %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
        $this->db->query($sql);
    }

//    liste de tous les clients (read)
    function allClients(){
        $sql="select * from client";
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

//    un client (read)
    function oneClient($id){
        $sql="select * from client  where  idclient = %s";
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

}
?>