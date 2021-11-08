<?php

  class Checkout extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $email = $this->session->userdata('uemail');

      $data['ship'] = $this->Data_model->display_shipping_details($email);

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shopping/checkout', $data);
      $this->load->view('site/menu/footer');
    }

    public function place_order(){
      if($this->session->userdata('login')){
      $email = $this->session->userdata('uemail');

      $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[30]');
      $this->form_validation->set_rules('surname', 'Last Name', 'trim|required|max_length[50]');
      $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|max_length[11]');
      $this->form_validation->set_rules('address1', 'Address 1', 'trim|required|max_length[100]');
      $this->form_validation->set_rules('address2', 'Address 2', 'trim|required|max_length[100]');

      $data['ship'] = $this->Data_model->display_shipping_details($email);

        $shuffle = str_shuffle("ABCDTUVXY");
        $unique = rand(000, 999);
        $order_code = $shuffle.$unique;

        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('surname');
        $telephone = $this->input->post('telephone');
        $address1 = $this->input->post('address1');
        $address2 = $this->input->post('address2');
        $region = $this->input->post('region');
        $state = $this->input->post('state');

        $time = time();
        $date = date('Y-m-d H:i:s');

        $this->Data_model->update_customer_shipping_firstname($this->session->userdata('uemail'), $firstname);
        $this->Data_model->update_customer_shipping_surname($this->session->userdata('uemail'), $lastname);
        $this->Data_model->update_customer_shipping_telephone($this->session->userdata('uemail'), $telephone);
        $this->Data_model->update_customer_shipping_address1($this->session->userdata('uemail'), $address1);
        $this->Data_model->update_customer_shipping_province($this->session->userdata('uemail'), $region);
        $this->Data_model->update_customer_shipping_address2($this->session->userdata('uemail'), $address2);
        $this->Data_model->update_customer_shipping_state($this->session->userdata('uemail'), $state);

        if ($cart = $this->cart->contents()):
  			foreach ($cart as $item):
  				$order_detail = array(
  					'order_id' 	   => $order_code,
            'email'        => $email,
            'title'        => $item['name'],
  					'price' 		   => $item['price'],
            'quantity' 		 => $item['qty'],
            'image'        => $item['image'],
            'status'       => 'Delivering',
            'created_time' => time(),
            'created_date'  => date('Y-m-j H:i:s')
  				);

  				$this->Data_model->insert_order_detail($order_detail);
  				$this->cart->destroy();
  			endforeach;
  		  endif;

        redirect('shopping/checkout/success');
      }else{
        $statusMsg = '<div class="alert alert-danger text-center">Please Login to Place an Order</div>';
        $this->session->set_flashdata('error', $statusMsg);
        $this->load->view('site/menu/nav', $data);
        $this->load->view('site/shopping/checkout', $data);
        $this->load->view('site/menu/footer');
      }
    }

    public function success(){
      $email = $this->session->userdata('uemail');

      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shopping/order_success');
      $this->load->view('site/menu/footer');
    }
  }

?>
