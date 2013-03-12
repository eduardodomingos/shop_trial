<?php
/*This model has all the data abstraction layer for products management*/
function get_all_products(){
    //get all products available on the DB
    global $db;
    $sql = 'SELECT * FROM products';
    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }
}
function get_product($product_id) {
    // get product based on id
    global $db;
    $sql = 'SELECT * FROM products WHERE productID = :product_id';
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
        $result = $stmt->fetch();
        $stmt->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }
}

function calculate_discount($list_price,$discount_percent){
    // calculate discounts
    $discount_amount = round($list_price * ($discount_percent / 100), 2);
    $unit_price=$list_price - $discount_amount;
    // format discounts
    $discount_percent = number_format($discount_percent, 0);
    $discount_amount = number_format($discount_amount, 2);
    $unit_price = number_format($unit_price, 2);
    //store and return associative array
    $discounts=array('da'=>$discount_amount,'dp'=>$discount_percent,'up'=>$unit_price);
    return $discounts;
}