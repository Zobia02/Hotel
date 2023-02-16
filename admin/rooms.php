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
    <title>ADMIN PANEL-FEATURES</title>
    <?php require('links.php');?>
</head>

<body class="bg-light">
    <?php require('header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">ROOMS</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">

                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room"> Add
                            </button>

                        </div>
                        <div class="table-responsive-lg" style="height:450px;overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                    <thead class="sticky-top">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Guests</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="room-data">
                                        
                                    </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title align-items-center">
                                            <i class="bi bi-person-circle fs-3 me-2"></i>Add Room</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Name</label>
                                                            <input name="name"  type="text" class="form-control shadow-none" >
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Area</label>
                                                            <input type="number" min="1" name="area"   class="form-control shadow-none" >
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Price</label>
                                                            <input name="price"  type="number" min="1" class="form-control shadow-none" >
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Quantity</label>
                                                            <input name="quantity"  type="number" min="1" class="form-control shadow-none" >
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Adult  (Max.) </label>
                                                        <input name="adult"  type="number"  min="1" class="form-control shadow-none" >
                                                    </div>
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-bold">Children  (Max.)</label>
                                                        <input name="children"  type="number" min="1" class="form-control shadow-none" >
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <label class="form-label fw-bold">Features</label>
                                                        <div class="row">
                                                            <?php 
                                                                $res=selectAll('feature');
                                                                while($opt= mysqli_fetch_assoc($res)){
                                                                echo" 
                                                                <div class='col-md-3'>
                                                                <label>
                                                                <input type='checkbox' name='features[]' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                                </label>
                                                                </div>";
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label fw-bold">Facilities</label>
                                                        <div class="row">
                                                            <?php 
                                                                $res=selectAll('facility');
                                                                while($opt= mysqli_fetch_assoc($res)){
                                                                echo" 
                                                                <div class='col-md-3'>
                                                                <label>
                                                                <input type='checkbox' name='facilities[]' value='$opt[id]' class='form-check-input shadow-none'>
                                                                $opt[name]
                                                                </label>
                                                                </div>";
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label fw-bold">Room Image</label>
                                                        <input type="file" name="image">
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
                           
   if (((isset($_POST['submit']))) && isset($_FILES['image'])){
                                                                    
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $area = mysqli_real_escape_string($con, $_POST['area']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        $adult = mysqli_real_escape_string($con, $_POST['adult']);
        $children = mysqli_real_escape_string($con, $_POST['children']);
        $desc = mysqli_real_escape_string($con, $_POST['desc']);
        $img_name = mysqli_real_escape_string($con, $_FILES['image']['name']);

   
        $sql_q_1 = "INSERT INTO `room`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `room_img`) VALUES ('$name','$area','$price','$quantity','$adult','$children','$desc','images/$img_name')";
        $result_1 = mysqli_query($con, $sql_q_1);
         //getting autoincremented id
        $room_id = mysqli_insert_id($con);
        $sql_q_3 = "INSERT INTO `room_feature`(`room_id`, `feature_id`) VALUES (?,?)";
        if($stmt = mysqli_prepare($con,$sql_q_3)){
            foreach($_POST['features'] as $value){
                mysqli_stmt_bind_param($stmt,'ii',$room_id,$value);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            alert("error",'Something went wrong-------------------');
        }
        $sql_q_2 = "INSERT INTO `room_facility`(`room_id`, `facilities_id`) VALUES (?,?)";
        if($stmt = mysqli_prepare($con,$sql_q_2)){
            foreach($_POST['facilities'] as $value){
                mysqli_stmt_bind_param($stmt,'ii',$room_id,$value);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            alert("error",'Something went wrong--pppppppp----------');
        }

   
        
      
        if ($result_1) {
            echo "<script>alert('Wow! Room Added')</script>";
          
                                                                                
                                                                            
        } 
        else {
            alert("error",'Something went wrong');
        }
        
    }  
   

?> 
<script>
function get_all_rooms(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","m_rooms.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
      
        xhr.onload = function(){
            document.getElementById('room-data').innerHTML=this.responseText;

        }
            

      xhr.send('get_all_rooms');


    }
function edit_details(id){
    let edit_room_form=document.getElementById('edit_room_form');
    let xhr = new XMLHttpRequest();
    xhr.open("POST","m_rooms.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
      
        xhr.onload = function(){
           let data=JSON.parse(this.responseText);
           edit_room_form.elements['name'].value=data.roomdata.name;

        }
            

      xhr.send('get_room='+id);

    }
   



function toggle_status(id,val){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","m_rooms.php",true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       
      
        xhr.onload = function(){
           if(this.responseText==1){
            alert('success','status toggled');
            get_all_rooms();

           }
           else{
            alert('error','server down');

           }

        }
            

      xhr.send('toggle_status='+id+'&value='+val);

    }
function remove_room(room_id){
    if(confirm("Are you sure you want to delete this room?")){
        let data=new FormData();
        data.append('room_id',room_id);
        data.append('remove_room','');
        let xhr = new XMLHttpRequest();
        xhr.open("POST","m_rooms.php",true);
        
        
        
        xhr.onload = function(){
           if(this.responseText==1){
            alert('success','successfully removed');
            get_all_rooms();

           }
           else{
            alert('error','server down');

           }

        }
            

      xhr.send(data);

    }

    }




    

      window.onload = function(){
      get_all_rooms();
      }
   


</script>

<!-- Bootstrap 5 JS CDN Links -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</body>
</html>