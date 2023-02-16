<?php

     include_once("server.php");
     include_once("./admin/functions.php");
     require("config.php");


    if(isset($_POST['get_user_info']))
        {
            $q="SELECT * FROM user WHERE id=?";
            $values=[$_SESSION['userId']];
            $res=select($q,$values,"i");
            $data=mysqli_fetch_assoc($res);
            $json_data=json_encode($data);
            echo $json_data;
        }

    if (isset($_POST['upd_user_profile'])) {
    
    
            // Data sanitization to prevent SQL injection
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $email= mysqli_real_escape_string($con, $_POST['email']);
            $password= mysqli_real_escape_string($con, $_POST['password']);
        
            $query = "UPDATE user SET username=?, email=?,password=? WHERE id=?";
            $values=[$username,$email, $password,$_SESSION['userId']];
            $res = update($query,$values,"sssi");
            echo $res;
            
        }


        if(isset($_POST['room_book_info']))
        {
            $q="SELECT * FROM room_book WHERE user_id=? and status=? ";
            $values=[$_SESSION['userId'],1];
            $res=select($q,$values,"ii");
            $data=mysqli_fetch_assoc($res);
            $json_data=json_encode($data);
            echo $json_data;
        }

?>