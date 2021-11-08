<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Beauty Shop</title>
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
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
         <!-- checkout start -->
        <div class="checkout-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                              <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingSix">
                                      <div class="checkout-step">
                                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#order_review">
                                              <h5>1. ORDER REVIEW</h5>
                                          </a>
                                      </div>
                                  </div>
                                  <div id="order_review" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                      <div class="panel-body">
                                          <div class="order-review">
                                              <div class="table-responsive">
                                                  <table class="table">
                                                      <thead>
                                                          <tr>
                                                              <th class="width-1">Product Name</th>
                                                              <th class="width-2">Price</th>
                                                              <th class="width-3">Qty</th>
                                                              <th class="width-4">Subtotal</th>
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
                                                              <td>
                                                                  <div class="o-pro-dec">
                                                                      <p><?php echo $item['name']; ?></p>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="o-pro-price">
                                                                      <p>&#8358; <?php echo number_format($item['price']); ?></p>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="o-pro-qty">
                                                                      <p><?php echo number_format($item['qty']); ?></p>
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="o-pro-subtotal">
                                                                      <p>&#8358; <?php echo number_format($item['subtotal']); ?></p>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          <?php echo form_close(); ?>
                                                          <?php endforeach; ?>
                                                          <?php endif; ?>
                                                      </tbody>
                                                      <tfoot>
                                                          <tr>
                                                              <td colspan="3">Subtotal </td>
                                                              <td colspan="1">&#8358; <?php echo number_format($item['subtotal']); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="3">Shipping &amp; Handling (Flat Rate - Fixed</td>
                                                              <td colspan="1">&#8358; 400</td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="3"><b>Grand Total</b></td>
                                                              <td colspan="1"><b>&#8358; <?php echo number_format($this->cart->total() + 400); ?></b></td>
                                                          </tr>
                                                      </tfoot>
                                                  </table>
                                              </div>
                                              <div class="block-area-button">
                                                  <span>Forgot an Item?  <a href="<?php echo site_url('shopping/view_cart'); ?>" class="o-back-to"> Edit Your Cart</a></span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingFour">
                                      <div class="checkout-step">
                                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#method">
                                              <h5>2. SHIPPING METHOD</h5>
                                          </a>
                                      </div>
                                  </div>
                                  <div id="method" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                      <div class="panel-body">
                                          <div class="shipping-method">
                                             <p class="large-text">Flat Rate</p>
                                             <p>Fixed &#8358; 400</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <div class="checkout-step active">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#billing">
                                            <h5>3. BILLING INFORMATION</h5>
                                        </a>
                                    </div>
                                </div>
                                <?php foreach($ship as $shp){} ?>
                                <div id="billing" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="inner-step clearfix">
                                            <form class="clearfix" action="<?php echo base_url('shopping/checkout/place_order'); ?>" method="POST">
                                                <input class="first_name" type="text" name="firstname" id="first" placeholder="Enter your Firstname" value="<?php echo $shp->firstname; ?>">
                                                <span class="text-danger"><?php echo form_error('firstname'); ?></span>
                                                <input class="last_name" type="text" name="surname" id="last" placeholder="Enter your Surname" value="<?php echo $shp->surname; ?>">
                                                <span class="text-danger"><?php echo form_error('surname'); ?></span>
                                                <input class="company_name" type="text" name="address1" id="company" placeholder="Enter your First Address" value="<?php echo $shp->address1; ?>">
                                                <span class="text-danger"><?php echo form_error('address1'); ?></span>
                                                <input class="street_name" type="text" name="address2" id="street" placeholder="Enter your Second Address" value="<?php echo $shp->address2; ?>">
                                                <span class="text-danger"><?php echo form_error('address2'); ?></span>
                                                <input class="city_name" type="text" name="region" id="city" placeholder="Enter your Region" value="<?php echo $shp->region; ?>">
                                                <span class="text-danger"><?php echo form_error('region'); ?></span>
                                                <input class="post_code" type="text" name="telephone" id="post" placeholder="Enter your Telephone Number" value="<?php echo $shp->telephone; ?>">
                                                <span class="text-danger"><?php echo form_error('telephone'); ?></span>
                                                <div class="form-footer">
                                                    <input type="submit" value="Place Order">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                        <div class="checkout-right">
                            <div class="checkout-progress">
                                <h4>your checkout progress</h4>
                            </div>
                            <ul>
                                <li><a href="#">- Order Review</a></li>
                                <li><a href="#">- Shipping Method</a></li>
                                <li><a href="#">- Billing Information</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout end -->

    </div>

</body>

</html>
