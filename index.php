<?php 
//include('registeration.php');
include('server.php');
include_once("admin/essentials.php");
include_once("./admin/functions.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BVZ Luxurious Inn</title>
    <?php include_once('links.php') ?>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <!-- Navbar section -->
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
                            <a class="nav-link active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rooms">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        
                        <li class="nav-item mt-3 mt-lg-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="main-btn shadow-none me-lg-3 m3-3" data-bs-toggle="modal" data-bs-target="#loginmodal">
                              login
                            </button> 
                        </li>
                        <li class="nav-item mt-3 mt-lg-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="main-btn shadow-none me-lg-3 m3-3" data-bs-toggle="modal" data-bs-target="#signupmodal">
                              Sign Up
                            </button> 
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

          <!-- Modal -->
          <div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                  <i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" id="login-form">
                      <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" name="email" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <input type="password" name="password" required class="form-control" > 
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <button type="submit" class="main-btn" name="login" href="index.php">Login</button>
                          <a href="javascript: void(0)" >Forget Password</a>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <div class="modal fade" id="signupmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                  <i class="bi bi-person-circle fs-3 me-2"></i> User Login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" id="reg_form">
                      <div class="mb-3">
                            <label  class="form-label">UseName</label>
                            <input type="text" name="username" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Email address</label>
                            <input type="email" name="email" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <input type="password" name="password_1" required class="form-control" > 
                      </div>
                      <div class="mb-3">
                            <label  class="form-label">Confirm Password</label>
                            <input type="password" name="cpass" required class="form-control" > 
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                          <button type="submit" class="main-btn" name="register" href="index.php">Register</button>
                          <a href="javascript: void(0)" >Forget Password</a>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

    </header>
    <!-- Navbar section exit -->







    <?php include('banner.php');
     include('about.php');
     include('rooms_section.php');

    include('services_section.php');
    include('footer.php');
    ?> 

</body>
</html>

