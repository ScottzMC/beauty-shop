<!-- Place favicon.ico in the root directory -->
<link href="<?php echo base_url('images/apple-touch-icon.png'); ?>" type="images/x-icon" rel="shortcut icon">
<!-- All css files are included here. -->
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/core.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/responsive.css'); ?>">
<!-- customizer style css -->
<link href="#" data-style="styles" rel="stylesheet">
<!-- Modernizr JS -->
<script src="<?php echo base_url('js/vendor/modernizr-2.8.3.min.js'); ?>"></script>

<!--header section start-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 hidden-xs">
                    <div class="header-left">
                        <div class="call-center">
                            <p><i class="zmdi zmdi-phone"></i>(+880) 01656300176</p>
                        </div>
                        <div class="mail-address">
                            <p><i class="zmdi zmdi-email"></i>breed@gmail.com</p>
                        </div>
                        <?php if(!empty($this->session->userdata('uemail'))){ ?>
                        <div class="mail-address">
                          <a href="<?php echo site_url('shopping/view_order'); ?>">
                            <p><i class="zmdi zmdi-shopping-cart"></i>My Orders</p>
                          </a>
                        </div>
                      <?php }else{ echo ''; } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="social-icons">
                        <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                        <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                        <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="mgea-full-width">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-9">
                        <div class="logo">
                            <a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url('images/logo/logo.png'); ?>" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-md-8 hidden-sm hidden-xs">
                        <div class="menu">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('shop'); ?>">Shop</a></li>
                                    <li><a href="<?php echo site_url('gallery'); ?>">Gallery</a></li>
                                    <?php if($this->session->userdata('ustatus') == "Admin"){ ?>
                                    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Admin</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('login')){ ?>
                                    <li><a href="<?php echo site_url('account/logout'); ?>">Logout</a></li>
                                  <?php }else{ ?>
                                    <li><a href="<?php echo site_url('account/login'); ?>">Login</a></li>
                                    <li><a href="<?php echo site_url('account/register'); ?>">Register</a></li>
                                  <?php } ?>
                                    <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-3">
                        <div class="header-action-box">
                            <div class="mini-cart" >
                                <div class="cart-icon">
                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                    <span><?php echo $this->cart->total_items(); ?></span>
                                </div>
                                <!-- Mini Cart -->
                                <div class="mini-cart-box right">
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
                                    <div class="mini-cart-product fix">
                                        <a href="#" class="image"><img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $item['name']; ?>" /></a>
                                        <div class="content fix">
                                            <a href="<?php echo site_url('shop/detail/'.$item['id']); ?>" class="title"><?php echo str_replace('-', ' ', $item['name']); ?></a>
                                            <p>Color: Black</p>
                                            <p>Quantity: <?php echo $item['qty']; ?></p>
                                            <a class="remove" href="<?php echo base_url('shopping/view_cart/remove/'.$item['rowid']); ?>"><i class="zmdi zmdi-close"></i></a>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <div class="mini-cart-checkout text-center">
                                        <a href="<?php echo site_url('shopping/view_cart'); ?>">View Cart</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                            <div class="search">
                                <a href="#"><i class="zmdi zmdi-search"></i></a>
                            </div>
                        </div>
                        <div class="search-box">
                            <div class="search-form">
                                <form action="shop/search" id="search-form" method="post">
                                    <input type="search" name="search_query" placeholder="Search here...">
                                    <button type="submit" name="search">
                                        <span><i class="fa fa-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu start -->
        <div class="mobile-menu-area hidden-lg hidden-md">
            <div class="container">
                <div class="col-md-12">
                    <nav id="dropdown">
                      <ul>
                          <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                          <li><a href="#">Shop</a></li>
                          <li><a href="#">Gallery</a></li>
                          <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                          <li><a href="<?php echo site_url('register'); ?>">Register</a></li>
                          <li><a href="#">Contact Us</a></li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Mobile menu end -->
    </div>
 </div>
<!--header section end-->
