<div class="container-narrow">

<div class="masthead">
	<ul class="nav nav-pills pull-right">
		<li><a href="http://localhost<?php echo $base_url;?>">Home</a></li>
		<li><a href="http://localhost<?php echo $base_url . 'catalog/' ;?>">Catalog</a></li>
		<li><a href="http://localhost<?php echo $base_url .'cart/' ;?>">Cart</a></li>
		<?php if(logged_in() === true):?>
			<li><a href="http://localhost<?php echo $base_url . 'users?action=logout' ;?>">Logout</a></li>
		<?php else: ?>
			<li><a href="http://localhost<?php echo $base_url . 'users/' ?>">Login</a></li>
		<?php endif;?>
	</ul>
	<h3 class="muted">Cookies Co.</h3>
</div>

<hr>

<div class="clearfix">
	<select id="currency" class="pull-right">
	  <option value="EUR" selected>EUR</option>
	  <option value="BRL">BRL</option>
	  <option value="USD">USD</option>
	</select>
</div>