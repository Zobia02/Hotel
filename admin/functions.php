<?php

    // database connection
    require("config.php");


    function insert_room_book($fname,$lname,$phoneNo,$roomType,$noOfRooms,$checkIn,$checkOut){
        $db = $GLOBALS['db'];
        $sql = "INSERT INTO room_book (user_id,room_id,f_name,l_name,no_of_rooms,check_in,check_out,phone_no)
                VALUES ('$_SESSION[userId]','$roomType','$fname', '$lname','$noOfRooms','$checkIn','$checkOut','$phoneNo')";
        
        $result = mysqli_query($db, $sql);
        if ($result) {
            echo "<script>alert('Wow!SuccessFully Booked Wait for confirmation..')</script>";                
        } 
           else {
                alert("error",'Something went wrong');
           }
       
        }    
    function select($query,$values,$datatype){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$query)){
            mysqli_stmt_bind_param($stmt,$datatype,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query can not be executed -- select");
            }
        }
        else{
            die("Query can not be Prepared -- select");
        }

    }

    function update($query,$values,$datatype){
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con,$query)){
            mysqli_stmt_bind_param($stmt,$datatype,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query can not be executed -- update");
            }
        }
        else{
            die("Query can not be Prepared -- update");
        }

    }
    
    
  
    function insert($sql,$values,$datatypes)
    {
        $con=$GLOBALS['con'];
        if($stmt=mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt)){
                $res=mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed-insert");
            }
        }
        else{
            die("Query cannot be prepared-insert");

        }
    }
    


?>
