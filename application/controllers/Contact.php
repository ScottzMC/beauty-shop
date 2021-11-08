<?php

  class Contact extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/contact');
      $this->load->view('site/menu/footer');
    }
  }

?>
