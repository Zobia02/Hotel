<?php

// Declaring and hoisting the variables
$username = "";
$email = "";
$errors = array();
$_SESSION['success'] = "";

// database connection
require("config.php");
include_once("essentials.php");
include_once("functions.php");


// User login
if (isset($_POST['login'])) {


	// Data sanitization to prevent SQL injection
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$query = "SELECT * FROM admin WHERE username=? AND password=? ";
	$values=[$username,$password];
	$res = select($query,$values,"ss");
	if($res->num_rows==1){
		$row = mysqli_fetch_assoc($res);
		// Starting the session, necessary
		session_start();
		$_SESSION['adminLogin'] = true;
		$_SESSION['adminId'] = $row['id'];
		redirect('dasboard.php');
	}
	else{
		alert('error','Login Failed -- Connection Error');
	}

}

	/*// Error message if the input field is left blank
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// Checking for the errors
	if (count($errors) == 0) {
		
		// Password matching
		$password = md5($password);
		
		$query = "SELECT * FROM users WHERE username=
				'$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			
			// Storing username in session variable
			$_SESSION['username'] = $username;
			
			// Welcome message
			$_SESSION['success'] = "You have logged in!";
			
			// Page on which the user is sent
			// to after logging in
			header('location: index.php');
		}
		else {
			
			// If the username and password doesn't match
			array_push($errors, "Username or password incorrect");
		}
	}
}*/

?>
