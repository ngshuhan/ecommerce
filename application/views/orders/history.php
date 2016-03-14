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
		<h2>Order history</h2>       
	  	<table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>Order ID</th>
	        <th>Order Date</th>
	        <th>Products</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php



	      	foreach ($order_history AS $order) {  ?>
	      		<tr>
	      			<td><?=$order['id']?></td>
	      			<td><?=date("jS M, Y",strtotime($order['created_at']))?></td>
	      			<td><ul>
	      	  <?php  
	      	  		$pieces = explode(",",$order['products']) ;

	      	  		foreach($pieces AS $product) {  ?>
	      	  			<li><?=$product?></li>


	<?php      	  	} ?>
					</ul></td>



	      		</tr>
	      		

<?php	    }




	       ?>

	    </tbody>
	  </table>
	</div>



</body>
</html>