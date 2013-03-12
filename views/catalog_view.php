<?php include 'views/overall/header_view.php';?>
<?php include 'views/overall/nav_view.php';?>

<div class="row-fluid marketing">
	<h1>Our Catalog</h1>
	<br>
	<div class="product span4 pull-left">
    <?php foreach ($products as $product):?>
    	<h2><a href=".?product_id=<?php echo $product['productID'];?>"><?php echo $product['productName'];?></a></h2>
	    <a href=".?product_id=<?php echo $product['productID'];?>"><img src="<?php echo $base_url;?>img/<?php echo $product['productCode'];?>.jpg" alt="<?php echo $product['productName']. ' cookie';?>" class="greydout"></a>  
	    <p><?php echo $product['description'];?></p>
	    <hr>
	    <?php endforeach;?>
	  </div>
</div>

<?php include 'views/overall/footer_view.php';?>









