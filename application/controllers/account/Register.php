<?php

  class Register extends CI_Controller{

    public function index(){
      $session_email = $this->session->userdata('uemail');
      $session_status = $this->session->userdata('ustatus');

      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      if(empty($session_email)){
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

        $form_valid = $this->form_validation->run();
        $submit_register = $this->input->post('register');

        if($form_valid == FALSE){
          $this->load->view('site/menu/nav', $data);
          $this->load->view('site/account/register');
          $this->load->view('site/menu/footer');
        }else if(isset($submit_register)){
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $hashed_password = $this->bcrypt->hash_password($password);
          $time = time();
          $date = date('Y-m-d H:i:s');

          $add_user_array = array(
            'email' => $email,
            'password' => $hashed_password,
            'status' => 'User',
            'created_time' => $time,
            'created_date' => $date
          );

          $add_user_details_array = array(
            'email' => $email,
            'created_time' => $time,
            'created_date' => $date
          );

          $add_user = $this->Data_model->create_user($add_user_array);
          $add_user_details = $this->Data_model->create_user_details($add_user_details_array);

          if($add_user && $add_user_details){
            redirect('account/login');
          }else{
            $statusMsg = '<div class="alert alert-danger>Registration Failed or Account Deactivated</div>';
            $this->session->set_flashdata('msgError', $statusMsg);
            $this->load->view('site/menu/nav', $data);
            $this->load->view('site/account/register');
            $this->load->view('site/menu/footer');
          }
        }
      }
    }
  }

?>
