<?php
    include_once("essentials.php");
    login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel -Dasboard</title>
    <link rel="stylesheet" href="admincustom.css">
    <?php 
        require("links.php");
    ?>
</head>
<body>
    
    <?php require('header.php')?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">BOOKING REQUESTS</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">

                            

                        </div>
                        <div class="table-responsive-lg" style="height:450px;overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                    <thead class="sticky-top">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Book by (Name)</th>
                                            <th scope="col">phone No</th>
                                            <th scope="col">No of rooms</th>
                                            <th scope="col">Room Id</th>
                                            <th scope="col">Check in</th>
                                            <th scope="col">Check out</th>
                                            
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="book-data">
                                        
                                    </tbody>
                            </table>
                        </div>
                        
                       

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
    function get_all_booking(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","m_rooms.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        
            xhr.onload = function(){
                document.getElementById('book-data').innerHTML=this.responseText;

            }
                

        xhr.send('get_all_booking');

        }
        
    function confirm_booking(booking_id){
      if(confirm("Are you sure you want to confirm this booking?")){
        let data=new FormData();
        data.append('booking_id',booking_id);
        data.append('confirm_booking','');
        let xhr = new XMLHttpRequest();
        xhr.open("POST","m_rooms.php",true);
        
        
        
        xhr.onload = function(){
           if(this.responseText==1){
            alert('success','successfully removed');
            get_all_booking();

           }
           else{
            alert('error','server down');

           }

        }
            

      xhr.send(data);

    }

    }
   function remove_booking(booking_id){
      if(confirm("Are you sure you want to delete this booking?")){
        let data=new FormData();
        data.append('booking_id',booking_id);
        data.append('remove_booking','');
        let xhr = new XMLHttpRequest();
        xhr.open("POST","m_rooms.php",true);
        
        
        
        xhr.onload = function(){
           if(this.responseText==1){
            alert('success','successfully removed');
            get_all_booking();
            

           }
           else{
            alert('error','server down');

           }

        }
            

      xhr.send(data);

    }

    }



    

      window.onload = function(){
      get_all_booking();
      }
   
    
        </script>


    
</body>
</html>