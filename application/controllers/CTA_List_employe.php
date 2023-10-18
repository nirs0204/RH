<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_List_employe extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDA_Employe');
        $this->load->model('MDC_CV');
        $this->load->helper('main_helper');
     
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
        $idservice = $_SESSION['service'];
        $data['emp'] = $this->MDA_Employe->getEmployes($idservice);
        $this->viewer('/listPersonnel',$data);
    }
}
