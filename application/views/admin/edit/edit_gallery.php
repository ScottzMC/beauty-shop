<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_gallery as $edt_gal){}?>
		<title>Edit <?php echo $edt_gal->image; ?> Gallery || Admin Beauty Shop</title>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>

      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Edit <?php echo $edt_gal->image; ?> Gallery</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website Details</span></a></li>
  <li><a href="<?php echo site_url('admin/edit/gallery'); ?>">Edit Gallery</a></li>
  <li class="active"><span>Edit <?php echo $edt_gal->image; ?> Gallery</span></li>
</ol>
</div>
<!-- /Breadcrumb -->
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Gallery in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <form action="<?php echo base_url('admin/edit/gallery/edit_gallery/'.$edt_gal->id); ?>" method="post" enctype="multipart/form-data" role="form">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Banner from the different parts on the website from here.</code> eg - Banner 1.</p>
      <div class="tags-default mt-40">
        <?php if(!empty($edit_gallery)){ foreach($edit_gallery as $edt_gal){ ?>
          <br>
          <img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/gallery/'.$edt_gal->image); ?>">
          <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </button>
          <br>
          <input type="file" name="fileBanner[]">
          <br>
          <h5><?php echo $edt_gal->image; ?></h5>
          <br>
        <?php } }else{ echo ''; } ?>
      </div>
    </form>
    </div>
  </div>

</div>
</div>

</div>
<!-- /Row -->

</div>

	</body>
</html>
