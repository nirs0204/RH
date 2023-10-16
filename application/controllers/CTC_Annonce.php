<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Annonce extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Annonce');
		$this->load->model('MDC_Cv');
        $this->load->helper('main_helper');
    }

	private function viewer($page, $data)
	{
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('CLIENT/pages/template/basepage', $v);
	}

	public function index()
	{
		
		$data['annonce']=$this->MDC_Annonce->allNews();
		$this->viewer('/annonce',$data);
	}	
	
	public function detail()
	{
		$id = $this->input->get('besoin');
		$data['detail'] =  $this->MDC_Annonce->oneNews($id);
		$this->viewer('/detail',$data);
	}	
	public function contrat_essai(){
		$this->load->library('Essai');
		$pdf = new Essai();
		$pdf->AddPage();
		$pdf->ajouterEmp('No002092e8781', 'Nom ', 'Prenom', '10 Juin 2002', 'Madagascar', 'Celibataire', 'Ambalavao', '0348902873', 'mdkncwdir', 'hdbhwgiqwwi', '202000', '02 fev 2023', '05 mmai 2023', 'Antsirabe', '23 oct 2022');
		$pdf->Output();
	}
}
