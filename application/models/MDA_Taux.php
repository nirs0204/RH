<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class MDA_Taux extends CI_Model
    {
        function getTauxIRSA()
        {
            $sql = "select * from taux where nom = 'IRSA'";
        }
    }
?>