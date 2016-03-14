<html>
<head>
	<title>icloset </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/javascripts/cart.js')?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/cart.css')?>">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
       			<a href='/'><img class="navbar-brand" alt="Brand" src="<?= base_url('assets/images/logo.png')?>"/></a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Tops
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/1">Blouses</a></li>
							<li><a href="/products/show/2">Cropped</a></li>
							<li><a href="/products/show/3">Sweater</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Bottoms
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/4">Skirts</a></li>
							<li><a href="/products/show/5">Jeans</a></li>
							<li><a href="/products/show/6">Leggings</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Outerwear
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/7">Jackets</a></li>
							<li><a href="/products/show/8">Coats</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Shoes
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/9">Sneakers</a></li>
							<li><a href="/products/show/10">Pumps</a></li>
							<li><a href="/products/show/11">Boots</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Accessories
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/12">Legwear</a></li>
							<li><a href="/products/show/13">Belts</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dresses
							<span class='caret'>
							</span>
						</a>
						<ul class='dropdown-menu'>
							<li><a href="/products/show/14">Maxi</a></li>
							<li><a href="/products/show/15">Knit</a></li>
							<li><a href="/products/show/16">Body-con</a></li>
							<li><a href="/products/show/17">Midi</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="list" class="dropdown">

					</li>



					<?php
							if ($this->session->userdata('is_logged_in') == TRUE) { ?>
								<li class="dropdown">
									<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
										<span class="glyphicon glyphicon-user"></span>
										<strong><?= $this->session->userdata("first_name")?></strong><span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
								<?php  if ($this->session->userdata("is_admin") == 1) {   ?>
												<li><a href="#">Edit Users</a></li>
								<?php	}  ?>
										
										<li><a href="/orders/history"> Order History</a></li>										
										<li><a href="/sessions/destroy"> Log Out</a></li>
									</ul>
								</li>
					<?php		} else { ?>
									<li><a href="/users/new"><span class="glyphicon glyphicon-log-in"></span> Sign in/Register </a></li>

					<?php		}  ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
			<?php 
				for ($i=0; $i <= count($products); $i++){  
					if ($i== 0 ||$i %3 == 0) { ?>
						<div class="row" style="display:flex">

		<?php 		}  ?>																	
						<?php   if ($i == count($products)) {
									if ($this->session->userdata("is_admin")== 1 ) { ?>
										<div class="col-md-4 col-sm-6">
											<div class="thumbnail">
												<?php echo form_open_multipart('/products/create');
												?>
												<!-- <form action="/Products/create" method="post"> -->
													<fieldset>

														<legend>Add a new product</legend>
														<div class="form-group">
															<label>Name:</label>
															<input type="text" class="form-control" name="name">
														</div>
														<div class="form-group">
															<label>Unit Price:</label>
															<input type="text" class="form-control" name="unit_price">
														</div>
														<div class="form-group">
														    <label>Image file</label>
														    <input type="file" name="userfile">
														    
														 </div>
														<div class="form-group">
															<label>Description:</label>
															<textarea rows="5" class="form-control" name="description"></textarea>
														</div>
														<div class="form-group">
															<label>Subcategories: </label>
													<?php  foreach ($subcategories AS $subcategory) { ?>
																<input type="checkbox" name="subcategories[]" value="<?=$subcategory['id']?>"
																<?php          
																if ($subcategory['id'] == $subcat_id) {
																	echo "checked";
																}
																?>>
																<?= $subcategory['name']?>
											<?php 			} ?>
														</div>
														<input type="hidden" name="current_page" value="<?= $subcat_id?>">
														<input type="submit" class="btn btn-default" value="submit">
													</fieldset>
												</form>
											</div>
										</div>

							<?php	}

								}  else { 
									$id = $products[$i]['id'] ;     ?>
									<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
											<img src="<?= base_url('assets/images/'.$id.'.jpeg')?>">
											<div class="caption" style="height:200px">
												<h4 class="pull-right">$<?= $products[$i]['unit_price']?></h4>
												<h4><?= $products[$i]['name']?></a></h4>
												<p> <?= $products[$i]['description']?></p>
											</div>
											<form id="cart" class="form-inline" action="/carts/create" method="post">
												<input type="hidden" name="product_id" value="<?=$id?>">
												<input type="hidden" name="product_name" value="<?= $products[$i]['name']?>">
												<input type="hidden" name="product_price" value="<?= $products[$i]['unit_price']?>">
												<div class="form-group">
													<select class="form-control" name="qty">
													  <option value="1">1</option>
													  <option value="2">2</option>
													  <option value="3">3</option>
													  <option value="4">4</option>
													  <option value="5">5</option>
													</select>
												</div>
												<input type="submit" class="btn btn-primary" value="Add to cart">
										<?php   if ($this->session->userdata('is_logged_in') == TRUE) {
													if ($this->session->userdata('is_admin') == 1) {   ?>
														<div class="form-group">
															<a class="btn btn-warning form-control" href="/products/edit/<?= $id?>">Edit</a>
														</div>
														<div class="form-group">
															<a class="btn btn-danger form-control" href="/products/delete/<?= $subcat_id?>/<?= $id?>">Delete</a>
														</div>
										<?php		}

												}  ?>
											
											</form>
										</div>
									</div>
			<?php				}  ?>
							
		<?php		if ($i % 3 == 2) {  ?>
					 	</div>
		<?php		}
				}  ?>
		</div>
	</div>


</body>



</html>