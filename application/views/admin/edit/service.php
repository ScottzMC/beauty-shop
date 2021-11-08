<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Website Services || Admin Beauty Shop</title>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>
      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Dasboard Edit My Website Services</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit My Website Services</span></li>
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
      <h6 class="panel-title txt-dark">Services in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>

	function delete_service(id){
    var service_id = id;
    if(confirm("Are you sure you want to delete this Service")){
    $.post('<?php echo base_url('admin/edit/service/delete_service'); ?>', {"service_id": service_id}, function(data){
      location.reload();
      $('#cta').html(data)
      });
    }
  }
  </script>
	<p id="cta"></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Services on the website from here.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($service)){ foreach($service as $serv){ ?>
					<br>
					<h5><?php echo str_replace('-', ' ', $serv->title); ?></h5><br>
					<p>&#8358; <?php echo number_format($serv->price); ?></p><br>
          <br>
          <button type="button" onclick="delete_service(<?php echo $serv->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
					<br>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Service</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Service in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/edit/service/add_service'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Services of the website from here.</code></p>
          <br>

          <label class="control-label mb-10">Add Services Title</label><br>
          <input type="text" name="title" placeholder="Add Title"/><br>
          <span><?php echo form_error('title'); ?></span>
          <br><p class="text-muted">Add <code> Services Title of the Website.</code></p>
          <br><br>

					<div class="form-group">
						<label class="control-label mb-10">Add Service Price</label><br>
						<div class="col-lg-10">
							<input type="text" name="price" placeholder="&#8358; 20000"/><br>
		          <span><?php echo form_error('price'); ?></span>
						</div>
					 </div>
          <br>

          <br>
         <button type="submit" name="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
      echo $this->session->flashdata('msgServiceError');
  ?>

</div>
</div>

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
      <p class="text-muted">Edit <code>Services on the website in the text area.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($service)){ foreach($service as $serv){ ?>
					<br>
					<h6><?php echo str_replace('-', ' ', $serv->title); ?></h6><br>
          <label class="control-label mb-10">Add Title</label><br>
          <br>

          <p><?php echo number_format($serv->price); ?></p>
           <br>

          <a href="<?php echo site_url('admin/edit/service/edit_service/'.$serv->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>

        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Services</div>'; } ?>
      </div>
    </div>
  </div>

<?php
    echo $this->session->flashdata('msgServiceError');
?>

</div>
</div>

</div>
<!-- /Row -->

</div>

	</body>
</html>
