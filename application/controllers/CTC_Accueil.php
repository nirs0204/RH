<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Accueil extends CI_Controller {

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
		$this->viewer('/annonce',array());
	}	
	public function cv()
	{
		$this->viewer('/cv',array());
	}		
	public function programme()
	{
		$this->viewer('/programme',array());
	}		
}
