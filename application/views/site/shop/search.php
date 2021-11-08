<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $search_query = $_POST['search_query']; ?>
    <title>Search (<?php echo $search_query; ?>) Result || Beauty Shop</title>
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
                            <h2><?php echo $search_query; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                  <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                  <li><a href="<?php echo site_url('shop'); ?>">Shop <span>//</span></a></li>
                  <li><?php echo $search_query; ?></li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
        <!--shop page start-->
        <?php if(!empty($search)){ ?>
        <div class="shop-page ptb-100">
            <div class="container">
                <div class="row">
                    <!--shop sidebar start-->
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="shop sidebar">
                            <aside class="widget categories grey-bg mb-30">
                                <div class="widget-title">
                                    <h3>categories</h3>
                                </div>
                                <div class="widget-categories">
                                    <!--Accordion item 1-->
                                    <h6>Face treatment</h6>
                                    <ul>
                                        <li><a href="#">Face wash</a></li>
                                        <li><a href="#">Cream</a></li>
                                    </ul>
                                    <!--Accordion item 1 end-->

                                    <!--Accordion item 2 start-->
                                    <h6>Nail treatment</h6>
                                    <ul>
                                        <li><a href="#">Nail tratment 1</a></li>
                                        <li><a href="#">Nail tratment 2</a></li>
                                    </ul>
                                    <!--Accordion item 2 end-->

                                    <!--Accordion item 3 start-->
                                    <h6>Hair treatment</h6>
                                    <ul>
                                        <li><a href="#">Hair cut</a></li>
                                        <li><a href="#">Hair shampo</a></li>
                                    </ul>
                                    <!--Accordion item 3 end-->

                                    <!--Accordion item 4 start-->
                                    <h6 class="open">Body treatment</h6>
                                        <ul>
                                            <li><a href="#">Oil message</a></li>
                                            <li><a href="#">Stone message</a></li>
                                    </ul>
                                    <!--Accordion item 4 end-->

                                </div>
                            </aside>
                            <aside class="widget filter grey-bg mb-30">
                                <div class="widget-title">
                                    <h3>filter by price</h3>
                                </div>
                                <div class="widget-filter">
                                    <div class="price-filter">
                                        <div id="slider-range"></div>
                                        <div class="price-slider-amount">
                                           <div class="slider-values">
                                                <label>Range</label>
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="shop-item-filter">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="shop-tab clearfix">
                                            <!-- Nav tabs -->
                                            <ul role="tablist">
                                                <li role="presentation" class="active"><a data-toggle="tab" role="tab" aria-controls="grid" class="grid-view" href="#grid"><i class="zmdi zmdi-apps"></i></a></li>
                                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list" class="list-view" href="#list"><i class="zmdi zmdi-view-list-alt"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6  col-xs-12">
                                        <div class="filter-by">
                                            <div class="filter-title">
                                                <p>Sort by: </p>
                                            </div>
                                            <div class="filter-form">
                                                <form action="#">
                                                    <select>
                                                        <option selected="selected" value="">Newest items</option>
                                                        <option value="trending">Trending items</option>
                                                        <option value="sales">Best sellers</option>
                                                        <option value="rating">Best rated</option>
                                                        <option value="price-asc">Price: low to high</option>
                                                        <option value="price-desc">Price: high to low</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(!empty($search)){ ?>
                        <div class="tab-content">
                            <div id="grid" class="tab-pane active" role="tabpanel">
                                <div class="row">
                                  <?php foreach($search as $sea){
                                    $check = array_slice(explode(',', $sea->image), 0, 1);

                                    foreach($check as $image){
                                      $image;
                                    }
                                  ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-feature text-center">
                                            <div class="feature-img">
                                                <img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $sea->title; ?>">
                                            </div>
                                            <div class="feature-desc">
                                                <h3><a href="<?php echo site_url('shop/detail/'.$sea->id); ?>"><?php echo $sea->title; ?></a></h3>
                                                <p>&#8358; <?php echo number_format($sea->price); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } ?>
                                </div>
                                <!--pagintaion-->
                                <div class="pagination-box text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pagination-inner">
                                              <?php
                                                echo $this->pagination->create_links();
                                              ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--pagintaion end-->

                            </div>
                            <div id="list" class="tab-pane" role="tabpanel">
                                <div class="row">
                                  <?php foreach($search as $sea){
                                    $check = array_slice(explode(',', $sea->image), 0, 1);

                                    foreach($check as $image){
                                      $image;
                                    }
                                   ?>
                                    <div class="shop-product-list col-md-12">
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                <a href="#"><img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $sea->title; ?>"></a>
                                            </div>
                                            <div class="single-product-info">
                                                <h3><a href="#"><?php echo $sea->title; ?></a></h3>
                                                <h4>&#8358; <?php echo number_format($sea->price); ?></h4>
                                                <div class="singe-product-desc">
                                                    <p><?php echo character_limiter($sea->description, 100); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } ?>
                                </div>
                                <!--pagintaion-->
                                <div class="pagination-box text-center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pagination-inner">
                                              <?php
                                                echo $this->pagination->create_links();
                                              ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--pagintaion end-->
                            </div>
                        </div>
                      <?php }else{ echo ''; } ?>
                    </div>
                    <!--shop sidebar end-->
                </div>
            </div>
        </div>
      <?php }else{ ?>
        <div class="alert alert-danger">
          <h1>No Search Result Found</h1>
        </div>
      <?php } ?>
        <!--shop page end-->

    </div>

</body>

</html>
