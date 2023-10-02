<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTC_Annonce extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('MDC_Annonce');
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
	
}
