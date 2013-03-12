<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>
<div class="row-fluid marketing">
	<h1>You order was placed.</h1>

	<h2>Thank's for your purchase.</h2>
	<p>Your order will be dispatched as soon as we bake all your cookies!</p>
	<p>In the meanwhile we sent a confirmation to <?php echo $email; ?> with your order details. If you don't receive it in 
	the next minutes, check your spam mailbox.</p>
	<p>Hope to see you soon!</p>

	<a href="<?php echo $base_url;?>" class="btn btn-primary"><i class="icon-home icon-white"></i> Return to Home</a>
</div>

<?php include 'views/overall/footer_view.php';?>