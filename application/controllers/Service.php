<?php

  class Service extends CI_Controller{

    public function index(){
      $data['service'] = $this->Data_model->display_service();

      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/service', $data);
      $this->load->view('site/menu/footer');
    }
  }

?>
