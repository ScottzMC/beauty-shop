<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View My Orders || Beauty Shop</title>
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
                    <li>View My Orders</li>
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
                                        <th class="cart">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if(!empty($my_order)){ foreach($my_order as $my_ord){
                                    $check = array_slice(explode(',', $my_ord->image), 0, 1);

                                    foreach($check as $image) {
                                       $image;
                                    }
                                    ?>
                                    <tr>
                                        <td class="id"><?php echo $my_ord->id; ?></td>
                                        <td class="product_img">
                                          <img alt="cart" style="height: 100px; width: 100px;" src="<?php echo base_url('uploads/products/'.$image); ?>">
                                        </td>
                                        <td class="product_des">
                                            <h3><a href="<?php echo site_url('shop/detail/'.$my_ord->id); ?>"><?php echo $my_ord->title; ?></a></h3>
                                        </td>
                                        <td class="p_quantity">
                                          <h3><?php echo $my_ord->quantity; ?></h3>
                                        </td>
                                        <td class="u_price">&#8358; <?php echo number_format($my_ord->price); ?></td>
                                        <?php if($my_ord->status == "Delivering"){ ?>
                                          <td class="product_des">
                                            <h3>
                                              <div class="alert alert-info">
                                                <?php echo $my_ord->status; ?>
                                              </div>
                                            </h3>
                                          </td>
                                        <?php } ?>
                                        <?php if($my_ord->status == "Delivered"){ ?>
                                          <td class="product_des">
                                            <h3>
                                              <div class="alert alert-success">
                                                <?php echo $my_ord->status; ?>
                                              </div>
                                            </h3>
                                          </td>
                                        <?php } ?>
                                        <?php if($my_ord->status == "Cancelled"){ ?>
                                          <td class="product_des">
                                            <h3>
                                              <div class="alert alert-danger">
                                                <?php echo $my_ord->status; ?>
                                              </div>
                                            </h3>
                                          </td>
                                        <?php } ?>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Cart page end-->

    </div>

</body>

</html>
