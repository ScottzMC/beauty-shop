<?php

  class Social extends CI_Controller{

    public function index(){
      $this->load->view('admin/menu/nav');
      $this->load->view('admin/edit/social');
      $this->load->view('admin/menu/footer');
    }
  }

?>
