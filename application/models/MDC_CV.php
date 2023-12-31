<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_CV extends CI_Model{

//    enregistrer un CV (create)
    function saveCV($idclient, $idbesoin, $diplome, $langue1, $langue2, $langue3, $sexe, $Smatri, $nom, $adresse, $prenom, $dtn, $experience){
        $sql = "insert into cv (idclient, idbesoin , diplome, langue1, langue2, langue3, sexe, smatri, nom, adresse, prenom, dtn, experience,typee) values ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s , %s, %s, %s,0) ";
        $sql = sprintf($sql,$this->db->escape($idclient),$this->db->escape($idbesoin),$this->db->escape($diplome),$this->db->escape($langue1),$this->db->escape($langue2),$this->db->escape($langue3),$this->db->escape($sexe),$this->db->escape($Smatri),$this->db->escape($nom),$this->db->escape($adresse),$this->db->escape($prenom),$this->db->escape($dtn),$this->db->escape($experience));
        $this->db->query($sql);
        echo $sql; 
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
        $sql="SELECT * 
        FROM cv c 
        JOIN besoin b ON b.idbesoin = c.idbesoin
        JOIN tache t ON t.idtache = b.idtache
        where c.idclient  = %s";
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
//    select coef CV / besoin
    function allCoefCv($id) {
        $this->db->select('*');
        $this->db->from('coefcv c');
        $this->db->join('besoin b', 'c.idtache = b.idtache');
        $this->db->where('b.idbesoin', $id);
        $query = $this->db->get();  
        return $query->result_array();
    }
//    rempli le coef par 0 si vide    
    function fillCoef($variable) {
        if (empty($variable)) {
            return 0;
        } else {
            return $variable;
        }
    }
   
//    verifier CV rempli pour ce poste
    function verify($client, $besoin) {
        $query = $this->db->get_where('cv', array('idclient' => $client, 'idbesoin' => $besoin));
        $cv = $query->result_array();
        return $cv;
    }    

//  UPDATE
     public function updateCv($type,$client,$besoin){
        $sql = "update cv set typee = %s  where idclient =%s and idbesoin = %s";
        $sql = sprintf($sql,$this->db->escape($type),$this->db->escape($client),$this->db->escape($besoin));
        $this->db->query($sql);
    }
//  Notification
    public function alertAge($dtn) {
        date_default_timezone_set('Europe/Paris');
        $dateOfBirth = new DateTime($dtn);
        $today = new DateTime('today');
        $age = $dateOfBirth->diff($today)->y;
        if ($age > 58 || $age < 18) {
            return -1;
        } else {
            return 1;
        }
    }

}
?>