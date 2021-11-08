<?php

  class Add_product extends CI_Controller{

    public function index(){
      $email = $this->session->userdata('uemail');
      $status = $this->session->userdata('ustatus');

      if($status == "Admin"){
        $data['total_order_count'] = $this->Admin_model->display_order_count();

        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[30]|max_length[1000]');

        $form_valid = $this->form_validation->run();

        if($form_valid == FALSE){
          $this->load->view('admin/menu/nav', $data);
          $this->load->view('admin/product/add_product');
          $this->load->view('admin/menu/footer');
        }else if(!empty($_FILES['userFiles']['name'])){
          $shuffle = str_shuffle("ABCDUVXY");
          $unique = rand(000, 999);
          $code = $shuffle.$unique;

          $title = $this->input->post('title');
          $price = $this->input->post('price');
          $type = $this->input->post('type');
          $category = $this->input->post('category');
          $description = $this->input->post('description');
          $color = $this->input->post('color');

          $time = time();
          $date = date('Y-m-j H:i:s');

          $files = $_FILES;
          $cpt = count($_FILES['userFiles']['name']);
          for($i=0; $i<$cpt; $i++){
            $_FILES['userFiles']['name']= $files['userFiles']['name'][$i];
            $_FILES['userFiles']['type']= $files['userFiles']['type'][$i];
            $_FILES['userFiles']['tmp_name']= $files['userFiles']['tmp_name'][$i];
            $_FILES['userFiles']['error']= $files['userFiles']['error'][$i];
            $_FILES['userFiles']['size']= $files['userFiles']['size'][$i];

            $config = array(
                'upload_path'   => "./uploads/products/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite'     => TRUE,
                'max_size'      => "3000",  // Can be set to particular file size
                //'max_height'    => "768",
                //'max_width'     => "1024"
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('userFiles');
            $fileName = $_FILES['userFiles']['name'];
            $images[] = $fileName;
          }

          $fileName = implode(',', $images);

          $pic = array('product_code' => $code, 'image' => $fileName);

          $pdc = 1;

          $prod = array(
            'product_code' => $code,
            'title' => $title,
            'price' => $price,
            'type' => $type,
            'category' => $category,
            'created_time' => $time,
            'created_date' => $date
          );

          $det = array(
            'product_code' => $code,
            'color' => $color,
            'description' => $description,
            'created_time' => $time,
            'created_date' => $date
          );

          $insert_image = $this->Admin_model->insert_data($pic);
          $insert_product = $this->Admin_model->insert_product($prod);
          $insert_details = $this->Admin_model->insert_details($det);

          if($insert_image && $insert_product && $insert_details){
            redirect('admin/product/view_product');
          }else{
            $msgError = '<div class="alert alert-danger>Upload Failed</div>';
            $this->session->set_flashdata('msgError', $msgError);
            $this->load->view('admin/menu/nav', $data);
            $this->load->view('admin/product/add_products', $data);
            $this->load->view('admin/menu/footer');
          }
        }
      }else{
        redirect('home');
      }
    }
  }

?>
