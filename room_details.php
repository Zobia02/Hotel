<?php
    include_once("admin/essentials.php");

    include("head.php");



?>


<body>
        <?php require("header.php") ?>
        <?php

            if(!isset($_GET['id'])){
                redirect("rooms.php");
            }

            $data = filteration($_GET);
            $room_res = select("SELECT * FROM `room` WHERE id=? and status=? and removed=?",[$data["id"],1,0],"iii");

            if(mysqli_num_rows($room_res)==0){
                redirect("rooms.php");
            }

            $room_data = mysqli_fetch_assoc($room_res);
           

        ?>

      

        <div class="container">
            <div class="row">
                <div class="col-12 my-5 px-4">
                    <h2 class="fw-bold"><?php echo $room_data["name"]?></h2>
                    <div style="font-size: 14px;">
                        <a href="home.php" class="text-secondary">HOME</a>
                        <span class="text-secondary"> > </span>
                        <a href="rooms.php">ROOMS</a>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12 px-4 ">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                   echo" <div class='carousel-item active'>
                                        <img src=$room_data[room_img] class='d-block w-100'>
                                    </div>"
                                ?>
                                <div class="carousel-item active">
                                </div>
                               
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                    </div>

                    </div>
                </div>
            

                <div class="col-lg-5 col-md-12 px-4">
                    <div class="card mb-4 border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <?php
                                echo <<<price
                                    <h5 class="mb-4">$$room_data[price] per night</h5>
                                price;

                                echo <<< rating
                                    <div claa="rating">
                                        <i class="bi bi-star-fill text-warnng"></i>
                                    </div>
                                rating;

                                $fea_q = mysqli_query($con,("SELECT f.name from feature f 
                                INNER JOIN room_features rfea ON f.id = rfea.feature_id
                                WHERE rfea.room_id = '$room_data[id]'"));
    
                                $features_data = "";
                                while ($fea_row = mysqli_fetch_assoc($fea_q)){
                                    $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>$fea_row[name]</span>"; 
    
                                }

                                echo <<<Features
                                        <div class="features mb-4">
                                            <h6 class="mb-1">Features</h6>
                                            $features_data
                                        </div>
                                Features;

                                //facilities
                                $fac_q = mysqli_query($con,("SELECT f.name from facility f 
                                INNER JOIN room_facilities rfac ON f.id = rfac.facilities_id
                                WHERE rfac.room_id = '$room_data[id]'"));
        
                                $facilities_data = "";
                                while ($fac_row = mysqli_fetch_assoc($fac_q)){
                                    $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>"; 

                                }
                                echo <<<Facilities
                                            <div class="features mb-4">
                                                <h6 class="mb-1">Facilities</h6>
                                                $facilities_data
                                            </div>
                                    Facilities;

                                echo <<<book
                                    <a href=# class="main-btn mb-2 w-100 text-center" >Book Now</a>
                                book;
                            ?>
                        </div>

                    </div>
                </div>
                <div class="col-12 mt-4 px-5">
                  <div class="mb-4">
                    <h5>Description</h5>
                     <p>
                        <?php echo $room_data['description'] ?>
                     </p>           

                  </div>
                </div>                
            </div>
        </div>
                 

    </div>
    


    <?php require("footer.php") ?>
</body>
</html>


