
<?php
    include_once("admin/essentials.php");
    include_once("./admin/functions.php");
    include_once('config.php');
  
   
    
    include("head.php");
?>



<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <!-- Navbar section -->
    
    <!-- Navbar section exit -->

    <?php
    include('header.php');
    include('banner.php');
     include('about.php');
     include('rooms_section.php');
     ?>

    <div class="col-sm-12 section-title text-center mt-5">
            <a href="rooms.php" class="main-btn  text-center">More Rooms--></a>
    </div>   
    <?php
        include('services_section.php');
    ?> 

      
  
  
    <!-- Services section Exit -->
      <!-- Team section -->
      <section id="team" class="team_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Special Staff</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img src="images/teamb1.jpg" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Shirley Gibson</h5>
                            <p>Manager</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img src="images/teamb2.jpg" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Ronald Long</h5>
                            <p>Chif Reciption Officer</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img src="images/teamb3.jpg" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Ashley Sanchez</h5>
                            <p>Master Chef</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img src="images/teamb4.jpg" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Jessica Watson</h5>
                            <p>Housekeeping</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section Exit  -->
    <!-- Gallery section -->
    <section id="gallery" class="gallery_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Best Pictures Of Our Hotel</h6>
                    <h3>Our Gallery</h3>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/g1.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/g2.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/g3.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img src="./images/g4.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-md-6 gallery-item">
                    <img src="./images/g5.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"> </div>
                </div>
                <div class="col-md-6 gallery-item">
                    <img src="./images/g6.jpg" class="img-fluid w-100">
                    <div class="gallery-item-content"> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section Exit -->


   

<?php require("footer.php") ?>
    
</body>
</html>
