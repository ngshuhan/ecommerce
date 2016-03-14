<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	<span class="glyphicon glyphicon-shopping-cart"></span>Shopping Cart(<?php
		if ($this->session->userdata('total_qty')) {
			echo $this->session->userdata('total_qty');
		} else {
			echo "0";
		}


?>)<span class="caret"></span>
</a>

<ul class="dropdown-menu shopping-cart" role="menu">
<?php 
$total_price = 0;
if ($this->session->userdata('total_qty')>0) {
	$cart_items = $this->session->userdata('list');
		for ($i = 0; $i < count($cart_items); $i++) { ?>
			<li class="item">
				<img class="cart-img" src="<?= base_url('assets/images/'.$cart_items[$i]['product_id'].".jpeg")?>"/>
				<span class="item-name"><?=$cart_items[$i]['product_name']?>
				<form id="delete" action="/carts/delete" method="post">
					<input type="hidden" name="product_id" value="<?= $cart_items[$i]['product_id']?>">
					<input type="submit" class="btn btn-link red" value="Remove?">
				</form>
				</span>
				<span class="pull-right">Qty: <?= $cart_items[$i]['qty']?> X $<?=$cart_items[$i]['product_price']?></span>
	<?php 				$total_price += $cart_items[$i]['qty']*$cart_items[$i]['product_price'];	?>
			</li>
			<li role="separator" class="divider"></li>

			
<?php	}

} ?>
<li class="pull-right">Total: $<?= $total_price?></li>
<?php  if ($total_price>0) {  ?>
		<form action="/orders/new" method="post">
			<input type="submit" value="Check Out &raquo;" class="btn btn-link checkout">
		</form>

<?php }  ?>
</ul>

