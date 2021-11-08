<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login || Beauty Shop</title>
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
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>

        <!--Contact form start-->
        <div class="contact-form ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Login to Account</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <p class="form-messege"></p>
                            <form class="contact-form" action="<?php echo base_url('account/login'); ?>" method="post">
                                <input name="email" type="email" placeholder="Email Address">
                                <span class="text-danger" style="color: red;"><?php echo form_error('email'); ?></span>
                                <input name="password" type="password" placeholder="Password">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                                <button type="submit" name="login">Login</button>
                            </form>
                            <?php
                              echo $this->session->flashdata('msgError');
                            ?>
                            <br>
                            Not registered? <a href="<?php echo site_url('account/register'); ?>">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact form end-->

    </div>

</body>

</html>
