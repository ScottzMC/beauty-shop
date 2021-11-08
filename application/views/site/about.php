<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Us || Beauty Shop</title>
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
                            <h2>About us</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->

        <!--About us start-->
        <div class="about-us ptb-100">
            <div class="container">
                <div class="row">
                  <?php if(!empty($about)){ foreach($about as $abt){} ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="about-desc">
                            <h2><?php echo $abt->title; ?></h2>
                            <p class="text-1"><?php echo $abt->body; ?></p>
                        </div>
                    </div>
                  <?php }else{ echo ''; } ?>
                  <?php if(!empty($banner)){ foreach($banner as $ban){} ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="about-us-img">
                            <img src="<?php echo base_url('uploads/banners/'.$ban->image); ?>" alt="<?php echo $ban->image; ?>">
                        </div>
                    </div>
                  <?php }else{ echo ''; } ?>
                </div>
            </div>
        </div>
        <!--About us end-->

        <!--choose us start
        <div class="choose-us ptb-100 grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title bg_grey text-center">
                            <h2>why choose us?</h2>
                            <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <div class="choose-us-img">
                            <img src="images/about/choose.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="choose-us-list">
                            <div class="single-choose">
                                <div class="choose-head">
                                    <div class="choose-icon">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </div>
                                    <div class="choose-title">
                                        <h5>Beautiful & sexy Life</h5>
                                    </div>
                                </div>
                                <div class="choose-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis . </p>
                                </div>
                            </div>
                            <div class="single-choose">
                                <div class="choose-head">
                                    <div class="choose-icon">
                                        <i class="fa fa-pagelines" aria-hidden="true"></i>
                                    </div>
                                    <div class="choose-title">
                                        <h5>natural atmosphere</h5>
                                    </div>
                                </div>
                                <div class="choose-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis . </p>
                                </div>
                            </div>
                            <div class="single-choose">
                                <div class="choose-head">
                                    <div class="choose-icon">
                                        <i class="zmdi zmdi-mood"></i>
                                    </div>
                                    <div class="choose-title">
                                        <h5>xoss environment</h5>
                                    </div>
                                </div>
                                <div class="choose-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis . </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--choose us end-->

        <!--our team start
        <div class="our-team ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Our lovely team</h2>
                            <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim nostrud exercitation ullamco laboris nisi.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="single-team">
                            <div class="team-img">
                                <img src="images/about/team/1.png" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="team-desc">
                                    <div class="team-desc-tablcell">
                                        <h5>jesika noor</h5>
                                        <h6>Specialist</h6>
                                        <p> Lorem ipsum dolor sit amet, cons adipisicing elit, sed do eiusmo te incididunt ut labore. </p>
                                        <div class="member-follow">
                                            <p>Follow on:</p>
                                            <div class="member-follow-social">
                                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                                <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="single-team">
                            <div class="team-img">
                                <img src="images/about/team/2.png" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="team-desc">
                                    <div class="team-desc-tablcell">
                                        <h5>jesika noor</h5>
                                        <h6>Specialist</h6>
                                        <p> Lorem ipsum dolor sit amet, cons adipisicing elit, sed do eiusmo te incididunt ut labore. </p>
                                        <div class="member-follow">
                                            <p>Follow on:</p>
                                            <div class="member-follow-social">
                                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                                <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="single-team">
                            <div class="team-img">
                                <img src="images/about/team/3.png" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="team-desc">
                                    <div class="team-desc-tablcell">
                                        <h5>jesika noor</h5>
                                        <h6>Specialist</h6>
                                        <p> Lorem ipsum dolor sit amet, cons adipisicing elit, sed do eiusmo te incididunt ut labore. </p>
                                        <div class="member-follow">
                                            <p>Follow on:</p>
                                            <div class="member-follow-social">
                                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                                <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm col-xs-12">
                        <div class="single-team">
                            <div class="team-img">
                                <img src="images/about/team/1.png" alt="">
                            </div>
                            <div class="team-hover">
                                <div class="team-desc">
                                    <div class="team-desc-tablcell">
                                        <h5>jesika noor</h5>
                                        <h6>Specialist</h6>
                                        <p> Lorem ipsum dolor sit amet, cons adipisicing elit, sed do eiusmo te incididunt ut labore. </p>
                                        <div class="member-follow">
                                            <p>Follow on:</p>
                                            <div class="member-follow-social">
                                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                                <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                                <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--our team end-->

    </div>

</body>

</html>
