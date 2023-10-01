<?php 

    $this->load->view('CLIENT/pages/template/page-head');

    $this->load->view('CLIENT/pages/template/menu-head');

    $this->load->view('CLIENT/pages/template/menu-bar');

    $this->load->view('CLIENT/pages/'.$page,$data);

    $this->load->view('CLIENT/pages/template/footer');

?>