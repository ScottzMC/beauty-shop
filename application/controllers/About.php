<?php

  class About extends CI_Controller{

    public function index(){
      $data['about'] = $this->Data_model->display_about();
      $data['banner'] = $this->Data_model->display_banner();

      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/about', $data);
      $this->load->view('site/menu/footer');
    }
  }

?>
