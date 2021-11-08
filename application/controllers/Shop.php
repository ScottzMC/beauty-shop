<?php

  class Shop extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $config['base_url'] = base_url()."shop";
      $total_row = $this->Data_model->record_shop_count();
      $config['total_rows'] = $total_row;
      $config['per_page'] = 10;
      $config['uri_segment'] = 3;
      $choice = $config['total_rows']/$config['per_page'];
      $config['num_links'] = round($choice);

      $config['full_tag_open'] = '<ul>';
      $config['full_tag_close'] = '</ul>';

      $config['first_tag_open'] = '<li>';
      $config['last_tag_open'] = '<li>';

      $config['next_tag_open'] = '<li>';
      $config['prev_tag_open'] = '<li>';

      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';

      $config['first_tag_close'] = '</li>';
      $config['last_tag_close'] = '</li>';

      $config['next_tag_close'] = '</li>';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"><span><b>';
      $config['cur_tag_close'] = '</b></span></li>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

      $data["shop"] = $this->Data_model->fetch_shop_data($config["per_page"], $page);
      $data['menu'] = $this->Data_model->display_menu();

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shop/shop', $data);
      $this->load->view('site/menu/footer');
    }

    // Type

    public function type(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shop/type');
      $this->load->view('site/menu/footer');
    }

    // End of Type

    // Detail

    public function detail($id){
      $data['detail'] = $this->Data_model->display_shop_by_id($id);
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $this->form_validation->set_rules('fullname', 'FullName', 'trim|required');
      $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
      $this->form_validation->set_rules('description', 'Description', 'trim|required');

      $form_valid = $this->form_validation->run();
      $submit = $this->input->post('submit');

      if($form_valid == FALSE){
        $this->load->view('site/menu/nav', $data);
        $this->load->view('site/shop/detail', $data);
        $this->load->view('site/menu/footer');
      }

      if(isset($submit)){
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $description = $this->input->post('description');
        $time = time();
        $date = date('Y-m-d H:i:s');

        $query = $this->db->query("SELECT product_code FROM product WHERE id = '$id' ")->result();
        foreach($query as $qry){
          $product_code = $qry->product_code;
        }

        $add_array = array(
          'id' => $id,
          'product_code' => $product_code,
          'fullname' => $fullname,
          'email' => $email,
          'description' => $description,
          'created_time' => $time,
          'created_date' => $date
        );

        $add_data = $this->Data_model->insert_shop_detail_review($add_array);

        if($add_data){
          redirect('shop/detail/'.$id);
        }else{
          $statusMsg = '<div class="alert alert-danger>Review Failed</div>';
          $this->session->set_flashdata('msgError', $statusMsg);

          $this->load->view('site/menu/nav', $data);
          $this->load->view('site/shop/detail', $data);
          $this->load->view('site/menu/footer');
        }
      }
    }

    // End of Detail

    // Search

    public function search(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $search_query = $this->input->post('search_query');

      $config['base_url'] = base_url()."shop";
      $total_row = $this->Data_model->record_search_count();
      $config['total_rows'] = $total_row;
      $config['per_page'] = 10;
      $config['uri_segment'] = 3;
      $choice = $config['total_rows']/$config['per_page'];
      $config['num_links'] = round($choice);

      $config['full_tag_open'] = '<ul>';
      $config['full_tag_close'] = '</ul>';

      $config['first_tag_open'] = '<li>';
      $config['last_tag_open'] = '<li>';

      $config['next_tag_open'] = '<li>';
      $config['prev_tag_open'] = '<li>';

      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';

      $config['first_tag_close'] = '</li>';
      $config['last_tag_close'] = '</li>';

      $config['next_tag_close'] = '</li>';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="active"><span><b>';
      $config['cur_tag_close'] = '</b></span></li>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

      $data["search"] = $this->Data_model->fetch_search_data($config["per_page"], $page, $search_query);

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/shop/search', $data);
      $this->load->view('site/menu/footer');
    }

    // End of Search

  }

?>
