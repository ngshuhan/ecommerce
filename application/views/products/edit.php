<html>
<head>
	<title>Edit Product</title>
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
					<?php				}  ?>
									
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
	<div class="row">
		<div class="container">
			<div class='col-md-12'>
		<?php		if ($this->session->flashdata("success")) {
						echo $this->session->flashdata("success");
					}
					if ($this->session->flashdata("errors")) {
						echo $this->session->flashdata("errors");
					}


					  ?>
				<form action="/products/update" method="post">
					<fieldset>
						<legend>Edit Product #<?= $id?></legend>
						<input type='hidden' name="id" value="<?= $id?>">
						<div class="form-group">
							<label>Name:</label>
							<input type="text" class="form-control" name="name" placeholder="<?= $name ?>">
						</div>
						<div class="form-group">
							<label>Price:</label>
							<input type="text" class="form-control" name="unit_price" placeholder="<?= $unit_price?>">
						</div>
						<div class="form-group">
							<label>Description:</label>
							<textarea rows="6" class="form-control" name="description" placeholder="<?= $description ?>"></textarea>
						</div>
						<input type="submit" class="btn btn-default" value="Save Changes">
					</fieldset>
				</form>
			</div>
		</div>
	</div>





</body>



</html>