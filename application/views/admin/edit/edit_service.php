<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php foreach($edit_service as $edt_serv){} ?>
		<title>Edit <?php echo str_replace('-', ' ', $edt_serv->title); ?> Services || Admin Beauty Shop</title>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>
      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Dasboard Edit <?php echo $edt_serv->title; ?> Services</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit <?php echo str_replace('-', ' ', $edt_serv->title); ?> Services</span></li>
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
      <h6 class="panel-title txt-dark">Edit Services in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/edit/service/edit_service/'.$edt_serv->id); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Services of the website.</code></p>
          <br>
          <label class="control-label mb-10">Add Service Title</label><br>
          <input type="text" name="title" value="<?php echo str_replace('-', ' ', $edt_serv->title); ?>"/><br>
          <span><?php echo form_error('title'); ?></span>
          <br><p class="text-muted">Add <code> Service Title.</code></p>
          <br><br>

					<div class="form-group">
						<label class="control-label mb-10">Add Service Content</label><br>
						<div class="col-lg-10">
							<input type="text" name="price" value="<?php echo $edt_serv->price; ?>"/><br>
							<span><?php echo form_error('price'); ?></span>
						</div>
					 </div>
          <br>

          <br>
         <button type="submit" name="edit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
      echo $this->session->flashdata('msgEditError');
  ?>

</div>
</div>

</div>
</div>

</div>
<!-- /Row -->

</div>
    <script type="text/javascript">
			$(document).ready(function(){
				$('#banner_type').on('change', function(){
					var type = $(this).val();
					if(type == ''){
						$('#banner_category').prop('disabled', true);
					}else{
						$('#banner_category').prop('disabled', false);
						$.ajax({
							url: "<?php echo base_url('admin/edit/banner/get_banner_menu'); ?>",
							type: "post",
							data: {'type' : type},
							dataType: 'json',
							success: function(data){
								$('#banner_category').html(data);
							},
							error: function(data){
								alert('Error Occurred');
							}
						});
					}
				});
			});
		</script>

	</body>
</html>
