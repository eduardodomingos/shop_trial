<?php
/*This is the checkout controller*/
require_once '../util/main.php' ;
require_once 'models/users_model.php';//load users_model (needed for navbar status and to verify if user is already logged in or not)
require_once 'models/cart_model.php';//load cart_model
require_once 'models/product_model.php' ;//load product_model
require_once 'models/orders_model.php' ;//load orders_model
include_once 'libraries/Swift-4.3.0/lib/swift_required.php';

if(logged_in()===false){
	//if the user is logged out
	$_SESSION['checkout'] = true;//flags the user origin
    redirect( $base_url.'users');//redirect him to login and exit this script
}
//if the user is already logged in (or after login successfuly):
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_order_resume';
}
switch ($action) {
	case 'show_order_resume':
		//get cart items
		$cart_items = cart_get_items();
		if (cart_product_count() == 0) {
			//SECURITY - if a targets directly this page URL redirect to catalog
            redirect($base_url.'catalog');
        }
        $subtotal = cart_subtotal();//get cart subtotal
        $shipping_cost = 0;
        $tax = 0;
        $total = $subtotal + $tax + $shipping_cost;
        //load checkout view
        include 'views/checkout_view.php';
		break;
	case 'place_order':
		if (cart_product_count() == 0) {
            redirect('Location: ' . $app_path . 'catalog');
        }
        $cart_items = cart_get_items();
        /*should be highly improved lol*/
        $csv_items='';
        foreach ($cart_items as $key => $cart_item) {
        	$csv_items.=$cart_item['name'].'('.$cart_item['quantity'].') , ';
        }
         /*end of should be highly improved lol*/
        $order_id=order_add($csv_items);//add order to DB-> table: orders
        //send email to user
        $email=$_SESSION['user']['email'];
        $message="<h1>Hello</h1><h2>Thank's for your purchase.</h2>
        <p>Your order will be dispatched as soon as we bake all your cookies!</p>
        <hr><p>Hope to see you soon!</p><p><i>Cookies Company team</i></p>";
        send_email($_SESSION['user']['userName'],$email,$message);
        //empty cart
        cart_clear();
        //load success view
        include 'views/success_view.php';
	break;
	default:
		//SECURITY : to protected against spoofed forms.
		//display a user friendly error
		display_error("Unknown catalog action: " . $action);
		break;
}

