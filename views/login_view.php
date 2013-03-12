<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<div class="row-fluid marketing">
	<?php if(!empty($errors)){
		echo '<p class="error">'.$errors[0].'</p>';
	}
	?>
	<form action="." method="POST" class="form-signin">
		<h2 class="form-signin-heading">Please login</h2>
		<input type="hidden" name="action" value="login"><!--hidden field here-->
		<input type="text" name="username"class="input-block-level" placeholder="Username">
		<input type="password" name="password" class="input-block-level" placeholder="Password">
		</label>
		<button class="btn btn-large btn-primary" type="submit">Login</button>
	</form>
</div>

<?php include 'views/overall/footer_view.php';?>



