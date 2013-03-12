<?php
/*This model has all the data abstraction layer for orders management*/
function order_add($csv_items) {
	//places orde in the DB->table orders
    global $db;
    $user_id = $_SESSION['user']['userID'];
    $shipping_address = $_SESSION['user']['shippingAddress'];
    $shipping_cost = 0;
    $tax = 0;
    $order_date = date("Y-m-d H:i:s");

    $sql = 'INSERT INTO orders (userID, orderDate, csvItems, shipAmount, taxAmount,shippingAddress)
         VALUES (:user_id, :order_date, :csv_items ,:ship_amount, :tax_amount,:shipping_address)';
    try{
    	$stmt = $db->prepare($sql);
	    $stmt->bindValue(':user_id', $user_id);
	    $stmt->bindValue(':order_date', $order_date);
	    $stmt->bindValue(':csv_items', $csv_items);
	    $stmt->bindValue(':ship_amount', $shipping_cost);
	    $stmt->bindValue(':tax_amount', $tax);
	    $stmt->bindValue(':shipping_address', $shipping_address);
	    $stmt->execute();
	    $order_id = $db->lastInsertId();
	    $stmt->closeCursor();
	    return $order_id;
	}
	catch(PDOException $e){
		display_error('Database error.');
    	die($e->getMessage());
	}
}
function send_email($username,$email,$message){

	$subject = 'Thanks for your order!';
	$from = array('cookiescompany@gmail.com' =>'cookies company');
	$to = array($email  => $username);

	//$text = "Mandrill speaks plaintext";
	$html = $message;

	$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
	$transport->setUsername('friedsmurf');
	$transport->setPassword('zZi8uQybVHRYOoNX9g2-Pw');
	$swift = Swift_Mailer::newInstance($transport);

	$message = new Swift_Message($subject);
	$message->setFrom($from);
	$message->setBody($html, 'text/html');
	$message->setTo($to);
	//$message->addPart($text, 'text/plain');

	if ($recipients = $swift->send($message, $failures))
	{
		//Message successfully sent
		return true;
	 
	} else {
		//There was an error:
		//print_r($failures);
	 	return false; 
	}
}