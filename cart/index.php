<?php
/*This is the cart controller*/
require_once '../util/main.php';
require_once 'models/users_model.php';//load users_model (needed for navbar status)
require_once 'models/product_model.php';//load product_model
require_once 'models/cart_model.php';//load cart_model

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} 
elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'view';
}
switch ($action) {
	case 'add_to_cart':
		$product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        cart_add_item($product_id, $quantity);//add item to cart
        $cart_items = cart_get_items();//associative array with cart items and related data
        $cart_product_count = cart_product_count();//nb of products in the cart
        $cart_subtotal = cart_subtotal();//returns cart subtotal
		break;
	case 'view':
        $cart_items = cart_get_items();//associative array with cart items and related data
        $cart_product_count = cart_product_count();//nb of products in the cart
        $cart_subtotal = cart_subtotal();//returns cart subtotal
        break;
	default:
		//SECURITY : to protected against spoofed forms.
		//display a user friendly error
		display_error("Unknown cart action: " . $action);
		break;
}
include 'views/cart_view.php';