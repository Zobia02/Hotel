<?php
    require('essentials.php');
    require('db_config.php');
    login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL-FACILITIES</title>
    <?php require('links.php');?>
</head>

<body class="bg-light">
    <?php require('header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Facilities</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">

                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-facility"> Add
                            </button>

                        </div>
                        <div class="table-responsive-lg" style="height:450px;overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                    <thead class="sticky-top">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Desccription</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="facility-data">
                                        
                                    </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="add-facility" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title align-items-center">
                                            <i class="bi bi-person-circle fs-3 me-2"></i>Add Facility</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Name</label>
                                                            <input name="name"  type="text" class="form-control shadow-none" >
                                                    </div>
                                                    
                                                    
                                                    
                                                    

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Description</label>
                                                        <textarea  name="desc"   rows="4" class="form-control shadow-none" ></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="reset" class="main-btn" name="cancel" 
                                                        data-bs-dismiss="modal">Cancel</button>
                                                        <button  name="submit" type="submit" class="main-btn">Submit</button>
                                                    </div>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                       

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php 
    if (isset($_POST['submit'])){
                                                                    
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $desc = mysqli_real_escape_string($con, $_POST['desc']);
        $sql_q_1="INSERT INTO `facility`( `name`, `description`) VALUES ('$name','$desc')";

 
       
        $result_1 = mysqli_query($con, $sql_q_1);
        
        if ($result_1) {
            echo "<script>alert('Wow! New facility  Added')</script>";                                                                   
        } 
        else {
            alert("error",'Something went wrong');
        }
    }
   
    ?>

<script>
    function get_facilities(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","m_facilities.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
      
        xhr.onload = function(){
            document.getElementById('facility-data').innerHTML=this.responseText;

        }
            

      xhr.send('get_facilities');
      

    }
  
    window.onload = function(){
      get_facilities();
      }

</script>
  
    <!-- Bootstrap 5 JS CDN Links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>
