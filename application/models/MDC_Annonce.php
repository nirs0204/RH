<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Annonce extends CI_Model
{
//    liste de tous les annonces (read)
    public function allNews(){
        $sql="SELECT t.nomTache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.heure/b.jour) as personnel
        FROM critere c
        JOIN besoin b ON c.idbesoin = b.idbesoin
        JOIN tache t ON b.idtache = t.idtache
        JOIN service s ON t.idservice = s.idservice";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r) {
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }


}
?>