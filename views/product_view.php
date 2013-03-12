<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<div class="row-fluid marketing">
	<div class="single_product">
		<h1><?php echo $product_name; ?></h1>
		<img src="<?php echo $image_path;?>" alt="<?php echo $image_alt;?>">
		<p><?php echo $description; ?><p>
		<p><b>List Price: </b><span data-price="<?php echo $list_price; ?>" class="price"><?php echo $list_price .' €'; ?></span></p>
		<?php if($discount_percent != 0): ?>
			<p><b>Discount: </b><?php echo $discount_percent . '%'; ?></p>
			<p><b>Your Price: </b><span data-price="<?php echo $unit_price; ?>" class="price"><?php echo '$' . $unit_price; ?></span> (You save <span data-price="<?php echo $discount_amount; ?>" class="price"><?php echo '$' . $discount_amount; ?></span>)</p>
		<?php endif;?>
		
		<form action="<?php echo $base_url . 'cart/index.php' ?>" method="post" id="add_to_cart_form">
		    <input type="hidden" name="action" value="add_to_cart"/>					  
		    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
		    <select name="quantity">
			  <option value="1">1 kg</option>
			  <option value="2">2 kg</option>
			  <option value="3">3 kg</option>
			  <option value="4">4 kg</option>
			  <option value="5">5 kg </option>
		    </select>
		    <br>
		    <button type="submit" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Add to cart</button>
		</form>
		
		<p><a href="<?php echo $base_url . 'catalog';?>" class="btn btn-primary">Continue shopping</a></p>
	</div>
</div>

<?php include 'views/overall/footer_view.php';?>


