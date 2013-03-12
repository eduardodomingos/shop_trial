<?php
/*This is the catalog controller*/
require_once '../util/main.php' ;
require_once 'models/users_model.php';//load users_model (needed for navbar status)
require_once 'models/product_model.php' ;//load product_model

if (isset($_GET['product_id'])) {
    $action = 'show_product';
}
else{
	$action ='show_all_products';
}

switch ($action) {
	case 'show_all_products':
		//get all products from DB
		$products= get_all_products();

		include 'views/catalog_view.php';
		break;
	case 'show_product':
		//get product data from DB
		$product_id = $_GET['product_id'];//poduct id got from URL
        $product = get_product($product_id);//array with product data
        //parse array
        $category_id = $product['categoryID'];
	    $product_code = $product['productCode'];
	    $product_name = $product['productName'];
	    $description = $product['description'];
	    $list_price = $product['listPrice'];
	    $discount_percent = $product['discountPercent'];
	    //logic related discounts
	    $discounts = calculate_discount($list_price,$discount_percent);
	    // Format discounts
	    $discount_percent = $discounts['dp'];
	    $discount_amount = $discounts['da'];
	    $unit_price = $discounts['up'];
	    // Get image URL and alternate text
	    $image_filename = $product_code . '.jpg';
	    $image_path = $base_url . 'img/' . $image_filename;
	    $image_alt =  $product_name. ' cookie';
	    //show product
	    include('views/product_view.php');
		break;
	default:
		//SECURITY : to protected against spoofed forms.
		//display a user friendly error
		display_error("Unknown catalog action: " . $action);
		break;
}
