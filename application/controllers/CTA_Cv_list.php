<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_Cv_list extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Noteclient');
        $this->load->model('MDC_Annonce');
        $this->load->model('MDC_CV');
        $this->load->helper('main_helper');
        if($this->session->userdata('admin') === null) 
		{
			redirect(bu('CTA_Admin/login_view?error=' . urlencode('Vous n`êtes pas connectée !')));
		}
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
        $service = $_SESSION['service'];
        $data['news'] =  $this->MDC_Annonce->New_service($service);
        $this->viewer('/news',$data);
    }
    public function cvList(){
        $service = $_SESSION['service'];
        $besoin = $_GET['besoin'];
        $pers = $_GET['pers'];
        $data['news'] =  $this->MDC_Annonce->New_service($service);
        $data['selection'] = $this->MDC_Noteclient->note_trier($besoin,$pers);
        $interviews = $this->MDC_Noteclient->generateInterviewSchedule($data['selection']);
        $data['entretien'] = $interviews;
        $this->viewer('/news',$data);
    }
    public function refuser(){
        $besoin = $_GET['idbesoin'];
        $client = $_GET['idclient'];
        $pers = $_GET['pers'];
        $type =2;
        $this->MDC_CV->updateCv($type,$client,$besoin);
        
        $service = $_SESSION['service'];
        $data['news'] =  $this->MDC_Annonce->New_service($service);
        $data['selection'] = $this->MDC_Noteclient->note_trier($besoin,$pers);
        $interviews = $this->MDC_Noteclient->generateInterviewSchedule($data['selection']);
        $data['entretien'] = $interviews;
        $this->viewer('/news',$data);
    }
}
