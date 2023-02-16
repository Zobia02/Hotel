<?php
    include_once("./admin/functions.php");
    session_start();
?>


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
                        <li class="nav-item">
                            <a class="nav-link" href="#team">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Gallery</a>
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