<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CTA_Reste_Conge extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('MDA_Conge');
        $this->load->model('MDA_Employe');
        $this->load->model('MDA_DemandeConge');
    }
    private function viewer($page, $data)
    {
        $v = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('ADMIN/pages/template/basepage', $v);
    }

    public function index(){
        $data['emp'] = $this->MDA_Employe->getEmployesPlusUnAn();
        $this->viewer('/reste-conge', $data);
    }
    public function attributConge(){
        $emp = $this->MDA_Employe->getEmployesPlusUnAn();
        for ($i=0; $i < count($emp) ; $i++) { 
            $insert= $this->MDA_Conge->getConge($emp[$i]->idemploye);
            if(empty($insert)){
               $this->MDA_Conge->saveLeave($emp[$i]->idemploye, 30);
            }else{
               $this->MDA_Conge->updateMax($emp[$i]->idemploye,30);
            }
        }
        redirect("CTA_Reste_Conge/");
    }
      

}
?>