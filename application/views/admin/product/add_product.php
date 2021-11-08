<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Add New Products || Admin Beauty Shop</title>
	</head>

	<?php if(!empty($total_order_count)){ foreach($total_order_count as $tot_ord_count){} }else{ echo ''; } ?>

  <body>
          <!-- Main Content -->
  		<div class="page-wrapper">
              <div class="container-fluid">
  				<!-- Title -->
  				<div class="row heading-bg  bg-pink">
  					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
  					  <h5 class="txt-light">Upload Products</h5>
  					</div>
  					<!-- Breadcrumb -->
  					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
  					  <ol class="breadcrumb">
                <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
  							<li><a href="#"><span>Product</span></a></li>
  							<li class="active"><span>Upload a Product</span></li>
  					  </ol>
  					</div>
  					<!-- /Breadcrumb -->
  				</div>
  				<!-- /Title -->

					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form action="<?php echo base_url('admin/product/add_product'); ?>" method="POST" enctype="multipart/form-data" name="formSubmit" onsubmit="return CheckLength()" role="form">
												<h6 class="txt-dark capitalize-font"><i class="icon-list mr-10"></i>about product</h6>
												<hr>
                        <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Title</label>
															<input type="text" id="title" name="title" class="form-control" placeholder="Rounded Chair">
                              <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
													</div>
													<!--/span-->
                          <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Type</label>
															<!--<select class="form-control" data-placeholder="Choose a Type" tabindex="1" id="type" name="type" onchange="changeProduct('type', 'category', 'subcategory', 'model', 'year', 'location')">-->
                              <select class="form-control" data-placeholder="Choose a Type" name="type">
                                <option>Select</option>
																<option value="Face-Treatment">Face Treatment</option>
																<option value="Hair-Treatment">Hair Treatment</option>
																<?php foreach($category_menu as $catmenu){ ?>
									                <option value="<?php echo $catmenu->type; ?>"><?php echo $catmenu->type; ?></option>
									              <?php }?>
															</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Product Category</label>
															<!--<select class="form-control" data-placeholder="Choose a Type" tabindex="1" id="type" name="type" onchange="changeProduct('type', 'category', 'subcategory', 'model', 'year', 'location')">-->
                              <select class="form-control" data-placeholder="Choose a Type" name="category">
                                <option>Select</option>
																<option value="Face-Wash">Face Wash</option>
																<option value="Cream">Cream</option>
																<option value="Hair-Cut">Hair Cut</option>
																<option value="Hair-Shampoo">Hair Shampoo</option>
																<?php foreach($category_menu as $catmenu){ ?>
									                <option value="<?php echo $catmenu->type; ?>"><?php echo $catmenu->type; ?></option>
									              <?php }?>
															</select>
														</div>
													</div>

												<!-- Row -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label mb-10">Product Color</label>
                            <select class="form-control" data-placeholder="Choose a Color" name="color">
                              <option>Select</option>
                              <option value="Black">Black</option>
                              <option value="Blue">Blue</option>
                              <option value="Grey">Grey</option>
                              <option value="Peach">Peach</option>
                              <option value="Purple">Purple</option>
                              <option value="White">White</option>
															<option value="None">None</option>
                            </select>
                          </div>
                        </div>

											</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Price</label>
															<div class="input-group">
																<div class="input-group-addon"><i>&#8358;</i></div>
																<input type="text" name="price" class="form-control" id="exampleInputuname" placeholder="1000">
                                <span class="text-danger"><?php echo form_error('price'); ?></span>
															</div>
														</div>
													</div>
													<!--/span-->
                          <br><br>

													<!--/span-->
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-speech mr-10"></i>Product Description</h6>
												<hr>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea name="description" id="description" placeholder="Describe Your Product" class="form-control" rows="4" onKeyUp="textCounter(this,'count_display',30);"  onBlur="textCounter(this,'count_display',30);"></textarea>
															Number of Characters Left: <span id="count_display">30</span>
															<span id="Message" style="color: #ff0000"></span>
                              <span class="text-danger"><?php echo form_error('description'); ?></span>
														</div>
													</div>
												</div>
												<!--/row-->
													<!--/span-->
												</div>
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="icon-picture mr-10"></i>upload image</h6>
												<hr>
												<div class="row">
													<div class="col-lg-12">
                            <input type="file" name="userFiles[]" multiple="multiple" class="filestyle" data-buttonname="btn-primary">
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
												<hr>

												<div class="form-actions">
													<button type="submit" name="upload" class="btn btn-success btn-icon left-icon mr-10">
                            <i class="fa fa-check"></i>
                            <span>Upload</span>
                          </button>
												</div>
											</form>
                      <?php echo $this->session->flashdata('msgError'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>

			</div>
			<!-- /Main Content -->

			<script type="text/javascript">
				$(document).ready(function(){
					$('#banner_type').on('change', function(){
						var type = $(this).val();
						if(type == ''){
							$('#banner_category').prop('disabled', true);
						}else{
							$('#banner_category').prop('disabled', false);
							$.ajax({
								url: "<?php echo base_url('admin/product/add_products/get_banner_menu'); ?>",
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
