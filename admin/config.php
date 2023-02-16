<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "bvz_inn";



$con = mysqli_connect($server, $user, $pass, $database);

if (!$con) {
    die("<script>alert('Connection Failed.')</script>");
}


?>