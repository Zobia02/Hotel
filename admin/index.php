<?php require("config.php");
 include_once("essentials.php");
 require("server.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require("links.php")?>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body>

    <div class="login-form text-center rounded bg-white shadow overflow-none">
        <form method="POST">
            <h3 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h3>
            <div class="p-4">
                <div class="mb-3">
                    <input name="username" type="text" required class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="password" type="password"required class="form-control shadow-none text-center" placeholder="Password">
                </div>
			    <button name="login" type="submit" class="main-btn">LOGIN</button>
            </div>
        </form>
    </div>




    <!-- Bootstrap 5 JS CDN Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    
</body>
</html>