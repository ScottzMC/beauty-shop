<?php

  class Edit_product extends CI_Controller{

    public function edit(){
      $email = $this->session->userdata('uemail');
      $status = $this->session->userdata('ustatus');

      if($status == "Admin"){
        $data['total_order_count'] = $this->Admin_model->display_order_count();

        $this->load->view('admin/menu/nav');
        $this->load->view('admin/product/edit_product');
        $this->load->view('admin/menu/footer');
      }else{
        redirect('home');
      }
    }
  }

?>
