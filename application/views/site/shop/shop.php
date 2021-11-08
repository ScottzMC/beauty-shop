<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Our Shop || Beauty Shop</title>
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
                            <h2>Shop page</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-menu">
                <ul>
                    <li><a href="<?php echo site_url('home'); ?>">Home <span>//</span></a></li>
                    <li>Shop</li>
                </ul>
            </div>
        </div>
        <!--Breadcrumbs end-->
        <!--shop page start-->
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
                                <?php if(!empty($menu)){ foreach($menu as $men){ ?>
                                <div class="widget-categories">
                                    <!--Accordion item 1-->
                                    <h6><?php echo $men->type; ?></h6>
                                    <ul>
                                      <?php
                                        $query = $this->db->query("SELECT category FROM menu WHERE type = '$men->type' ")->result();
                                        foreach($query as $qry){
                                      ?>
                                        <li><a href="#"><?php echo $qry->category; ?></a></li>
                                      <?php } ?>
                                    </ul>
                                    <!--Accordion item 1 end-->
                                </div>
                              <?php } }else{ echo ''; } ?>
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

                        <?php if(!empty($shop)){ ?>
                        <div class="tab-content">
                            <div id="grid" class="tab-pane active" role="tabpanel">
                                <div class="row">
                                  <?php foreach($shop as $shp){
                                    $check = array_slice(explode(',', $shp->image), 0, 1);

                                    foreach($check as $image){
                                      $image;
                                    }
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-feature text-center">
                                            <div class="feature-img">
                                                <img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $shp->title; ?>">
                                            </div>
                                            <div class="feature-desc">
                                                <h3><a href="<?php echo site_url('shop/detail/'.$shp->id); ?>"><?php echo $shp->title; ?></a></h3>
                                                <p>&#8358; <?php echo number_format($shp->price); ?></p>
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
                                <!--pagintaion end-->

                            </div>
                            <div id="list" class="tab-pane" role="tabpanel">
                                <div class="row">
                                  <?php foreach($shop as $shp){
                                    $check = array_slice(explode(',', $shp->image), 0, 1);

                                    foreach($check as $image){
                                      $image;
                                    }
                                    ?>
                                    <div class="shop-product-list col-md-12">
                                        <div class="single-product">
                                            <div class="single-product-img">
                                                <a href="<?php echo site_url('shop/detail/'.$shp->id); ?>"><img src="<?php echo base_url('uploads/products/'.$image); ?>" alt="<?php echo $shp->title; ?>"></a>
                                            </div>
                                            <div class="single-product-info">
                                                <h3><a href="<?php echo site_url('shop/detail/'.$shp->id); ?>"><?php echo $shp->title; ?></a></h3>
                                                <h4>&#8358; <?php echo number_format($shp->price); ?></h4>
                                                <div class="singe-product-desc">
                                                    <p><?php echo character_limiter($shp->description, 100); ?></p>
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
                                <!--pagintaion end-->
                            </div>
                        </div>
                      <?php }else{ echo ''; } ?>
                    </div>
                    <!--shop sidebar end-->
                </div>
            </div>
        </div>
        <!--shop page end-->

    </div>

</body>

</html>
