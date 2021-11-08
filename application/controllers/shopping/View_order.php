<?php

  class View_order extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $email = $this->session->userdata('uemail');

      $data['my_order'] = $this->Data_model->display_customer_orders($email);

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shopping/view_order', $data);
      $this->load->view('site/menu/footer');
    }
  }

?>
