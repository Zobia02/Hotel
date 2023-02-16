  <!-- Rooms section -->
    <section id="rooms" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Favorite Rooms</h3>
            </div>
            <?php
                        $room_res = select("SELECT * FROM `room` WHERE  status=? and removed=? ORDER BY id DESC LIMIT 3",[1,0],"ii");

                        while($room_data=mysqli_fetch_assoc($room_res)){
                            //features

                            $fea_q = mysqli_query($db,("SELECT f.name from feature f 
                            INNER JOIN room_features rfea ON f.id = rfea.feature_id
                            WHERE rfea.room_id = '$room_data[id]'"));

                            $features_data = "";
                            while ($fea_row = mysqli_fetch_assoc($fea_q)){
                                $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fea_row[name]</span>"; 

                            }
                            //facilities
                            $fac_q = mysqli_query($db,("SELECT f.name from facility f 
                            INNER JOIN room_facility rfac ON f.id = rfac.facilities_id
                            WHERE rfac.room_id = '$room_data[id]'"));

                            $facilities_data = "";
                            while ($fac_row = mysqli_fetch_assoc($fac_q)){
                                $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>$fac_row[name]</span>"; 

                            }
                        echo <<<data
                            
                                <div class="col-md-4 mb-4 mb-lg-0">
                                    <div class="room-item">
                                        <img src=$room_data[room_img] class="img-fluid">
                                        <div class="room-item-wrap">
                                            <div class="room-content">
                                                <h5 class="text-white mb-lg-5 text-decoration-underline">$room_data[name]</h5>
                                                <p class="text-white">$room_data[description]</p>
                                                <p class="text-white fw-bold mt-lg-4">$room_data[price]/ Per Night</p>
                                                <a href="booking.php" class="main-btn mb-2 w-100 text-center" >Book Now</a>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                            data;
                        }
                    ?>
                    <div class="col-sm-12 section-title text-center mt-5">
                            <a href="rooms.php" class="main-btn  text-center">More Rooms--></a>
                    </div>  
                                            
                    
            </div>
             
        </div> 
    </section>