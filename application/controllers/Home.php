<?php

  class Home extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $data['banner'] = $this->Data_model->display_banner();
      $data['about_info'] = $this->Data_model->display_about_in_home();
      $data['gallery'] = $this->Data_model->display_gallery_in_home();
      $data['service'] = $this->Data_model->display_service_in_home();

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/home', $data);
      $this->load->view('site/menu/footer');
    }
  }

?>
