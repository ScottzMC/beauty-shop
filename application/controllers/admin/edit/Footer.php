<?php

  class Footer extends CI_Controller{

    public function index(){
      $email = $this->session->userdata('uemail');
      $status = $this->session->userdata('ustatus');

      if($status == "Admin"){
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['footer'] = $this->Admin_model->display_footer();

        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/footer', $data);
        $this->load->view('admin/menu/footer');
      }else{
        redirect('home');
      }
    }

    // Add Footer

    public function add_footer(){
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['footer'] = $this->Admin_model->display_footer();

      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
      $form_valid = $this->form_validation->run();

      if($form_valid == FALSE){
        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/menu', $data);
        $this->load->view('admin/menu/footer');
      }else{
        $address = $this->input->post('address');
        $category = $this->input->post('telephone');
        $email = $this->input->post('email');

        $add_menu = array('type' => $type, 'category' => $category);
        $insert_menu = $this->Admin_model->insert_menu($add_menu);

        if($insert_menu){
          redirect('admin/edit/menu');
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgMenuError', $statusMsg);
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/edit/menu', $data);
          $this->load->view('admin/menu/footer');
        }
      }
    }

    // End of Add Footer

  }

?>
