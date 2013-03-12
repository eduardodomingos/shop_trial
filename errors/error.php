<?php include 'views/overall/header_view.php';?>
<body>
	<div class="container-narrow">
		<div class="row-fluid marketing">
			<div id="content">
			    <h2>Ups! This is embarrassing, but sometimes bad things could happen.</h2>
			    <p><?php echo $error_message; ?></p>
			    <a href="<?php echo $base_url;?>">Return to homepage</a>
			</div>
		</div>
	

<?php include 'views/overall/footer_view.php';?>