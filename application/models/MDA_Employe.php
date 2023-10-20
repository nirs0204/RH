<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Employe extends CI_Model
{
//    enregistrer un employe (create)
    function saveEmployee($genre,$tache ,$enfant,$manager,$nom,$prenom,$dtn, $cin, $pere, $mere,$adresse, $contact, $embauche, $cnaps,$service){
        $sql = "insert into employe (genre, idtache , enfant, idmanager,nom,prenom,dtn, cin, pere, mere,adresse,contact, embauche, cnaps,idservice) values ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($genre),$this->db->escape($tache),$this->db->escape($enfant),$this->db->escape($manager),$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($dtn),$this->db->escape($cin),$this->db->escape($pere),$this->db->escape($mere),$this->db->escape($adresse),$this->db->escape($contact),$this->db->escape($embauche),$this->db->escape($cnaps),$this->db->escape($service));
        echo $sql;
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

    function getOneEmployee($employeeId) {
        $sql = "SELECT * FROM employe WHERE id = %s";
        $sql = sprintf($sql, $this->db->escape($employeeId));

        $req = $this->db->query($sql);

        // Vérifier s'il y a des résultats
        if ($req->num_rows() > 0) {
            return $req->row();  // Retourne la première ligne de résultat
        } else {
            return null;  // Aucun employé trouvé
        }
    }

//    mise a jour de embauche (update)
    function updateEmployeeEmbauche($employeeId, $type) {
        $sql = "UPDATE employe SET embauche = %s WHERE id = %s";
        $sql = sprintf($sql, $this->db->escape($type), $this->db->escape($employeeId));
        $this->db->query($sql);
    }
//  
    public function getEmployes($idservice) {
        $this->db->select('*');
        $this->db->from('employe e');
        $this->db->join('tache t', 'e.idtache = t.idtache');
        $this->db->where('e.idservice', $idservice);
        $query = $this->db->get();
        return $query->result(); 
    }
}
?>