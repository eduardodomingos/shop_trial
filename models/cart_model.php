<?php
/*This model has all the data abstraction layer for cart management*/

if (!isset($_SESSION['cart']) ) {
	// create an empty cart if it doesn't exist
    $_SESSION['cart'] = array();
}

function cart_add_item($product_id, $quantity) {
	//adds an item to the cart
    $_SESSION['cart'][$product_id] = $quantity;
}

function cart_get_items() {
	// get an array of all items inside the cart
    $items = array();
    foreach ($_SESSION['cart'] as $product_id => $quantity ) {
        //get product data from db
        $product = get_product($product_id);
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
      
        //calculate discount
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;
        $line_price = round($unit_price * $quantity, 2);

        //store data in items associative array
        $items[$product_id]['name'] = $product['productName'];
        $items[$product_id]['description'] = $product['description'];
        $items[$product_id]['list_price'] = $list_price;
        $items[$product_id]['discount_percent'] = $discount_percent;
        $items[$product_id]['discount_amount'] = $discount_amount;
        $items[$product_id]['unit_price'] = $unit_price;
        $items[$product_id]['quantity'] = $quantity;
        $items[$product_id]['line_price'] = $line_price;
    }
    return $items;
}

function cart_product_count() {
	// returns the number of products in the cart
    return count($_SESSION['cart']);
}

function cart_subtotal () {
	// return the cart's subtotal
    $subtotal = 0;
    $cart_items = cart_get_items();
    foreach ($cart_items as $cart_item) {
        $subtotal += $cart_item['unit_price'] * $cart_item['quantity'];
    }
    return $subtotal;
}

function cart_clear() {
	//empties cart - remove all items 
    $_SESSION['cart'] = array();
}



