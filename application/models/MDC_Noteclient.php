<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MDC_Noteclient extends CI_Model
{
    //    enregistrer une reponse(create)
    public function saveNote( $idb, $note, $client){
        $sql = "insert into noteclient (idbesoin, noteclient, idclient) values (%s, %s, %s) ";
        $sql = sprintf($sql,$this->db->escape($idb),$this->db->escape($note),$this->db->escape($client));
        $this->db->query($sql);
    }

    
    public function toComplete($id,$idB) {
        $this->db->select("*");
        $this->db->from('noteclient');
        $this->db->where('idclient', $id);
        $this->db->where('idbesoin', $idB);
        echo $this->db->last_query();
        $query = $this->db->get();
        return $query->result_array();
    }

    public function note_trier($besoin,$nbr) {
        $this->db->select("*, (c.diplome + c.langue1 + c.langue2 + c.langue3 + c.sexe + c.Smatri) as total_cv_note, n.idNoteClient, n.noteClient, EXTRACT(YEAR FROM CURRENT_DATE) - EXTRACT(YEAR FROM TO_DATE(c.dtn, 'YYYY-MM-DD')) AS age", false);
        $this->db->from('cv c');
        $this->db->join('noteclient n', 'c.idclient = n.idclient');
        $this->db->join('critere cr', 'cr.idbesoin = c.idbesoin');
        $this->db->where('c.idbesoin', $besoin);
        $this->db->order_by('total_cv_note', 'DESC');
        $this->db->order_by('n.noteclient', 'DESC');
        $this->db->limit($nbr);
        $query = $this->db->get();
        return $query->result();
    }

    public function generateInterviewSchedule($selection) {
        date_default_timezone_set('Indian/Antananarivo'); 
        $debutEnt = date("Y-m-d", strtotime($selection[0]->debutent)); 
        $debuttemps = strtotime("8:00 AM", strtotime($debutEnt));
        $fintemps = strtotime("4:00 PM", strtotime($debutEnt)); 
        $entretien = array();
    
        foreach ($selection as $index => $row) {
            $currentDate = date("Y-m-d", strtotime($row->debutent));
    
            if ($currentDate > $debutEnt) {
                $debutEnt = $currentDate;
                $debuttemps = strtotime("8:00 AM", strtotime($debutEnt));
                $fintemps = strtotime("4:00 PM", strtotime($debutEnt));
            }
    
            while ($debuttemps > $fintemps) {
                $debutEnt = date("Y-m-d", strtotime('+1 day', strtotime($debutEnt)));
                $debuttemps = strtotime("8:00 AM", strtotime($debutEnt));
                $fintemps = strtotime("4:00 PM", strtotime($debutEnt));
            }
    
            $interviewTime = date("d-m-Y h:i A", $debuttemps); 
            $entretien[] = array(
                'idclient' => $row->idclient,
                'candidat' => $row->nom . ' ' . $row->prenom,
                'age' => $row->age,
                'total_cv_note'  => $row->total_cv_note,
                'noteclient'  => $row->noteclient,
                'heure_entretien' => $interviewTime,
                'idclient' => $row ->idclient
            );
    
            $debuttemps = strtotime("+20 minutes", $debuttemps);
        }
    
        return $entretien;
    }
    
}
?>