<?php

  class Data_model extends CI_Model{

    // Register

    public function create_user($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users', $escape_data);
      return $query;
    }

    public function create_user_details($data){
      $escape_data = $this->db->escape_str($data);
      $query = $this->db->insert('users_details', $escape_data);
      return $query;
    }

    // End of Register

    // Login

    public function validate($email, $password){
    	$escape_email = $this->db->escape_str($email);
      $escape_password = $this->db->escape_str($password);

	  	$this->db->where('email', $escape_email);
    	$query = $this->db->get('users');

    	if($query->num_rows() > 0){
      	$result = $query->row_array();
      	if($this->bcrypt->check_password($escape_password, $result['password'])){
		    	return $query->result();
      	}else{
        		return array();
      	}
    	}else{
      	return NULL;
    	}
  	}

    // End of Login

    // Home

    public function display_banner(){
      $this->db->where('type', 'About');
      $query = $this->db->get('banner')->result();
      return $query;
    }

    public function display_about_in_home(){
      $query = $this->db->get('about_content')->result();
      return $query;
    }

    public function display_gallery_in_home(){
      $this->db->limit('10');
      $query = $this->db->get('gallery')->result();
      return $query;
    }

    public function display_service_in_home(){
      $this->db->limit('3');
      $query = $this->db->get('service_content')->result();
      return $query;
    }

    // End of Home

    // About

    public function display_about(){
      $query = $this->db->get('about_content')->result();
      return $query;
    }

    // End of About

    // Gallery

    public function record_gallery_count() {
        $query = $this->db->count_all("gallery");
        return $query;
    }

    public function fetch_gallery_data($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get("gallery");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

    // End of Gallery

    // Service

    public function display_service(){
      $query = $this->db->get('service_content')->result();
      return $query;
    }

    // End of Service

    // Shop

    public function display_menu(){
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function record_shop_count() {
        $query = $this->db->count_all("product");
        return $query;
    }

    public function fetch_shop_data($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->query("SELECT product.product_code, product.id, product.title, product.price, product.image,
        product_details.product_code, product_details.description FROM product INNER JOIN product_details ON
        product.product_code = product_details.product_code ORDER BY product.created_date DESC");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function display_shop_by_id($id){
     $query = $this->db->query("SELECT product.product_code, product.id, product.title, product.price, product.type, product.image,
     product.category, product_details.product_code, product_details.color, product_details.description FROM product INNER JOIN
     product_details ON product.product_code = product_details.product_code WHERE product.id = '$id'")->result();
     return $query;
   }

   public function record_search_count() {
       $query = $this->db->count_all("product");
       return $query;
   }

   public function fetch_search_data($limit, $start, $title){
     $this->db->limit($limit, $start);
     $query = $this->db->query("SELECT product.product_code, product.title, product.price, product.type, product.category, product.image,
     product.id, product_details.product_code, product_details.color, product_details.description FROM product INNER JOIN product_details ON
     product.product_code = product_details.product_code WHERE product.title LIKE '%$title%' ")->result();

    return $query;
  }

  public function insert_shop_detail_review($data){
    $query = $this->db->insert('product_review', $data);
    return $query;
  }

    // End of Shop

    // View Cart

    public function update_cart($rowid, $qty, $price, $amount) {
 		   $data = array(
			   'rowid'   => $rowid,
			   'qty'     => $qty,
			   'price'   => $price,
			   'amount'  => $amount
		 );

		  $this->cart->update($data);
	  }

    // End of View Cart

    // Shopping

    public function display_shipping_details($email){
      $this->db->where('email', $email);
      return $this->db->get('users_details')->result();
    }

    public function update_customer_shipping_firstname($prev_email, $firstname){
    return $this->db->query("UPDATE users_details SET firstname = '$firstname' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_surname($prev_email, $lastname){
    return $this->db->query("UPDATE users_details SET surname = '$lastname' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_telephone($prev_email, $telephone){
    return $this->db->query("UPDATE users_details SET telephone = '$telephone' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_address1($prev_email, $address1){
    return $this->db->query("UPDATE users_details SET address1 = '$address1' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_province($prev_email, $region){
    return $this->db->query("UPDATE users_details SET region = '$region' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_address2($prev_email, $address2){
    return $this->db->query("UPDATE users_details SET address2 = '$address2' WHERE email = '$prev_email' ");
  }

  public function update_customer_shipping_state($prev_email, $state){
    return $this->db->query("UPDATE users_details SET state = '$state' WHERE email = '$prev_email' ");
  }

  public function insert_order_detail($data){
		$this->db->insert('order_items', $data);
	}

    // End of Shopping

    // View Orders

    public function display_customer_orders($email){
      $this->db->where('email', $email);
      $query = $this->db->get('order_items')->result();
      return $query;
    }

    // End of View Orders

  }

?>
