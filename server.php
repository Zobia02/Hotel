<?php

// Starting the session, necessary
session_start();

// Declaring and hoisting the variables
$username = "";
$email = "";
$errors = array();


// database connection
include("config.php");
include_once("./admin/essentials.php");
include_once("./admin/functions.php");






// Registration code


if (isset($_POST['register'])) {
	
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['cpass']);
	if ($password_1 == $password_2) {
		
		// Checking if the passwords match
		$sql = "SELECT * FROM user WHERE email='$email' or username='$username'";
		$result = mysqli_query($db, $sql);
		if (!$result->num_rows > 0) {
				$sql = "INSERT INTO user (username, email, password)
				VALUES ('$username', '$email', '$password_1')";
			$result = mysqli_query($db, $sql);
			if ($result) {
				alert("success",'Your account is created');
				$_SESSION['userName'] = $username;
				$_SESSION['userId'] = $row['id'];
				// Welcome message
				$_SESSION['success'] = "You have logged in";
				
				// Page on which the user will be
				// redirected after logging in
				header('location: home.php');
				$username = "";
				$email = "";
				$_POST['password_1'] = "";
				$_POST['password_2'] = "";
			} else {
				echo "<script>alert('Something went wrong')</script>";
			}

				
		} else {
			alert("error",'Email or Username Already Exits!');
			
		}
		
	} else {
		alert("error",'The two passwords do not match');
	}
}




    


// User login
if (isset($_POST['login'])) {
	// Data sanitization to prevent SQL injection
	$username = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$query = "SELECT * FROM users WHERE email=? AND password=? ";
	$values=[$username,$password];
	$res = select($query,$values,"ss");
	if($res->num_rows==1){
		$row = mysqli_fetch_assoc($res);
		$_SESSION['userName'] = $row['username'];
		$_SESSION['userId'] = $row['id'];
		//$_SESSION['userId'] = $row['username'];
		$_SESSION['login'] = true;
		
		
		redirect('home.php');
	}
	else{
		alert('error','Login Failed -- Connection Error');
	}

}








?>
