<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome to Beauty Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="boxed-layout">
        <div class="wrapper white-bg">

        <!--slider section start-->
            <div class="slider-content parallax">
                <div class="slider-text-table">
                    <div class="slider-text-tablecell">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="slide1-text">
                                        <div class="middle-text">
                                            <div class="title-1 cd-headline zoom wow wow slideInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                                                <h1>welcome our beauty
                                                    <span class="cd-words-wrapper">
                                                    <b class="is-visible"> house</b>
                                                    <b>parlur</b>
                                                    <b>shop</b>
                                                </span>
                                                </h1>
                                            </div>
                                            <div class="desc wow slideInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel volutpat felis, eu condimentum<br> massa.lorem ipsum dolor sit amet,consectetur adipicing elit.</p>
                                            </div>
                                            <div class="explore-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                                <a href="#">Explore now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--slider section end-->
            <!--welcome section start-->
            <div class="welcome-about">
                <div class="container">
                  <?php if(!empty($banner)){ foreach($banner as $ban){ ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="about-img">
                                <img src="<?php echo base_url('uploads/banners/'.$ban->image); ?>" alt="<?php echo $ban->image; ?>">
                            </div>
                        </div>
                        <?php if(!empty($about_info)){ foreach($about_info as $abt_inf){ ?>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="about-desc">
                                <h2><?php echo $abt_inf->title; ?></h2>
                                <p class="text-1"><?php echo $abt_inf->body; ?></p>
                                <a href="<?php echo site_url('about'); ?>">Read more</a>
                            </div>
                        </div>
                      <?php } }else{ echo ''; } ?>
                    </div>
                  <?php } }else{ echo ''; } ?>
                </div>
            </div>
            <!--welcome section end-->

            <!--Gallery section start-->
            <div class="galllery ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="section-title text-center">
                                <h2>our latest gallery</h2>
                                <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-tab-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="gallery-tab-menu text-center">
                                    <ul role="tablist">
                                        <li role="presentation"><a href="#all" aria-controls="all" data-toggle="tab">All</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-tab-content">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="all">
                                <div class="single-gallery-list owl_pagination">
                                    <?php if(!empty($gallery)){ foreach($gallery as $gal){ ?>
                                    <div class="single-gallery">
                                        <div class="gallery-img">
                                            <img src="<?php echo base_url('uploads/gallery/'.$gal->image); ?>" alt="<?php echo $gal->image; ?>">
                                            <a href="<?php echo base_url('uploads/gallery/'.$gal->image); ?>"><i class="zmdi zmdi-zoom-in"></i></a>
                                        </div>
                                    </div>
                                  <?php } }else{ echo ''; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Gallery section end-->

            <!--Our feature section-->
            <div class="our-feature ptb-100">
                <div class="container">
                   <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="section-title text-center">
                                <h2>Our Services</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <?php if(!empty($service)){ foreach($service as $serv){ ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-feature text-center">
                                <div class="feature-img">
                                    <img src="images/feature/1.png" alt="">
                                </div>
                                <div class="feature-desc">
                                    <h3><a href="#"><?php echo $serv->title; ?></a></h3>
                                    <p>&#8358; <?php echo number_format($serv->price); ?></p>
                                    <a href="<?php echo site_url('service'); ?>">Book now</a>
                                </div>
                            </div>
                        </div>
                      <?php } }else{ echo ''; } ?>
                    </div>
                </div>
            </div>
            <!--Our feature section end-->


            <!--Testimonial start
            <div class="testimonial">
                <div class="bg-img">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <div class="testimonail-list owl_pagination">
                                    <div class="single-testimonial">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                        <h3>sathi bhuiyan</h3>
                                        <p class="title">Manager</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                        <h3>sathi bhuiyan</h3>
                                        <p class="title">Manager</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                        <h3>sathi bhuiyan</h3>
                                        <p class="title">Manager</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                        <h3>sathi bhuiyan</h3>
                                        <p class="title">Manager</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p><i class="fa fa-quote-left" aria-hidden="true"></i>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley </p>
                                        <h3>sathi bhuiyan</h3>
                                        <p class="title">Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Testimonial end-->

            <!--Our partener start-->
            <div class="our-partner">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
            <!--Our partener end-->

        </div>
    </div>

</body>

</html>
