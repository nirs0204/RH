<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Annonce extends CI_Model
{
//    liste de tous les annonces (read)
    public function allNews(){
        $sql="SELECT t.nomtache, s.nom AS nomService, TO_CHAR(dateFin, 'DD-MM-YY') AS datefin, (b.volumetache/b.volumehoraire) as personnel,b.idbesoin
        FROM critere c
        JOIN besoin b ON c.idbesoin = b.idbesoin
        JOIN tache t ON b.idtache = t.idtache
        JOIN service s ON t.idservice = s.idservice
        where c.datefin>CURRENT_DATE";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r) {
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }

    //    un client (read)
    function oneNews($id){
        $sql="SELECT * , TO_CHAR(dateFin, 'DD-MM-YY') AS datefin,  CAST((b.volumetache/b.volumehoraire) AS int) as personnel FROM critere c
        JOIN besoin b ON c.idbesoin = b.idbesoin
        JOIN tache t ON b.idtache = t.idtache
        JOIN service s ON t.idservice = s.idservice
        where b.idbesoin = %s";
        $sql = sprintf($sql,$this->db->escape($id));
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result_array() as $r)
        {
            $table['diplome']=$r['diplome'];
            $table['experience']=$r['experience'];
            $table['nationalite']=$r['nationalite'];
            $table['sexe']=$r['sexe'];
            $table['smatri']=$r['smatri'];
            $table['langue1']=$r['langue1'];
            $table['langue2']=$r['langue2'];
            $table['langue3']=$r['langue3'];
            $table['datefin']=$r['datefin'];
            $table['nomtache']=$r['nomtache'];
            $table['nom']=$r['nom'];
            $table['nomtache']=$r['nomtache'];
            $table['datefin']=$r['datefin'];
            $table['personnel']=$r['personnel'];
            $table['idbesoin']=$r['idbesoin'];
            $table['idtache']=$r['idtache'];
            $table['idservice']=$r['idservice'];
            $i++;
        }
        return $table;
    }
    public function  updateS($val, $situation, $page, $situation1, $page2){
        if (empty($val)) {
            $s = $situation;
            $p=$page;
            $value = 'inachevée';
         }else{
             $s = $situation1;
             $p = $page2;
             $value = 'achevée';
         }
         return array('s' => $s, 'p' => $p ,'v'=>$value);
    }
    
    //par service 
    public function New_service($service) {
        $this->db->select('t.nomtache, s.nom AS nomService, TO_CHAR(dateFin, \'DD-MM-YY\') AS datefin, (b.volumetache/b.volumehoraire) as personnel, b.idbesoin');
        $this->db->from('critere c');
        $this->db->join('besoin b', 'c.idbesoin = b.idbesoin');
        $this->db->join('tache t', 'b.idtache = t.idtache');
        $this->db->join('service s', 't.idservice = s.idservice');
        $this->db->where('c.datefin >', 'CURRENT_DATE', false);
        $this->db->where('s.idservice',$service);
        $query = $this->db->get();
        return $query->result();
    }
}
?>