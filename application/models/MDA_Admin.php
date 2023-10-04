<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Admin extends CI_Model
{
//    enregistrer un admin (create)
    function saveAdmin($pseudo, $mdp, $idservice){
        $sql = "insert into admin (pseudo,mdp,idservice) values ( %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($pseudo),$this->db->escape($mdp),$this->db->escape($idservice));
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

    //    le idservice d'un admin (read)
    function getIdServiceAdmin($id){
        $this->db->select('idservice');
        $this->db->from('admin');
        $this->db->where('idadmin', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // S'il y a des résultats, retournez le premier résultat
            return $query->row()->idservice;
        } else {
            // Ajustez le retour en fonction de vos besoins
            return null; // Ou une autre valeur par défaut
        }
    }

    //    le idservice d'un admin (read)
    function getIdAdmin($pseudo, $mdp){
        $this->db->select('idadmin');
        $this->db->from('admin');
        $this->db->where('pseudo', $pseudo);
        $this->db->where('mdp', $mdp);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // S'il y a des résultats, retournez le premier résultat
            return $query->row()->idadmin;
        } else {
            // Ajustez le retour en fonction de vos besoins
            return null; // Ou une autre valeur par défaut
        }
    }

//  login
    public function verify($pseudo, $password) {
        $query = $this->db->get_where('admin', array('pseudo' => $pseudo, 'mdp' => $password));
        $admin = $query->row(0, 'MDA_Admin');
        return $admin;
    }
}

?>