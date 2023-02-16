<?php
    include_once("server.php");
    include_once("./admin/functionss.php");
    require("config.php");
    
    function user_login(){
        
        if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
            header("location:index.php");            
        }
}
   user_login();
   include('payment.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php require('links.php');?>
    <style>
        div.user_info{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 600px;
        }
    </style>


</head>

<body>
    <header class="header_wrapper">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <h2>BVZ Luxurious Inn</h2>
                    </a>
                </div>
            </nav>
    </header>
    <div class="user_info text-center rounded bg-white shadow">
    <h3 >ROOM BOOK INFO</h3>
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mb-3 fw-bold">First Name</h6>
                <p class="card-text" id="fname"></p>
                
                <h6 class="card-subtitle mb-3 fw-bold">Last Name</h6>
                <p class="card-text" id="lname"></p>

                <h6 class="card-subtitle mb-3 fw-bold">Phone No</h6>
                <p class="card-text" id="phoneNo"></p>

                <h6 class="card-subtitle mb-3 fw-bold">No of rooms</h6>
                <p class="card-text" id="noOfRooms"></p>

                <h6 class="card-subtitle mb-3 fw-bold">Check In Date</h6>
                <p class="card-text" id="check_in_date"></p>

                <h6 class="card-subtitle mb-3 fw-bold">Check Out Date</h6>
                <p class="card-text" id="check_out_date"></p>

                <h6 class="card-subtitle mb-3 fw-bold">No Of Days</h6>
                <p class="card-text" id="no_of_days"></p>

                <h6 class="card-subtitle mb-3 fw-bold">Total Price </h6>
                <?php 
                            $res=selectAll('payment');
                             while($opt= mysqli_fetch_assoc($res)){
                            echo" 
                                    <p class='card-text' id='no_of_days'> $opt[total_payment]</p>
                                                                
                                                               
                                                           
                                </div>";
                                                                }
                ?>

            </div>
           </div>
    </div>

     
    
          
              


  

    
    <?php  ?>

<script>
    let general_data; 

    function room_book_info(){


        let fname = document.getElementById('fname');
        let lname = document.getElementById('lname');
        let phoneNo = document.getElementById('phoneNo');
        let noOfRooms = document.getElementById('noOfRooms');
        let checkInDate = document.getElementById('check_in_date');
        let checkOutDate = document.getElementById('check_out_date');
        let no_of_days = document.getElementById('no_of_days');
        
       
        
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){

         console.log(this.responseText);
          
         general_data=console.log(this.responseText);
         general_data = JSON.parse(this.responseText);
        

          

        fname.innerText = general_data.f_name;
        lname.innerText = general_data.l_name;
        phoneNo.innerText = general_data.phone_no;

        noOfRooms.innerText = general_data.no_of_rooms;
        checkInDate.innerText = general_data.check_in;
        checkOutDate.innerText = general_data.check_out;

        no_of_days.innerText = (general_data.check_out - general_data.check_in);
       

        
      }
        xhr.send('room_book_info');
      }



      window.onload = function(){
        room_book_info();
       
      }

</script>



        <!-- Bootstrap 5 JS CDN Links -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>


