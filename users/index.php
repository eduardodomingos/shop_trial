<?php
/*This is the users controller*/
require_once '../util/main.php' ;
require_once 'models/users_model.php' ;//load users model

if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'view_login'; 
}
switch ($action) {
	case 'view_login':
		include 'views/login_view.php'; //displays login form
		break;
	case 'login':
		if(empty($_POST) === false){
			//when the form is submitted
			$username=$_POST['username'];
			$password=$_POST['password'];
			if(empty($username)||empty($password)){
				$errors[]='You need to enter a username and password!';
			}
			elseif(user_exists($username) === false){
				$errors[]='We can\'t find that username. Have you registered?';
			}
			else{
				$login=login($username,$password);
				if($login===false){
					$errors[]='That username/password combination is incorrect';

				}
				else{
					//get user data and store it in the session
					$_SESSION['user'] = get_user_by_id($login);
					//is the user logging in from the checkout?
			        if (isset($_SESSION['checkout'])) {
			        	//yes : redirect user to checkout
			            unset($_SESSION['checkout']);
			            redirect($base_url.'checkout');
			        } else {
			            //no :redirect user to home page
						redirect($base_url);
			        } 
				}
			}
			//print_r($errors);
			include 'views/login_view.php'; //displays login form
		}
		break;
	case 'logout':
		//call logout method
		logout();
		break;
	default:
		//SECURITY : to protected against spoofed forms.
		//display a user friendly error
		display_error("Unknown account action: " . $action);
		break;
}