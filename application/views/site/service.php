<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Our Services || Beauty Shop</title>
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
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="breadcrumbs-title">
                            <h2>Shortcode</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>Our Services</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->

        <!--elements start-->
        <div class="elements our-feature ptb-100">
            <div class="container">
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
                                <a href="#">Book now</a>
                            </div>
                        </div>
                    </div>
                  <?php } }else{ echo ''; } ?>
                </div>
            </div>
        </div>
        <!--elements end-->

    </div>
</body>

</html>
