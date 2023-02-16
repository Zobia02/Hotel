<?php 
    include_once("menu.php");
    include("config.php");
    session_start();
    include_once("admin/functions.php");
    include("head.php");
?>
<body>
        
<header class="header_wrapper">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h2 style="color:#caa169; text-decoration: overline; font-weight: bold;">BVZ Luxurious Inn</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-stream navbar-toggler-icon"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        </li>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i>
                               <?php 
                                echo  $_SESSION['userName'];  
                                ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="status.php"><i class='fas fa-info  fa-fw'></i> Status</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class='fas fa-power-off fa-fw'></i> Log Out</a></li>
                            </ul>
                        </div> 
                                <!-- Room Modal exit -->
                           
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        <div class="my-5 px-4">
            <h2 class=" h-font text-center">OUR ROOMS</h2>
            <div class="h-line bg-dark"></div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                        <div class="container-fluid flex-lg-column align-items-stretch">
                            <h4 class="mt-2">Filters</h4>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <form method="post">
                                <div class="collapse navbar-collapse flex-column align-items-stretc mt-2" id="filterDropdown">
                                    <div class="border bg-light p-3 rounded mb-3">
                                        <h4 class="mb-3"  style="font-size: 18px;">CHECK AVAILABILITY</h4>
                                        <label class="form-label">Check-in</label>
                                        <input type="date" class="form-control shadow-none mb-3" name="check_in" required>
                                        <label class="form-label">Check-out</label>
                                        <input type="date" class="form-control shadow-none" name="check_out" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="main-btn" name="search" >Search</button>
                                    </div>
                                    

                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
     
                

               

    <?php


        function check($checkIn,$checkOut){
            $db = $GLOBALS['db'];
            $q = "(SELECT * FROM room r where r.id NOT in (SELECT room_id FROM room_book WHERE check_in < $checkIn AND check_out > $checkOut) AND r.quantity > 0)";
    
            $result = mysqli_query($db, $q);
            //print_r($result);
            
            $sparse_array = [];
            while($room_data=mysqli_fetch_assoc($result)){
                $sparse_array[] = $room_data;
               // print_r($sparse_array);

            }
            return $sparse_array;
        }





    
   
    



            if(isset($_POST['search'])){
                if(isset($_POST['check_in']) &&  isset($_POST['check_out'])){
                    $my_array = check($_POST['check_in'],$_POST['check_out']);
                 // iterate sparse arry using for loop
                    for($i=0;$i<count($my_array);$i++){
                        echo "<br><br/>";
                        //print_r($my_array[$i]);
                    }
/*
                    foreach($my_array as $value) {
                        echo ($value['id']);
                        echo ($value['name']);
                        echo ($value['price']);
                        echo ($value['quantity']);
                        echo ($value['adult']);
                        echo ($value['children']);
                        echo ($value['description']);
                        echo ($value['room_img']);
                        echo "<br/>";

                      } */
                    
    ?>

    


<div class="col-lg-9 col-md-12 px-5">
                    <?php
                        $room_res = select("SELECT * FROM `room` WHERE  status=? and quantity >0 and removed=?",[1,0],"ii");

                        while($room_data=mysqli_fetch_assoc($room_res)){
                            //features

                            $fea_q = mysqli_query($con,("SELECT f.name from features f 
                            INNER JOIN room_features rfea ON f.id = rfea.feature_id
                            WHERE rfea.room_id = '$room_data[id]'"));

                            $features_data = "";
                            while ($fea_row = mysqli_fetch_assoc($fea_q)){
                                $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>"; 

                            }
                            //facilities
                            $fac_q = mysqli_query($con,("SELECT f.name from facility f 
                            INNER JOIN room_facility rfac ON f.id = rfac.facilities_id
                            WHERE rfac.room_id = '$room_data[id]'"));

                            $facilities_data = "";
                            while ($fac_row = mysqli_fetch_assoc($fac_q)){
                                $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>"; 

                            }

                        

                            //thumbnail of image

                            echo <<<data
                                    <div class="card mb-4 border-0 shadow">
                                        <div class="row g-0 p-3 align-items-center">
                                            <div class="col-md-4">
                                                <img src=$room_data[room_img] class="img-fluid rounded-start" style="width: 100%;">
                                            </div>
                                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h4  class="mb-3 mt-md-2" style="font-weight: 400;">$room_data[name]</h4>
                
                                            <div class="features mb-4">
                                                    <h4 class="mb-1">Features</h4>
                                                    $features_data
                                                </div>
                                                <div class="facalities mb-3">
                                                    <h6 class="mb-1">Facilities</h6>
                                                    $facilities_data
                                                </div>
                                            <div class="adult mb-3">
                                                <h6 class="mb-1">Adults</h6>
                                                $room_data[adult]
                                                
                                            </div>
                                            <div class="adult mb-3">
                                                <h6 class="mb-1">Children</h6>
                                                $room_data[children]
                                            </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                        <h5  class="mb-3 bold" >$$room_data[price] per night</h5>
                                                        <a href='booking.php' class="main-btn mb-2 btn-sm" >Book Now</a>
                                                        <a href="room_details.php?id=$room_data[id]" class="main-btn mb-2 btn-sm" style="background-color:bisque">More Details</a>
                        
                                            </div>
                                         </div>
                                    </div>

                            data;

                        }
                    ?>      
                </div>                
            </div>
        </div>
                 

    </div>
                    
    <?php
                   
                
                }
      }else{
    ?>
               <div class="col-lg-9 col-md-12 px-5">
                    <?php
                        $room_res = select("SELECT * FROM `room` WHERE  status=? and quantity >0 and removed=?",[1,0],"ii");

                        while($room_data=mysqli_fetch_assoc($room_res)){
                            //features

                            $fea_q = mysqli_query($con,("SELECT f.name from feature f 
                            INNER JOIN room_features rfea ON f.id = rfea.feature_id
                            WHERE rfea.room_id = '$room_data[id]'"));

                            $features_data = "";
                            while ($fea_row = mysqli_fetch_assoc($fea_q)){
                                $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>"; 

                            }
                            //facilities
                            $fac_q = mysqli_query($con,("SELECT f.name from facility f 
                            INNER JOIN room_facilities rfac ON f.id = rfac.facilities_id
                            WHERE rfac.room_id = '$room_data[id]'"));

                            $facilities_data = "";
                            while ($fac_row = mysqli_fetch_assoc($fac_q)){
                                $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>"; 

                            }

                        

                            //thumbnail of image

                            echo <<<data
                                    <div class="card mb-4 border-0 shadow">
                                        <div class="row g-0 p-3 align-items-center">
                                            <div class="col-md-4">
                                                <img src=$room_data[room_img] class="img-fluid rounded-start" style="width: 100%;">
                                            </div>
                                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h4  class="mb-3 mt-md-2" style="font-weight: 400;">$room_data[name]</h4>
                
                                            <div class="features mb-4">
                                                    <h4 class="mb-1">Features</h4>
                                                    $features_data
                                                </div>
                                                <div class="facalities mb-3">
                                                    <h6 class="mb-1">Facilities</h6>
                                                    $facilities_data
                                                </div>
                                            <div class="adult mb-3">
                                                <h6 class="mb-1">Adults</h6>
                                                $room_data[adult]
                                                
                                            </div>
                                            <div class="adult mb-3">
                                                <h6 class="mb-1">Children</h6>
                                                $room_data[children]
                                            </div>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                        <h5  class="mb-3 bold" >$$room_data[price] per night</h5>
                                                        <a href='booking.php' class="main-btn mb-2 btn-sm" >Book Now</a>
                                                        <a href="room_details.php?id=$room_data[id]" class="main-btn mb-2 btn-sm" style="background-color:bisque">More Details</a>
                        
                                            </div>
                                         </div>
                                    </div>

                            data;

                        }
                    ?>      
                </div>                
    <?php   }   
    ?>



                 


    


    <?php require("footer.php") ?>
</body>
</html>


