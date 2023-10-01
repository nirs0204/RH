<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Questionnaire extends CI_Model
{
    //    enregistrer un questionnaire(create)
    public function saveQuiz($idservice, $question, $reponse, $coef){
        $sql = "insert into questionnaire (idservice, question, reponse, coef) values (%s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idservice),$this->db->escape($question),$this->db->escape($reponse),$this->db->escape($coef));
        $this->db->query($sql);
    }

//    liste de tous les questionnaires (read)
    public function allQuizs(){
        $sql="select * from questionnaire";
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

//    un questionnaire (read)
    public function oneQuiz($id){
        $sql="select * from questionnaire  where  idquestion = %s";
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

    //    un questionnaire par service (read)
    public function oneQuizByService($id){
        $sql="select * from questionnaire  where  idservice = %s";
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

    //    supprimer un questionnaire (delete)
    public function deleteQuiz($id){
        $sql = "delete from questionnaire where idquestion =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

    //    supprimer un questionnaire par service (delete)
    public function deleteQuizByService($id){
        $sql = "delete from questionnaire where idservice =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier un questionnaire (update)
//    public function updateService($id,$question, $reponse, $coef){
//        $sql = "update questionnaire set question = %s, reponse = %s, coef = %s  where idservice =%s";
//        $sql = sprintf($sql,$this->db->escape($question),$this->db->escape($reponse),$this->db->escape($coef),$this->db->escape($id));
//        $this->db->query($sql);
//    }
}
?>