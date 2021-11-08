<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php foreach($detail as $det){}	?>
    <title><?php echo $det->title; ?> || Beauty Shop</title>
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
                            <h2><?php echo $det->title; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                  <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                  <li><a href="<?php echo site_url('shop'); ?>">Our Shop <span>//</span></a></li>
                  <li><?php echo $det->title; ?></li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
        <!-- product details start -->
        <div class="product-details-area  ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                       <div class="zoomWrapper clearfix">
                            <div id="img-1" class="zoomWrapper single-zoom">
                              <?php $check = array_slice(explode(',', $det->image), 0, 1);

                              foreach($check as $image){
                                $image;
                              }
                              ?>
                                <a href="#">
                                    <img id="zoom1" src="<?php echo base_url('uploads/products/'.$image); ?>" data-zoom-image="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $det->title; ?>">
                                </a>
                            </div>
                            <div class="product-thumb">
                                <ul class="details-slider" id="gallery_01">
                                  <?php $check = explode(',', $det->image);

                                  foreach($check as $image){
                                    $image;
                                  ?>
                                    <li>
                                        <a class="elevatezoom-gallery" href="#" data-image="<?php echo base_url('uploads/products/'.$image); ?>" data-zoom-image="<?php echo base_url('uploads/products/'.$image); ?>">
                                          <img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $det->title; ?>">
                                        </a>
                                    </li>
                                  <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="product-detail single-product-info">
                            <h3><?php echo $det->title; ?></h3>
                            <h4>&#8358; <?php echo number_format($det->price); ?></h4>
                            <h5 class="overview">OVERVIEW:</h5>
                            <p><?php echo $det->description; ?></p>

                            <div class="categories-size mt-20">
                                <p class="size">Color:</p>
                                <a href="#"><?php echo $det->color; ?> </a>
                            </div>
                            <br><br>

                            <?php if(!empty($this->session->userdata('uemail'))){ ?>
                            <ul class="product-action">
                              <form action="<?php echo base_url('shopping/view_cart/add'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $det->id; ?>">
                                <input type="hidden" name="product_code" value="<?php echo $det->product_code; ?>">
                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                <input type="hidden" name="type" value="<?php echo $det->type; ?>">
                                <input type="hidden" name="category" value="<?php echo $det->category; ?>">
                                <input type="hidden" name="price" value="<?php echo $det->price; ?>">
                                <input type="hidden" name="image" value="<?php echo $det->image; ?>">
                                <li><button class="add-to-cart" type="submit">Add to Cart</button></li>
                                </form>
                            </ul>
                          <?php }else{ ?>
                            <span class="alert alert-danger">
                              Login to Add to Cart
                            </span>
                          <?php } ?>
                            <!--<div class="share mt-30">
                               <p>share:</p>
                               <ul>
                                   <li class="facebook"><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                   <li class="twitter"><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                   <li class="pinterest"><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                   <li class="google-plus"><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                               </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="product-description-tab mt-60">
                                <div class="description-tab-menu">
                                    <ul class="clearfix" role="tablist">
                                        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                       <p><?php echo $det->description; ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="review">
                                      <?php
                                        $query = $this->db->query("SELECT * FROM product_review WHERE product_code = '$det->product_code'
                                        AND product_id = '$det->id' ")->result();

                                        if(!empty($query)){
                                       ?>
                                        <div class="review-wrapper fix">
                                            <?php foreach($query as $qry){ ?>
                                            <div class="sin-review">
                                                <div class="review-details fix">
                                                    <div class="review-author float-left">
                                                      <h3><?php echo $qry->fullname; ?></h3>
                                                        <span><?php echo date('j M Y', strtotime($qry->created_date)); ?> at <?php echo date('H:i:s', strtotime($qry->created_date)); ?></span>
                                                    </div>
                                                    <p><?php echo $qry->description; ?></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                      <?php }else{ echo ''; } ?>

                                        <div class="review-form-wrapper fix">
                                            <h3>write a review</h3>
                                            <div class="review-form">
                                                <form action="<?php echo base_url('shop/detail/'.$det->id); ?>" method="post">
                                                    <div class="input-box-2 fix">
                                                        <div class="input-box float-left">
                                                            <input id="name" name="fullname" placeholder="Type your name" type="text">
                                                            <span class="text-danger" style="color: red;"><?php echo form_error('fullname'); ?></span>
                                                        </div>
                                                        <div class="input-box float-left">
                                                            <input name="email" placeholder="Type your email address" value="<?php echo $this->session->userdata('uemail'); ?>" type="text">
                                                            <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="input-box review-box fix">
                                                        <textarea name="description" placeholder="Write your review"></textarea>
                                                        <span class="text-danger" style="color: red;"><?php echo form_error('description'); ?></span>
                                                    </div>
                                                    <div class="input-box submit-box fix">
                                                        <input value="submit review" type="submit" name="submit">
                                                    </div>
                                                </form>
                                                <?php
                                                  echo $this->session->flashdata('msgError');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Related products start-->
            <div class="related-products mt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="section-title text-center">
                                <h2>Related product</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="related-product-list">
                          <?php
                          $query = $this->db->query("SELECT id, title, price, image FROM product WHERE type = '$det->type' ")->result();
                          if(!empty($query)){ foreach($query as $qry){
                            $check = array_slice(explode(',', $qry->image), 0, 1);

                            foreach($check as $image){
                              $image;
                            }
                            ?>
                            <div class="col-md-3">
                                <div class="single-feature text-center">
                                    <div class="feature-img">
                                        <img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $qry->title; ?>">
                                    </div>
                                    <div class="feature-desc">
                                        <h3><a href="<?php echo site_url('shop/detail/'.$qry->id); ?>"><?php echo $qry->title; ?></a></h3>
                                        <p>&#8358; <?php echo number_format($qry->price); ?></p>
                                    </div>
                                </div>
                            </div>
                          <?php } }else{ echo ''; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Related products end-->
        </div>
        <!-- product details end -->

    </div>

</body>

</html>
