<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Employe extends CI_Model
{
//    enregistrer un employe (create)
    function saveEmployee($genre,$tache ,$enfant,$manager,$nom,$prenom,$dtn, $cin, $pere, $mere,$adresse, $contact, $embauche, $cnaps,$service){
        $sql = "insert into employe (genre, idtache , enfant, idmanager,nom,prenom,dtn, cin, pere, mere,adresse,contact, embauche, cnaps,idservice) values ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($genre),$this->db->escape($tache),$this->db->escape($enfant),$this->db->escape($manager),$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($dtn),$this->db->escape($cin),$this->db->escape($pere),$this->db->escape($mere),$this->db->escape($adresse),$this->db->escape($contact),$this->db->escape($embauche),$this->db->escape($cnaps),$this->db->escape($service));
        $this->db->query($sql);

        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    //    liste de tous les employes (read)
    function getAllEmployees(){
        $sql="select * from employe";
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

    public function getOneEmployee($employeeId) {
        $this->db->where('idemploye', $employeeId);
        $query = $this->db->get('employe');
        return $query->row(); 
    }
    

//    mise a jour de embauche (update)
    function updateEmployeeEmbauche($employeeId,$type) {
        date_default_timezone_set('Indian/Antananarivo'); 
        $date = date('Y-m-d');
        $sql = "UPDATE employe SET embauche = %s , dateEmbauche=%s  WHERE idemploye = %s";
        $sql = sprintf($sql, $this->db->escape($type), $this->db->escape($date), $this->db->escape($employeeId));
        $this->db->query($sql);
    }
//  maka employe d'une service
    public function getEmployes($idservice,$val) {
        $this->db->select("*, EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM e.dtn::date) AS age");
        $this->db->from('employe e');
        $this->db->join('tache t', 'e.idtache = t.idtache');
        $this->db->where('e.idservice', $idservice);
        $this->db->where('e.embauche', $val);
        $query = $this->db->get();
        return $query->result(); 
    }


//  filtre liste d'employe
    public function filtreEmploye($idservice, $genre, $age, $poste) {
        $this->db->select("*, EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM e.dtn) AS age");
        $this->db->from('employe e');
        $this->db->join('tache t', 'e.idtache = t.idtache');
        $this->db->where('e.idservice', $idservice);
        $this->db->where('e.embauche', 5);

        if ($poste != null) {
            $this->db->where('e.idtache', $poste);
        }

        if ($genre != null) {
            $this->db->where('e.genre', $genre);
        }

        if ($age != null) {
            $this->db->order_by('age', $age);
        }
        $query = $this->db->get();
        return $query->result();
    }

    //GET superieur 
    public function getSuperieurs($emp) {
        $query = "
        WITH RECURSIVE superior_hierarchy AS (
            SELECT e1.idemploye, e1.nom, e1.idmanager, e1.idtache, t.nomTache as nomtache, e1.prenom as prenom_manager
            FROM employe e1
            LEFT JOIN tache t ON e1.idtache = t.idtache
            WHERE e1.idemploye = $emp
            UNION
            SELECT e2.idemploye, e2.nom, e2.idmanager, e2.idtache, t.nomTache as nomtache, e2.prenom as prenom_manager
            FROM employe e2
            JOIN superior_hierarchy sh ON e2.idemploye = sh.idmanager
            LEFT JOIN tache t ON e2.idtache = t.idtache
        )
        SELECT * FROM superior_hierarchy";
        
        $result = $this->db->query($query);
        return $result->result();
    }

    //GET subordonnee
    public function getSubordonnees($idmanager) {
        $this->db->select('*');
        $this->db->from('employe e');
        $this->db->join('tache t', 'e.idtache = t.idtache');
        $this->db->where('e.idmanager', $idmanager);
        $query = $this->db->get();
        return $query->result();
    }
    //liste employe plus d'un an 
    public function getEmployesPlusUnAn() {
        $this->db->select('employe.*');
        $this->db->from('employe');
        $this->db->join('tache t', 'employe.idtache = t.idtache');
        $this->db->where('dateEmbauche <= CURRENT_DATE - INTERVAL "1 year"');
        
        $query = $this->db->get();
        return $query->result();
    }    
    
}
?>