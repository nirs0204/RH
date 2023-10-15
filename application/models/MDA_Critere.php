<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDA_Critere extends CI_Model
{
    //    enregistrer un critere(create)
    public function saveCriteria($idservice, $idbesoin, $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $dateDebutEntretien) {
        $sql = "INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, debutent, datefin) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)";
        date_default_timezone_set('Europe/Moscow');

        // Convertir la date de début en objet DateTime
        $startDate = new DateTime($dateDebutEntretien);
    
        // Calculer la date de fin en ajoutant 15 minutes à la date de début
        $endDate = clone $startDate;
        $endDate->add(new DateInterval('PT15M'));
    
        // Formatage des dates au format MySQL (Y-m-d H:i:s)
        $dateDebutFormatted = $startDate->format('Y-m-d H:i:s');
        $dateFinFormatted = $endDate->format('Y-m-d H:i:s');
    
        $sql = sprintf(
            $sql,
            $this->db->escape($idservice),
            $this->db->escape($idbesoin),
            $this->db->escape($diplome),
            $this->db->escape($experience),
            $this->db->escape($nationalite),
            $this->db->escape($sexe),
            $this->db->escape($smatri),
            $this->db->escape($langue1),
            $this->db->escape($langue2),
            $this->db->escape($langue3),
            $this->db->escape($dateDebutFormatted),
            $this->db->escape($dateFinFormatted)
        );
    
        $this->db->query($sql);
    }

//    liste de tous les criteres (read)
    public function allCriterias(){
        $sql="select * from critere";
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

//    un critere d'un service (read)
    public function oneCriteria($id){
        $sql="select * from critere  where  idservice = %s";
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

    //    supprimer un critere (delete)
    public function deleteCriteria($id){
        $sql = "delete from critere where idservice =%s";
        $sql = sprintf($sql,$this->db->escape($id));
        $this->db->query($sql);
    }

//    modifier un critere (update)
//    public function updateCriteria($idservice, $idbesoin, $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $dateFin, $debutEnt){
//        $sql = "update critere set idbesoin = %s, diplome = %s, experience = %s, nationalite = %s, sexe = %s, Smatri = %s, langue1 = %s, langue2 = %s, langue3 = %s, dateFin = %s, debutEnt = %s   where idservice =%s";
//        $sql = sprintf($sql,$this->db->escape($idbesoin),$this->db->escape($diplome),$this->db->escape($experience),$this->db->escape($nationalite),$this->db->escape($sexe),$this->db->escape($smatri),$this->db->escape($langue1),$this->db->escape($langue2),$this->db->escape($langue3),$this->db->escape($dateFin),$this->db->escape($debutEnt), $this->db->escape($idservice));
//        $this->db->query($sql);
//    }

    // Fonction programmer heure d'entretien
    public function scheduleInterview($idservice, $idbesoin, $diplome, $experience, $nationalite, $sexe, $smatri, $langue1, $langue2, $langue3, $dateFin, $debutEnt) {
        date_default_timezone_set('Europe/Moscow');
    
        // Convert dateFin to a DateTime object
        $startDate = new DateTime($dateFin);
        
        // Create the end time by adding 15 minutes to the start time
        $endDate = clone $startDate;
        $endDate->add(new DateInterval('PT15M'));
    
        // Now, $startDate contains the start time, and $endDate contains the end time
    
        // You can use these values to schedule the interview or store them in a database
        // For example:
        $sql = "INSERT INTO critere (idservice, idbesoin, diplome, experience, nationalite, sexe, Smatri, langue1, langue2, langue3, dateFin, debutEnt) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)";
        $sql = sprintf($sql, $this->db->escape($idservice), $this->db->escape($idbesoin), $this->db->escape($diplome), $this->db->escape($experience), $this->db->escape($nationalite), $this->db->escape($sexe), $this->db->escape($smatri), $this->db->escape($langue1), $this->db->escape($langue2), $this->db->escape($langue3), $this->db->escape($startDate->format('Y-m-d H:i:s')), $this->db->escape($endDate->format('Y-m-d H:i:s')));
    
        // Execute the SQL query to save the interview schedule
        $this->db->query($sql);
    }
    
}
?>