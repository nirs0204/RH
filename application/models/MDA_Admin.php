<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Admin extends CI_Model
{
//    enregistrer un admin (create)
    function saveAdmin($pseudo, $mdp){
        $sql = "insert into admin (pseudo,mdp) values ( %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($pseudo),$this->db->escape($mdp));
        $this->db->query($sql);

        $insert_id = $this->db->insert_id();
        return $this->oneAdmin($insert_id);
    }

//    liste de tous les admins (read)
    function allAdmins(){
        $sql="select * from admin";
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

//    un admin (read)
    function oneAdmin($id){
        $sql="select * from admin  where  idadmin = %s";
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

//  login
    public function verify($pseudo, $password) {
        $query = $this->db->get_where('admin', array('pseudo' => $pseudo, 'mdp' => $password));
        $admin = $query->row(0, 'MDA_Admin');
        return $admin;
    }
}

?>