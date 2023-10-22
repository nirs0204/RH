<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . 'third_party/fpdf.php');

class Employement extends FPDF {
    function Header()
    {
        // A propos de la societe
        $this->SetFont('Arial','B',18);
        $this->Cell(65);
        $this->Cell(10,5,'CONTRAT DE TRAVAIL',0,0,'L');
        $this->Ln(25);
    }

    function ajouterEmp($nmatricule, $nom, $prenom, $dtn, $ln, $smatri, $adresse, $tel, $pere, $mere, $salaire, $condition, $debut, $fin, $lieu, $creation)
    {
        // A propos du client
        $this->SetFont('Arial','',12);
        $this->Cell(10);
        $this->Cell(10,5,"Numero matricule : $nmatricule",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Nom et prenoms : $nom $prenom",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"numéro CIN : $dtn a $ln",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Catégorie de travail : $smatri",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Adresse : $adresse",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Contact : $tel",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Pere : $pere",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Mere : $mere",0,0,'L');

        $this->Ln(25);
        $this->Cell(10);
        $this->Cell(10,5,"Salaire : $salaire Ar",0,0,'L',"");
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Condition de travail : $condition",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Debut du contrat : $debut",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Fin du contrat : $fin",0,0,'L');
        $this->Ln(10);
        $this->Cell(10);
        $this->Cell(10,5,"Lieu de travail : $lieu",0,0,'L');
        $this->Ln(30);
        
        $this->Cell(100);
        $this->Cell(10,5,"Tape le $creation a Antananarivo",0,0,'L');
        $this->Ln(20);

        $this->Cell(150);
        $this->Cell(10,5,"Signature",0,0,'L');
        $this->Ln(10);

    }
}

?>