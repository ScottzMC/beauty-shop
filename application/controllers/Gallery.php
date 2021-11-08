<?php

  class Gallery extends CI_Controller{

    public function index(){
      if (!$this->cart->contents()){
			    $data['message'] = '<p><div class="alert alert-danger" role="alert">Your cart is empty!</div></p>';
		  }else{
			    $data['message'] = $this->session->flashdata('message');
		  }

      $config['base_url'] = base_url()."gallery";
      $total_row = $this->Data_model->record_gallery_count();
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

      $data["gallery"] = $this->Data_model->fetch_gallery_data($config["per_page"], $page);

      $this->load->view('site/menu/nav', $data);
      $this->load->view('site/gallery', $data);
      $this->load->view('site/menu/footer');
    }
  }

?>
