<?php
/*This model has all the data abstraction layer for user management*/
function logged_in(){
	//returns true if user is logged in
	return (isset($_SESSION['user'])) ? true : false;
}

function user_exists($username){
	//returns true if username exists on the db->users table
	global $db;
	$sql= 'SELECT COUNT(userID) as count FROM users WHERE userName = :username';
	try {
		$stmt=$db->prepare($sql);
		$stmt->bindValue(':username',$username);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		return ($result['count'] == 1) ? true : false ;
	} catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }	
}

function user_id_from_username($username){
	//returns user id of a given username
	global $db;
	$sql= 'SELECT userID FROM users WHERE userName = :username';
	try {
		$stmt=$db->prepare($sql);
		$stmt->bindValue(':username',$username);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		return $result['userID'];
	} catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }
}

function login($username,$password){
	//returns true if username and password match
	global $db;
	$user_id=user_id_from_username($username);
	$password=md5($password);
	$sql= 'SELECT COUNT(userID) as count FROM users WHERE userName = :username AND password =:password';
	try {
		$stmt=$db->prepare($sql);
		$stmt->bindValue(':username',$username);
		$stmt->bindValue(':password',$password);
		$stmt->execute();
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		return ($result['count'] == 1) ? $user_id : false;
	} catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }
}

function logout(){
	//logouts a user and redirects him to the home page
	unset($_SESSION['user']);
	global $base_url;
	redirect($base_url);
}

function get_user_by_id($id) {
	//receives user id and returns the associated user data
    global $db;
    $sql = 'SELECT * FROM users WHERE userID = :id';
    try {
	    $stmt = $db->prepare($sql);
	    $stmt->bindValue(':id', $id);
	    $stmt->execute();
	    $user = $stmt->fetch();
	    $stmt->closeCursor();
	    return $user;
    } catch (PDOException $e) {
        display_error('Database error.');
    	die($e->getMessage());
    }
}