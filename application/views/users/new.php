<html>
<head>
	<title>Sign In/Register</title>
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
					<li><a href="/users/new_user"><span class="glyphicon glyphicon-log-in"></span> Sign in/Register </a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="row">
			<?php 
				if($this->session->flashdata("errors")) {
					echo $this->session->flashdata("errors");
				}
				if ($this->session->flashdata("success")) {
					echo $this->session->flashdata("success");
				}
			?>

		<div class='col-md-4 col-md-offset-1'>
			<form action="/users/create" method="post">
				<fieldset>
					<legend>Register</legend>
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" class="form-control" name="first_name">
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" class="form-control" name="last_name">
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label>Confirm password:</label>
						<input type="password" class="form-control" name="conf_password">
					</div>
					<input type="submit" class="btn btn-default" value="submit">
				</fieldset>
			</form>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<form action="/sessions/create" method="post">
				<fieldset>
					<legend>Sign In</legend>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" class="form-control" name="password">
					</div>
					<input type="submit" class="btn btn-default" value="submit">
				</fieldset>
			</form>

		</div>


	</div>





</body>



</html>