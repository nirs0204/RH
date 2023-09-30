<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTA_Accueil extends CI_Controller {

	private function viewer($page, $data)
	{
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('ADMIN/pages/template/basepage', $v);
	}

	public function besoin()
	{
		$this->viewer('/besoin',array());
	}	
	public function critere()
	{
		$this->viewer('/critere',array());
	}		
	public function cv_list()
	{
		$this->viewer('/cv_list',array());
	}		
}
