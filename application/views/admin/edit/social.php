<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Edit My Website About Page and Footer || Admin MCStitches</title>
	</head>

	<?php foreach($total_order_count as $tot_ord_count){} ?>

  <body>
      <!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- Title -->
<div class="row heading-bg  bg-pink">
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
<h5 class="txt-light">Dasboard Edit My Website About Page and Footer</h5>
</div>
<!-- Breadcrumb -->
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
<ol class="breadcrumb">
  <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  <li><a href="#"><span>Edit Website</span></a></li>
  <li class="active"><span>Edit My Website Footers</span></li>
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
      <h6 class="panel-title txt-dark">About Us in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>
  function delete_contact_info(id){
    var contact_info_id = id;
    if(confirm("Are you sure you want to delete this Content")){
    $.post('<?php echo base_url('admin/edit/content/delete_contact_info'); ?>', {"contact_info_id": contact_info_id}, function(data){
      location.reload();
      $('#cti').html(data)
      });
    }
  }

	function delete_about_content(id){
    var about_id = id;
    if(confirm("Are you sure you want to delete this Content")){
    $.post('<?php echo base_url('admin/edit/content/delete_about_content'); ?>', {"about_id": about_id}, function(data){
      location.reload();
      $('#cta').html(data)
      });
    }
  }
  </script>
	<p id="cti"></p>
	<p id="cta"></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>About Contents on the website from here.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($about_content)){ foreach($about_content as $abt_cont){ ?>
					<br>
					<h5><?php echo str_replace('-', ' ', $abt_cont->title); ?></h5><br>
					<p><?php echo $abt_cont->content; ?></p><br>
          <br>
          <button type="button" onclick="delete_about_content(<?php echo $abt_cont->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No About Content</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add About Contents in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/edit/content/add_about_content'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>About Contents of the website from here on the Footer.</code></p>
          <br>
          <label class="control-label mb-10">Add About Us Title</label><br>
          <input type="text" name="title" placeholder="Add Title"/><br>
          <span><?php echo form_error('title'); ?></span>
          <br><p class="text-muted">Add <code> About Us Title of the Website Store Location.</code>e.g - Welcome to MC STITCHES</p>
          <br><br>

					<div class="form-group">
						<label class="control-label mb-10">Add About Us Content</label><br>
						<div class="col-lg-10">
							<textarea class="textarea_editor form-control" rows="5" name="content" placeholder="Enter text ..."></textarea><br>
							<span><?php echo form_error('content'); ?></span>
						</div>
					 </div>
          <br>

          <br>
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
    if($this->form_validation->run() == TRUE){
      echo $this->session->flashdata('msgAboutContent');
      echo $this->session->flashdata('msgAboutContentError');
    }
  ?>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit About Contents in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Footer About Contents on the website in the text area.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($about_content)){ foreach($about_content as $abt_cont){ ?>
					<h6><?php echo str_replace('-', ' ', $abt_cont->title); ?></h6><br>
          <label class="control-label mb-10">Add Title</label><br>
          <br>

          <p><?php echo $abt_cont->content; ?></p>
           <br>

          <a href="<?php echo site_url('admin/edit/content/edit_about_content/'.$abt_cont->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>

        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Contact Information</div>'; } ?>
      </div>
    </div>
  </div>

<?php
  if($this->form_validation->run() == TRUE){
    echo $this->session->flashdata('msgAboutInfo');
    echo $this->session->flashdata('msgAboutInfoError');
  }
?>

</div>
</div>

</div>
<!-- /Row -->

<!-- Row -->
<div class="row">
<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Footer Contact Information in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>
  function delete_contact_info(id){
    var contact_info_id = id;
    if(confirm("Are you sure you want to delete this Content")){
    $.post('<?php echo base_url('admin/edit/content/delete_footer_content'); ?>', {"contact_info_id": contact_info_id}, function(data){
      location.reload();
      $('#cti').html(data)
      });
    }
  }
  </script>
  <p id="cti"></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Footer Contact Information from the footer part on the website from here.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($footer_info)){ foreach($footer_info as $foot_info){ ?>
					<p><?php echo $foot_info->content; ?></p><br>
          <h6><?php echo $foot_info->address; ?></h6><br>
          <h6><?php echo $foot_info->telephone; ?></h6><br>
          <h6><?php echo $foot_info->email; ?></h6>
          <br>
          <button type="button" onclick="delete_contact_info(<?php echo $foot_info->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Contact Information</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Footer Contact Information in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/edit/content/add_footer_info'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Contact Information of the website from here on the Footer.</code></p>
        <div class="form-group">
    			<div class="col-lg-10">
    				<textarea class="textarea_editor form-control" rows="5" name="content" placeholder="Enter text ..."></textarea><br>
            <span><?php echo form_error('content'); ?></span>
          </div>
  		   </div>
          <br>
          <label class="control-label mb-10">Add Address</label><br>
          <input type="text" name="address" placeholder="Add Address"/>
          <span><?php echo form_error('address'); ?></span>
          <p class="text-muted">Add <code> Address of the Website Store Location.</code> eg - 1 Victoria, Ojota, Lagos.</p>
          <br><br>

          <label class="control-label mb-10">Add Telephone Number</label><br>
          <input type="text" name="telephone" placeholder="Add Telephone Number"/>
          <span><?php echo form_error('telephone'); ?></span>
          <p class="text-muted">Add <code> Telephone of the Website Store.</code> eg - 080 123 456 78.</p>
          <br>

          <label class="control-label mb-10">Add Email Address</label><br>
          <input type="email" name="email" placeholder="Add Email Address"/>
          <span><?php echo form_error('email'); ?></span>
          <p class="text-muted">Add <code> Email Address of the Website Store.</code> eg - info@mcstitches.com</p>
          <br>

          <br>
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
    if($this->form_validation->run() == TRUE){
      echo $this->session->flashdata('msgAddedFooterInfo');
      echo $this->session->flashdata('msgAddedFooterInfoError');
    }
  ?>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Contact Information of the Footer in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>Footer Contact Information from the footer part on the website in the text area.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($footer_info)){ foreach($footer_info as $foot_info){ ?>
					<br>
          <p><?php echo $foot_info->content; ?></p><br>
          <h6><?php echo $foot_info->address; ?></h6><br>
          <h6><?php echo $foot_info->telephone; ?></h6><br>
          <h6><?php echo $foot_info->email; ?></h6><br>

          <a href="<?php echo site_url('admin/edit/content/edit_footer_content/'.$foot_info->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>

        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Contact Information</div>'; } ?>
      </div>
    </div>
  </div>

<?php
  if($this->form_validation->run() == TRUE){
    echo $this->session->flashdata('msgUpdatedInfo');
    echo $this->session->flashdata('msgUpdatedInfoError');
  }
?>

</div>
</div>

</div>
<!-- /Row -->

<!-- Row -->
<div class="row">
<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Social Links in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <script>

	function delete_social_link(id){
    var social_id = id;
    if(confirm("Are you sure you want to delete this Content")){
    $.post('<?php echo base_url('admin/edit/content/delete_social_link'); ?>', {"social_id": social_id}, function(data){
      location.reload();
      $('#ctl').html(data)
      });
    }
  }
  </script>
	<p id="ctl"></p>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Displays <code>Social Links on the website from here.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($social_link)){ foreach($social_link as $soc_lin){ ?>
					<br>
					<h5><?php echo str_replace('-', ' ', $soc_lin->social); ?></h5>
					<p><?php echo strtolower($soc_lin->url); ?></p><br>
          <br>
          <button type="button" onclick="delete_social_link(<?php echo $soc_lin->id; ?>)" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-trash"></i>
          </button>
        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Social Links</div>'; } ?>
      </div>
    </div>
  </div>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Add Social Links in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

	<div class="panel-wrapper collapse in">
    <div class="panel-body">
      <form action="<?php echo base_url('admin/edit/content/add_social_link'); ?>" method="post" role="form">
      <p class="text-muted">Add <code>Social Links of the website from here on the Footer.</code></p>
          <br>
          <label class="control-label mb-10">Add Social Media</label><br>
          <input type="text" name="social" placeholder="Add Social Media"/><br>
          <span><?php echo form_error('social'); ?></span>
          <br><p class="text-muted">Add <code> Social Links of the Website Store Location.</code>e.g - Facebook</p>
          <br><br>

					<label class="control-label mb-10">Add Social Media URL</label><br>
					<input style="width: 300px;" type="text" name="url" placeholder="Add Social Media URL"/><br>
          <span><?php echo form_error('url'); ?></span>
					<br><p class="text-muted">Add <code> Social Media URL of the Website Store Location.</code>e.g - https://www.facebook.com</p>
        	<br>

          <br>
         <button type="submit" class="btn btn-danger btn-icon left-icon mr-10">
          <i class="fa fa-check"></i>
        </button>
      </form>
    </div>
  </div>

  <?php
    if($this->form_validation->run() == TRUE){
      echo $this->session->flashdata('msgSocial');
      echo $this->session->flashdata('msgSocialError');
    }
  ?>

</div>
</div>

<div class="col-md-4">
<div class="panel panel-default card-view">
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark">Edit Social Links in Website</h6>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-wrapper collapse in">
    <div class="panel-body">
      <p class="text-muted">Edit <code>About Experience on the website in the text area.</code></p>
      <div class="tags-default mt-40">
				<?php if(!empty($social_link)){ foreach($social_link as $soc_lin){ ?>
					<h6><?php echo str_replace('-', ' ', $soc_lin->social); ?></h6><br>
          <p class="text-muted">Edit <code> About Social Media of the Website Store Location.</code> eg - Facebook</p>
          <br>

					<h6><?php echo $soc_lin->url; ?></h6><br>
          <p class="text-muted">Edit <code> About Social Media URL of the Website Store Location.</code> eg - https://www.facebook.com</p>
          <br>
           <br>

          <a href="<?php echo site_url('admin/edit/content/edit_social_link/'.$soc_lin->id); ?>" class="btn btn-danger btn-icon left-icon mr-10">
            <i class="fa fa-check"></i>
          </a>
          <br>

        <?php } }else{ echo '<div class="alert alert-danger" role="alert">No Social</div>'; } ?>
      </div>
    </div>
  </div>

<?php
  if($this->form_validation->run() == TRUE){
    echo $this->session->flashdata('msgAboutExp');
    echo $this->session->flashdata('msgAboutExpError');
  }
?>

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
