<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Cart || Beauty Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="wrapper white-bg">
        <!--Breadcrumbs start-->
        <div class="breadcrumbs text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs-title">
                            <h2>Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>View Shopping Cart</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
        <!--Cart page start-->
        <div class="cart-page ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart_list table-responsive">
                            <table class="table_cart table-bordered">
                                <thead>
                                    <tr>
                                        <th class="id">#</th>
                                        <th class="product">Image</th>
                                        <th class="description">Product Name</th>
                                        <th class="quantity">Quantity</th>
                                        <th class="price">Price</th>
                                        <th class="cart">Total</th>
                                        <th class="action">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <div><?php echo $message; ?></div>
                                  <?php if ($cart = $this->cart->contents()): ?>
                                  <?php $grand_total = 0; $i = 1; ?>
                                  <?php foreach($cart as $item):
                                      $check = array_slice(explode(',', $item['image']), 0, 1);

                                      foreach($check as $image) {
                                         $image;
                                      }
                                   ?>
                                  <?php echo form_open('shopping/view_cart/update_cart'); ?>
                                  <?php
                                    echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
                                    echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
                                    echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
                                    echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
                                  ?>
                                    <tr>
                                        <td class="id"><?php echo $item['id']; ?></td>
                                        <td class="product_img">
                                        <a href="<?php echo site_url('shop/detail/'.$item['id']); ?>">
                                          <img alt="cart" style="height: 100px; width: 100px;" src="<?php echo base_url('uploads/products/'.$image); ?>">
                                        </a>
                                        </td>
                                        <td class="product_des">
                                            <h3><a href="<?php echo site_url('shop/detail/'.$item['id']); ?>"><?php echo $item['name']; ?></a></h3>
                                        </td>
                                        <td class="p_quantity">
                                              <?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="width: 50%" '); ?>
                                        </td>
                                        <td class="u_price">&#8358; <?php echo number_format($item['price']); ?></td>
                                        <td class="u_price">&#8358; <?php echo number_format($this->cart->total()); ?></td>
                                        <td class="p_action">
                                            <a title="Remove" href="<?php echo base_url('shopping/view_cart/remove/'.$item['rowid']); ?>"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
                                    </tr>
                                    <?php echo form_close(); ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                        <a href="<?php echo site_url('shop'); ?>" class="continue-shopping">continue shopping</a>
                    </div>
                    <?php if($this->cart->contents()){ ?>
                    <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                        <div class="total text-right">
                            <h2>subtotal <span>&#8358; <?php echo number_format($item['subtotal']); ?></span></h2>
                            <h2 class="strong">grandtotal <span>&#8358; <?php echo number_format($this->cart->total()); ?></span></h2>
                            <?php if(!empty($this->session->userdata('uemail'))){ ?>
                            <a href="<?php echo site_url('shopping/checkout'); ?>" class="continue-shopping">Proceed to Checkout</a>
                          <?php }else{ ?>
                            <div class="alert alert-danger">
                              Please Login to Order Product
                            </div>
                          <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--Cart page end-->

    </div>

</body>

</html>
