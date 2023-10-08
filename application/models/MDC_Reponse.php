<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Reponse extends CI_Model
{
    //    enregistrer une reponse(create)
    public function saveQuiz( $idquestion, $reponse, $reponseV){
        $sql = "insert into reponse (idquestion, reponse, reponseVerif) values (%s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idquestion),$this->db->escape($reponse),$this->db->escape($reponseV));
        $this->db->query($sql);
    }

    //    liste de tous les reponses (read)
    public function allQuizs(){
        $sql="select * from reponse";
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

    //    un reponse(read)
    public function oneReponse($id){
        $sql="select * from reponse where  idreponse = %s";
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

    //    supprimer un reponse(delete)
    public function deleteRepponse($id){
        $sql = "delete from reponse where idquestion =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

    //   Verify Reponse
    public function correctTrue($id) {
        $this->db->select('*');
        $this->db->from('questionnaire q');
        $this->db->join('reponse r', 'q.idquestion = r.idquestion');
        $this->db->where('r.idreponse', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>