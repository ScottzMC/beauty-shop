<?php

  class Service extends CI_Controller{

    public function index(){
      $email = $this->session->userdata('uemail');
      $status = $this->session->userdata('ustatus');

      if($status == "Admin"){
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['service'] = $this->Admin_model->display_service_content();

        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/service', $data);
        $this->load->view('admin/menu/footer');
      }else{
        redirect('home');
      }
    }

    // Add Services

    public function add_service(){
      $data['total_order_count'] = $this->Admin_model->display_order_count();

      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('price', 'Price', 'trim|required');
      $form_valid = $this->form_validation->run();
      $submit = $this->input->post('submit');

      if($form_valid == FALSE){
        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/service', $data);
        $this->load->view('admin/menu/footer');
      }if(isset($submit)){

        $title = $this->input->post('title');
        $price = $this->input->post('price');

        $add_service = array('title' => $title, 'price' => $price);
        $insert_service = $this->Admin_model->insert_service_content($add_service);

        if($insert_service){
          redirect('admin/edit/service');
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgServiceError', $statusMsg);
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/edit/service', $data);
          $this->load->view('admin/menu/footer');
        }
      }
    }

    // End of Add Services

    // Edit Services

    public function edit_service($id){
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['edit_service'] = $this->Admin_model->display_service_content_by_id($id);

      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('price', 'Price', 'trim|required');
      $form_valid = $this->form_validation->run();
      $submit = $this->input->post('edit');

      if($form_valid == FALSE){
        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/edit_service', $data);
        $this->load->view('admin/menu/footer');
      }
      if(isset($submit)){
        $price = $this->input->post('price');
        $title = $this->input->post('title');

        $update_content_info = $this->Admin_model->update_service_price_info($id, $price);
        $update_title_info = $this->Admin_model->update_service_title_info($id, $title);

        if(!empty($update_title_info) || !empty($update_content_info)){
          redirect('admin/edit/service');
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgEditError', $statusMsg);
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/edit/edit_service', $data);
          $this->load->view('admin/menu/footer');
        }
      }
    }

    // End of Services
  }

?>
