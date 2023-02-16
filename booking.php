<?php include_once("menu.php") ?>
<?php
    include_once("server.php");
    include_once("./admin/functions.php");
    require("config.php");
    
    function user_login(){
        
        if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
            header("location:index.php");            
        }
}
   user_login();
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BVZ LUXURIOUS INN -RESERVATION</title>

    <?php include_once('links.php') ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        body {
            font-size: 120%;
            background: #F8F8FF;
        }



        .header {
            width: 30%;
            margin: 50px auto 0px;
            color: white;
            background: #5F9EA0;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;
        }
        form, .content {
                width: 30%;
                margin: 10px auto;
                padding: 20px;
                border: 1px solid #B0C4DE;
                background: white;
                border-radius: 0px 0px 10px 10px;
        }
        .input-group {
                margin: 10px 10px 10px 10px;
            }

            .input-group label {
                display: block;
                text-align: left;
                margin: 5px;
                font-size: 20px;
            }
            .input-group input {
                height: 32px;
                width: 95%;
                padding: 5px 10px;
                font-size: 15px;
                border-radius: 10px;
                border: 1px solid gray;
            }


    </style>

</head>
<body style="background-image: url(h_1.jpg); ">
<header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h2>BVZ Luxurious Inn</h2>
                </a>
            </div>
        </nav>
</header>
    <div class="container">
        <div class="row">
                <div class="mx-auto">
                        <form method="POST">
                                        <div class="mb-3">
                                                <label  class="form-label">First Name</label>
                                                <input type="text" name="fname" required class="form-control" > 
                                        </div>
                                        <div class="mb-3">
                                                <label  class="form-label">Last Name</label>
                                                <input type="text" name="lname" required class="form-control" > 
                                        </div>
                                        <div class="mb-3">
                                                <label  class="form-label">Phone No</label>
                                                <input type="text" name="phoneNo" required class="form-control" > 
                                        </div>
                                        <div class="mb-3">
                                        <select name="room_type" class="form-select" required>
                                                <option selected>Room Type</option>
                                                <option value="1" name="simple">Simple</option>
                                                <option value="2" name="Luxury">Luxury</option>
                                                <option value="3" name="Deluxue">Deluxe</option>
                                            </select>
                                        </div>
                                        <div  class="mb-3">
                                            <select name="no_of_rooms" class="form-select" >
                                                <option selected>No Of Rooms</option>
                                                <option value="1" >1</option>
                                                <option value="2">2</option>
                                                    
                                            </select>
                                                    
                                        </div>
                                            <div class="mb-3">
                                                <label class="form-label">Check-in</label>
                                                <input type="date" class="form-control shadow-none mb-3" name="check_in" required>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Check-out</label>
                                                <input type="date" class="form-control shadow-none" name="check_out" required>
                                            </div>
                        
                                            <p>Select One of the following payment methods:-</p>
                                            <div class="d-flex align-items-center">                               
                                                    <input type="radio" checked=true name="user_gender">
                                                    Cash
                                                    <input type="radio"  name="user_gender">
                                                    Card 
                                            </div> 

                                            <div class="col-sm-12 section-title text-center mt-5">
                                                    <button type="submit" class="main-btn shadow-none me-lg-3 m3-3" name="book">
                                                       Book
                                                    </button> 
                                                </div>
                        </form>    
        </div>



    </div>


 
    <?php


      
        if (isset($_POST['book'])) {
	
            $fname = mysqli_real_escape_string($db, $_POST['fname']);
            $lname = mysqli_real_escape_string($db, $_POST['lname']);
            $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
            $roomType = mysqli_real_escape_string($db, $_POST['room_type']);
            $noOfRooms = mysqli_real_escape_string($db, $_POST['no_of_rooms']);
            $checkIn = mysqli_real_escape_string($db, $_POST['check_in']);
            $checkOut = mysqli_real_escape_string($db, $_POST['check_out']);
                
            insert_room_book($fname,$lname,$phoneNo,$roomType,$noOfRooms,$checkIn,$checkOut);
            
                        
            }
    ?>
    <?php require('footer.php') ?>
</body>
</html>