<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<div class="flexslider">
	<ul class="slides">
		<li>
			<img src="<?php echo $base_url; ?>img/banner_1.jpg" />
		</li>
		<li>
			<img src="<?php echo $base_url; ?>img/banner_2.jpg" />
		</li>
	</ul>
</div>
<hr>
  <div class="row-fluid marketing">
        <div class="span6">
          <h4>Hello.</h4>
          <p>In Cookies Co. we believe in the unordinary. meet a not so traditional cookie: incredibly airy and infused with meticulously-paired flavors, some even quite unexpected. welcome to früute, be bold and bite into the sweet life.</p>
      	</div>
		 <div class="span6">
          <h4>Taste our flavours.</h4>
          <p>we start with the finest ingredients, creating a healthier, better tasting cookie for a fully-satisfying experience. if chocolate is a guilty one-night stand—then our cookies are true love.</p>
		  <a href="<?php echo $base_url . 'catalog' ;?>" class="btn btn-primary btn-small">View our catalog</a>
		</div>
  </div>

<?php include 'views/overall/footer_view.php';?>