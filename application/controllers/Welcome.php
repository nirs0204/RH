<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private function viewer($page, $data)
	{
		$v = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('ADMIN/pages/template/basepage', $v);
	}

	public function index()
	{
		$this->viewer('/besoin',array());
	}		
}
