<html>
<head>
	<title> Check out</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/javascripts/checkout.js')?>"></script>
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
										<li><a href="#"> Edit Profile</a></li>
										<li><a href="#"> Order History</a></li>
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
		
		<div class="row">
			<div class="col-md-12" style="margin-bottom:20px">
				<a href="/" >&laquo; Go back shopping</a>
			</div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <div class="panel panel-info">
                    <div class="panel-heading">2. Review Order</div>
                        <div class="panel-body">
                        	<?php  
							    	$subtotal = 0;
							    	$cart_items = $this->session->userdata('list');
									for ($i = 0; $i < count($cart_items); $i++) { 
										$subtotal += $cart_items[$i]['qty']*$cart_items[$i]['product_price'];?>
						    			<div class="col-md-12">
						    				<div class="col-sm-3 col-xs-3">
						    					<img style="width:70px" src="<?= base_url('assets/images/'.$cart_items[$i]['product_id'].".jpeg")?>"/>
						    				</div>
						    				<div class="col-sm-6 col-xs-6">
						    					<div class="col-xs-12"><?=$cart_items[$i]['product_name']?></div>
						    					<div class="col-xs-12"><small>Quantity:<?=$cart_items[$i]['qty']?></small></div>
						    				</div>
						    				<div class="col-sm-3 col-xs-3 text-right">
                                				<h6><span>$</span><?=$cart_items[$i]['product_price']?></h6>
                            				</div>
                            			</div>
                            			<div class="col-md-12"><hr/></div>
								    				
				 		<?php  		} 
				 					?>
                        <div class="col-md-12">
                            <div class="col-xs-12">
                                <strong>Subtotal</strong>
                                    <div class="pull-right">$<?=$subtotal?></div>
                                </div>
                            <div class="col-xs-12">
                                <small>Shipping</small>
                       	 <?php  $grand_total = 0;
                       	 		if ($subtotal>150) {
                       	 			$grand_total = $subtotal; ?> 
                                	<div class="pull-right"><span>-</span></div>
                                	<small><em style="color:green">You qualify for free shipping!</em></small>
                  <?php         } else {
                  					$grand_total = $subtotal + 5.99; ?>
                  					<div class="pull-right"><span>$5.99</span></div>
                  					<small><em style="color:red">Spend $<?=150-$subtotal?> more to qualify for free shipping!</em></small>
                  <?php			}  ?>
                                    
                            </div>
                        </div>
                        <div class="col-md-12"><hr /></div>
                        <div class="col-md-12">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span>$</span><span><?=$grand_total?></span></div>
                            </div>
                        </div>
                        <div class="col-md-12"><hr /></div>
                   		<form action="/orders/charge" class="pull-right" method="post">
                   			<input type="hidden" name="amount" value="<?= $grand_total*100?>">
							<script
								src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								data-key="pk_test_eXHfTyqfwXkABP9RUGLRORQX"
								data-amount="<?= $grand_total*100?>"
								data-name="icloset"
								data-description="Clothing"
								data-image="<?=base_url('assets/images/money.png')?>"
								data-locale="en">
							</script>
						</form>
                        
				    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                <div class="panel panel-info">
                    <div class="panel-heading">1. Shipping Address</div>
                    <div id="address" class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>




</html>