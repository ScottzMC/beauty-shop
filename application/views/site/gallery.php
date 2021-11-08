<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Our Gallery || Beauty Shop</title>
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
                            <h2>Our Gallery</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>Our Gallery</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
        <!--our gallery section start-->
        <?php if(!empty($gallery)){ ?>
        <div class="our-gallery gallery-pages ptb-100 fix">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>all abeauty house images</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($gallery as $gal){ ?>
            <div class="gallery-list fix">
                <div class="single-gallery">
                    <div class="gallery-img">
                        <img src="<?php echo base_url('uploads/gallery/'.$gal->image); ?>" alt="<?php echo $gal->image; ?>">
                        <a href="<?php echo base_url('uploads/gallery/'.$gal->image); ?>"><i class="zmdi zmdi-zoom-in"></i></a>
                    </div>
                </div>
            </div>
          <?php } ?>
            <!--pagintaion-->
            <div class="pagination-box text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pagination-inner">
                              <?php
                                echo $this->pagination->create_links();
                              ?>
                                <!--<ul>
                                    <li><a href="#"><i class="zmdi zmdi-caret-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="active">3</li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right"></i></a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--pagintaion end-->
        </div>
      <?php }else{ echo ''; } ?>
        <!--our gallery section end-->

    </div>

</body>

</html>
