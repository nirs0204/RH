<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_Besoin extends CI_Controller
{
    public function need_view(){
        $this->load->view('ADMIN/pages/besoin');
    }
}
?>