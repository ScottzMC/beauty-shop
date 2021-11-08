<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit Gallery || Admin Beauty Shop</title>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>

      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Edit My Website Gallery</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website Details</span></a></li>
  <li class="active"><span>Edit My Website Gallery</span></li>
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
      <h6 class="panel-title txt-dark">Gallery in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>
		function delete_gallery(id){
			var gallery_id = id;
			if(confirm("Are you sure you want to delete this gallery?")){
			$.post('<?php echo base_url('admin/edit/gallery/delete_gallery'); ?>', {"gallery_id": gallery_id}, function(data){
				location.reload();
				$('#cte').html(data)
				});
			}
		}
	</script>
	<p id='cte'></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Gallery from the different parts on the website from here.</code> eg - Banners 1.</p>
      <div class="tags-default mt-40">
				<?php if(!empty($gallery)){ foreach($gallery as $gal){ ?>
					<br>
					<img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/gallery/'.$gal->image); ?>">
					<button type="button" onclick="delete_gallery(<?php echo $gal->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
						<i class="fa fa-trash"></i>
					</button>
					<br>
					<h6><?php echo str_replace('-', ' ', $gal->image); ?></h6>
        <?php } }else{ echo ''; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Gallery in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <form action="<?php echo base_url('admin/edit/gallery/add_gallery'); ?>" method="post" enctype="multipart/form-data" role="form">
	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Add <code>Gallery on the website from here.</code> eg - Slider 1.</p>
					<input type="file" name="fileBanner[]">
					<br>
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
    </div>
  </div>
</form>

<br>

  <?php
      echo $this->session->flashdata('msgGalleryError');
  ?>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Gallery in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Gallery from the different parts on the website from here.</code> eg - Banners 1.</p>
      <div class="tags-default mt-40">
				<?php if(!empty($gallery)){ foreach($gallery as $gal){ ?>
					<br>
					<img style="width: 170px; height: 120px;" src="<?php echo base_url('uploads/gallery/'.$gal->image); ?>">
					<br>
					<h5><?php echo str_replace('-', ' ', $gal->image); ?></h5>
					<br>
          <a href="<?php echo site_url('admin/edit/gallery/edit_gallery/'.$gal->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>
        <?php } }else{ echo ''; } ?>
      </div>
    </div>
  </div>

</div>
</div>

</div>
<!-- /Row -->

</div>

	</body>
</html>
