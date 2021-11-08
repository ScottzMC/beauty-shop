<?php

  class Gallery extends CI_Controller{

    public function index(){
      $email = $this->session->userdata('uemail');
      $status = $this->session->userdata('ustatus');

      if($status == "Admin"){
        $data['total_order_count'] = $this->Admin_model->display_order_count();
        $data['gallery'] = $this->Admin_model->display_gallery();

        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/gallery', $data);
        $this->load->view('admin/menu/footer');
      }else{
        redirect('home');
      }
    }

    // Add Gallery

    public function add_gallery(){
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['gallery'] = $this->Admin_model->display_gallery();

      $form_valid = $this->form_validation->run();

      if($form_valid == FALSE){
        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/gallery', $data);
        $this->load->view('admin/menu/footer');
      }if(!empty($_FILES['fileBanner']['name'])){
        $files = $_FILES;
        //$images = array();
        $cpt = count($_FILES['fileBanner']['name']);
        for($i=0; $i<$cpt; $i++){
          $_FILES['fileBanner']['name']= $files['fileBanner']['name'][$i];
          $_FILES['fileBanner']['type']= $files['fileBanner']['type'][$i];
          $_FILES['fileBanner']['tmp_name']= $files['fileBanner']['tmp_name'][$i];
          $_FILES['fileBanner']['error']= $files['fileBanner']['error'][$i];
          $_FILES['fileBanner']['size']= $files['fileBanner']['size'][$i];

          $config = array(
              'upload_path'   => "./uploads/gallery/",
              'allowed_types' => "gif|jpg|png|jpeg",
              'overwrite'     => TRUE,
              'max_size'      => "3000",  // Can be set to particular file size
              //'max_height'    => "768",
              //'max_width'     => "1024"
          );

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('fileBanner');
          $fileName = $_FILES['fileBanner']['name'];
        }

        $add_gallery_data = array('image' => $fileName);

        $insert_gallery = $this->Admin_model->insert_gallery($add_gallery_data);

        if($insert_gallery){
          redirect('admin/edit/gallery');
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgGalleryError', $statusMsg);
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/edit/gallery', $data);
          $this->load->view('admin/menu/footer');
        }
      }
    }

    // End of Add Gallery

    // Edit Gallery

    public function edit_gallery($id){
      $data['total_order_count'] = $this->Admin_model->display_order_count();
      $data['edit_gallery'] = $this->Admin_model->display_gallery_by_id($id);

      $form_valid = $this->form_validation->run();

      if($form_valid == FALSE){
        $this->load->view('admin/menu/nav', $data);
        $this->load->view('admin/edit/edit_gallery', $data);
        $this->load->view('admin/menu/footer');
      }if(!empty($_FILES['fileBanner']['name'])){
        $files = $_FILES;
        //$images = array();
        $cpt = count($_FILES['fileBanner']['name']);
        for($i=0; $i<$cpt; $i++){
          $_FILES['fileBanner']['name']= $files['fileBanner']['name'][$i];
          $_FILES['fileBanner']['type']= $files['fileBanner']['type'][$i];
          $_FILES['fileBanner']['tmp_name']= $files['fileBanner']['tmp_name'][$i];
          $_FILES['fileBanner']['error']= $files['fileBanner']['error'][$i];
          $_FILES['fileBanner']['size']= $files['fileBanner']['size'][$i];

          $config = array(
              'upload_path'   => "./uploads/gallery/",
              'allowed_types' => "gif|jpg|png|jpeg",
              'overwrite'     => TRUE,
              'max_size'      => "3000",  // Can be set to particular file size
              //'max_height'    => "768",
              //'max_width'     => "1024"
          );

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('fileBanner');
          $fileName = $_FILES['fileBanner']['name'];
        }

        if(!empty($_FILES['fileBanner']['name'])){
          $update_banner_image = $this->Admin_model->update_gallery_image($id, $fileName);
        }
        if($update_banner_image){
          $statusMsg = '<div class="alert alert-success" role="alert">Added Slider Details</div>';
          redirect('admin/edit/gallery');
        }else{
          $statusMsg = '<div class="alert alert-danger" role="alert">Error!!. Try Again</div>';
          $this->session->set_flashdata('msgEditError', $statusMsg);
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/edit/edit_gallery', $data);
          $this->load->view('admin/menu/footer');
        }
      }
    }

    // End of Edit Gallery

  }

?>
