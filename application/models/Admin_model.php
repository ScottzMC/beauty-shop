<?php

  class Admin_model extends CI_Model{

    // Dashboard

    public function display_user_count(){
      $query = $this->db->query("SELECT COUNT(*) AS user_count FROM users")->result();
      return $query;
    }

    public function display_order_count(){
      $query = $this->db->query("SELECT COUNT(*) AS order_count FROM order_items")->result();
      return $query;
    }

    public function display_product_count(){
      $query = $this->db->query("SELECT COUNT(*) AS product_count FROM product")->result();
      return $query;
    }

    public function display_all_users(){
      $query = $this->db->query("SELECT * FROM users ORDER BY created_date DESC")->result();
      return $query;
    }

    public function display_all_products(){
      $query = $this->db->query("SELECT product.product_code, product.title, product.price, product.created_time,
      product.created_date, image.product_code, image.image FROM product INNER JOIN image ON product.product_code = image.product_code
      ORDER BY product.created_date DESC ")->result();
      return $query;
    }

    public function display_all_orders(){
      $query = $this->db->query("SELECT order_items.id, order_items.email, order_items.order_id, order_items.title, order_items.price,
      order_items.quantity, order_items.status, order_items.created_time, order_items.created_date, users_details.email,
      users_details.firstname, users_details.surname, users_details.telephone, users_details.address1, users_details.region,
      users_details.state FROM order_items INNER JOIN users_details ON order_items.email = users_details.email ORDER BY
      order_items.created_date DESC")->result();
      return $query;
    }

    // End of Dashboard

    // Product

    public function record_product_count() {
        $query = $this->db->count_all("product");
        return $query;
    }

    public function fetch_product_data($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->query("SELECT product.id, product.product_code, product.title, product.category, product.price,
        image.product_code, image.image FROM product INNER JOIN image ON product.product_code = image.product_code ORDER BY
        product.created_date DESC");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function insert_data($data){
     $query = $this->db->insert('image', $data);
     return $query;
   }

   public function insert_product($data){
     $query = $this->db->insert('product', $data);
     return $query;
   }

   public function insert_details($data){
     $query = $this->db->insert('product_details', $data);
     return $query;
   }

   public function delete_product($id){
      $query = $this->db->query("DELETE FROM product WHERE id = '$id' ");
      $querypd = $this->db->query("DELETE FROM product_details WHERE id = '$id' ");
      $queryi = $this->db->query("DELETE FROM image WHERE id = '$id' ");
    }

    // End of Product

    // Orders

    public function cancel_order($id, $status){
      $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
    }

    public function deliver_order($id, $status){
      $query = $this->db->query("UPDATE order_items SET status = '$status' WHERE id = '$id' ");
    }

    public function delete_order($id){
      $query = $this->db->query("DELETE FROM order_items WHERE id = '$id' ");
    }

    public function display_invoice_item($order_id){
      $this->db->where('order_id', $order_id);
      $query = $this->db->get('order_items')->result();
      return $query;
    }

    public function display_all_invoice($email){
      $this->db->where('email', $email);
      $query = $this->db->get('users_details')->result();
      return $query;
    }

    // End of Orders

     // Edit Banners

    public function get_menu_banner_category(){
      //$this->db->where('type', $type);
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function display_banners(){
      $query = $this->db->get('banner')->result();
      return $query;
    }

    public function display_banners_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('banner')->result();
      return $query;
    }

    public function update_banner_image($id, $image){
      $query = $this->db->query("UPDATE banner SET image = '$image' WHERE id = '$id' ");
      return $query;
    }

    public function update_banner_type($id, $type){
      $query = $this->db->query("UPDATE banner SET type = '$type' WHERE id = '$id' ");
      return $query;
    }

    public function insert_banner($data){
      $query = $this->db->insert('banner', $data);
      return $query;
    }

    public function delete_banner($id){
      $query = $this->db->query("DELETE FROM banner WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Banners

     // Edit Menu

     public function display_menu(){
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function display_menu_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('menu')->result();
      return $query;
    }

    public function insert_menu($data){
      $query = $this->db->insert('menu', $data);
      return $query;
    }

    public function update_type_info($id, $type){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE menu SET type = '$type' ");
      return $query;
    }

    public function update_category_info($id, $category){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE menu SET category = '$category' ");
      return $query;
    }

    public function delete_menu($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("menu");
      return $query;
    }

     // End of Edit Menu

     // Edit About Us

     public function display_about_content(){
      $query = $this->db->get('about_content')->result();
      return $query;
    }

    public function display_about_content_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('about_content')->result();
      return $query;
    }

    public function delete_about_content($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("about_content");
      return $query;
    }

    public function insert_about_content($data){
      $query = $this->db->insert('about_content', $data);
      return $query;
    }

    public function update_about_content_info($id, $body){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE about_content SET body = '$body' ");
      return $query;
    }

    public function update_about_title_info($id, $title){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE about_content SET title = '$title' ");
      return $query;
    }

     // End Edit About Us

     // Edit Gallery

    public function display_gallery(){
      $query = $this->db->get('gallery')->result();
      return $query;
    }

    public function display_gallery_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('gallery')->result();
      return $query;
    }

    public function update_gallery_image($id, $image){
      $query = $this->db->query("UPDATE gallery SET image = '$image' WHERE id = '$id' ");
      return $query;
    }

    public function insert_gallery($data){
      $query = $this->db->insert('gallery', $data);
      return $query;
    }

    public function delete_gallery($id){
      $query = $this->db->query("DELETE FROM gallery WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Gallery

     // Edit Services

     public function display_service_content(){
      $query = $this->db->get('service_content')->result();
      return $query;
    }

    public function display_service_content_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('service_content')->result();
      return $query;
    }

    public function delete_service_content($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("service_content");
      return $query;
    }

    public function insert_service_content($data){
      $query = $this->db->insert('service_content', $data);
      return $query;
    }

    public function update_service_price_info($id, $price){
      $query = $this->db->query("UPDATE service_content SET price = '$price' WHERE id = '$id' ");
      return $query;
    }

    public function update_service_title_info($id, $title){
      $query = $this->db->query("UPDATE service_content SET title = '$title' WHERE id = '$id' ");
      return $query;
    }

     // End of Edit Services

     // Edit Footer

     public function display_footer(){
      $query = $this->db->get('footer')->result();
      return $query;
    }

    public function display_footer_by_id($id){
      $this->db->where('id', $id);
      $query = $this->db->get('footer')->result();
      return $query;
    }

    public function insert_footer($data){
      $query = $this->db->insert('footer', $data);
      return $query;
    }

    public function update_footer_info($id, $type){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE footer SET type = '$type' ");
      return $query;
    }

    public function update_footercategory_info($id, $category){
      $this->db->where('id', $id);
      $query = $this->db->query("UPDATE footer SET category = '$category' ");
      return $query;
    }

    public function delete_footer($id){
      $this->db->where('id', $id);
      $query = $this->db->delete("footer");
      return $query;
    }

     // End of Footer

    // User Grid

    public function display_user_grid(){
      $query = $this->db->query("SELECT users.email, users.created_time, users.created_date, users_details.email,
      users_details.firstname, users_details.surname, users_details.telephone, users_details.address1, users_details.address2,
      users_details.region, users_details.state FROM users INNER JOIN users_details ON users.email = users_details.email
      ORDER BY users.created_date DESC ")->result();
      return $query;
    }

    // End of User Grid
  }

?>
