<?php
require('essentials.php');
require('config.php');
login()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel-Rooms</title>
    <link rel="stylesheet" href="admincustom.css">
    <?php require('links.php');?>


</head>
<body class="bg-light">
  <?php include('header.php') ;?>
  <!-- general setting section-->
   <div class="container-fluid" id="main-content" >
    <div class="row">
    <div class="col-lg-10 ms-auto overflow-hidden ">
        <h3 >SETTINGS</h3>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">

                    <h5 class="card-title m-0">GENERAL SETTING</h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#setting"> Edit
                    </button>
                </div>
                <h6 class="card-subtitle mb-1 fw-bold">Site title</h6>
                <p class="card-text" id="site_title"></p>
                
                <h6 class="card-subtitle mb-1 fw-bold">AboutUs</h6>
                <p class="card-text" id="site_about"></p>
            </div>
           </div>

     
    
          
        <!-- General Settings-->
        <div class="modal fade" id="setting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form id="general_s_form">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title align-items-center">
                         <i class="bi bi-person-circle fs-3 me-2"></i> General Setting</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                        <div class="modal-body">
                          <div class="mb-3">
                              <label class="form-label fw-bold">Site Title</label>
                               <input name=site_title id="site_title_inp" type="text" class="form-control shadow-none" required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label fw-bold">Site About</label>
                              <textarea name=site_about id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="main-btn" name="cancel" onclick="site_title.value= general_data.site_title, site_about.value= general_data.site_about"
                             data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="main-btn" name="submit" >Submit</button>
                        </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    
  </div>
</div>
<div class="container-fluid"  >
    <div class="row">
    <div class="col-lg-10 ms-auto overflow-hidden ">
       
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">

                    <h5 class="card-title m-0">CONTACT SETTING</h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contact-s"> Edit
                    </button>

                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-4">
                    <h6 class="card-subtitle mb-1 fw-bold">Adress</h6>
                    <p class="card-text" id="adress"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">Phone Number</h6>
                    <p class="card-text" id="phoneno"></p>
                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                    <p class="card-text" id="email"></p>

                  </div>
                 
                </div>


            
            </div>
           </div>
        <!-- Contact Settings-->
<div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="contact_s_form">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title align-items-center">
                  <i class="bi bi-person-circle fs-3 me-2"></i>Contact Setting</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                      <label class="form-label fw-bold">Phone Number</label>
                        <input name=site_title id="phoneno_inp" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label fw-bold">Email</label>
                      <input name=site_about id="email_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label fw-bold">Adress</label>
                      <textarea name=site_about id="adress_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="main-btn" name="cancel" onclick="contacts_inp(contacts_data)"
                      data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="main-btn" name="submit" >Submit</button>
                </div>
        </form>
      </div>
          </div>
        </div>

  <!-- modal settings-->
    </div>
</div>
<!--  Team management  section-->
<div class="container-fluid"   >
    <div class="row" >
    <div class="col-lg-10 ms-auto overflow-hidden ">
       
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">

                    <h5 class="card-title m-0">Team Mnagement SETTING</h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s"> Add
                    </button>

                </div>
                <div class="row " id="team_data">
                <div class="col-md-2">
                    <div class="card bg-dark text-white">
                    <img src="../images/about/teams2.jpg" class="card-img" >
                    <div class="card-img-overlay">
                    <button class="btn btn-danger btn-sm shadow-none">
                      Delete
                    </button>
                    </div>
                    <p class="card-text text-center px-3 py-2 ">Random Nmae</p>
                </div>
                </div>

                
                  </div>
                  </div>

                </div>
            </div>
           </div>

    
<!-- team mangement MODAL-->
<div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="team_s_form">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title align-items-center">
                  <i class="bi bi-person-circle fs-3 me-2"></i>Add Team Member</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                      <label class="form-label fw-bold">Name</label>
                        <input name=member_name id="member_name_inp" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label fw-bold">Picture</label>
                      <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg,.png,.jpeg,.webp"  class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="main-btn" name="cancel" onclick="add_member()"
                      data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="main-btn" name="submit"  >Submit</button>
                </div>
        </form>
      </div>
          </div>
        </div>

  
</div>
<script src="scripts.js" type="javascipt"></script>
<script>

      let general_data,contacts_data,card_data;
      
      let general_s_form=document.getElementById('general_s_form');
      let site_title_inp = document.getElementById('site_title_inp');
      let site_about_inp = document.getElementById('site_about_inp');
      let contact_s_form=document.getElementById('contact_s_form');
      let team_s_form=document.getElementById('team_s_form');
      let member_name_inp=document.getElementById('member_name_inp');
      let member_picture_inp=document.getElementById('member_picture_inp');
      function get_general(){
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');

        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){
          
         general_data=console.log(this.responseText);
         general_data = JSON.parse(this.responseText);
        

          

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;
        
      }
        xhr.send('get_general');
      }
      general_s_form.addEventListener('submit',function(e)
    {
        e.preventDefault(); //for stoppig page to redirect
        upd_general(site_title_inp.value,site_about_inp.value)
      }
      )

      function upd_general(site_title_val,site_about_val){
          let xhr = new XMLHttpRequest();
          xhr.open("POST","settings_crud.php",true);
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
          xhr.onload = function(){
            var myModal = document.getElementById('setting')
            var modal = bootstrap.Modal.getInstance(myModal) // Returns a Bootstrap modal instance
            modal.hide();

            if(this.responseText == 1){
             alert("sucess","Changes saved!");
             get_general();
            }
            else{
              alert("error","No Changes saved!");
            }
          /*general_data = JSON.parse(this.responseText);
          console.log(general_data);

          site_title.innerText = general_data.site_title;
          site_about.innerText = general_data.site_about;

          site_title_inp.value = general_data.site_title;
          site_about_inp.value = general_data.site_about;*/
         
        }
        xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+'&upd_general');


      }
      function get_contacts(){
        let contacts_p_id=['phoneno','email','adress'];
        let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){
          
         contacts_data = JSON.parse(this.responseText);
         contacts_data=Object.values(contacts_data);
         

        
       
           for (i=0;i<(contacts_p_id.length);i++){
            document.getElementById(contacts_p_id[i]).innerText=contacts_data[i+1];
     
           }
           contacts_inp(contacts_data);
         
        }
        xhr.send('get_contacts');
      }
      function contacts_inp(data)
      { let contacts_inp_id=['adress_inp','email_inp','phoneno_inp'];
        for (i=0;i<(contacts_inp_id.length);i++){
            document.getElementById(contacts_inp_id[i]).value=data[i+1];
           }


      }
      contact_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        upd_contacts();
      })
      function upd_contacts(){
        let index=['adress','phoneno','email'];
        let contacts_inp_id=['adress_inp','phoneno_inp','email_inp'];
        let data_str="";
        for (i=0;i<index.length;i++){
          data_str+=index[i]+"="+document.getElementById(contacts_inp_id[i]).value+'&';
        }
        data_str+='upd_contacts';
        let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload=function(){
            var myModal = document.getElementById('contact-s');
            var modal = bootstrap.Modal.getInstance(myModal) // Returns a Bootstrap modal instance
            modal.hide();
            if(this.responseText == 1){
              alert("sucess","Changes saved!");
              get_contacts();
              }
            else{
              alert("error","Changes saved!");
              
              }
            

        }
        
        
        xhr.send(data_str);

 
      }
      team_s_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_member();

      })
     function add_member(){
      
        let data=new FormData();
        data.append('name',member_name_inp.value);
        data.append('picture',member_picture_inp.files[0]);
        data.append('add_member','');
        let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);

       
      
        xhr.onload = function(){
            console.log(this.responseText);
            var myModal = document.getElementById('team-s')
            var modal = bootstrap.Modal.getInstance(myModal) // Returns a Bootstrap modal instance
            modal.hide();

            if(this.responseText == 'inv_img'){
              alert("error","ONLY PNG AND JPG IMAGES ARE ALLOWED!");
       
         }
           else if(this.responseText == 'inv_size'){
            alert("error","image should be less than 2MB!");
        }
           else if(this.responseText == 'upd_failed'){
            alert("error","image upload failed!");
        }
           else{
            alert('success','New member added');
            member_name_inp.value='';
            member_picture_inp.value='';
           }
        /*general_data = JSON.parse(this.responseText);
        console.log(general_data);

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;*/
        
      }
      xhr.send(data);

    }
    function get_members(){
      let xhr = new XMLHttpRequest();
        xhr.open("POST","settings_crud.php",true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xhr.onload = function(){
          
          document.getElementById('team_data').innerHTML=this.responseText;
          
        
      }
        xhr.send('get_members');

    }

      window.onload = function(){
        get_general();
        get_contacts();
        get_members();
      }
      </script>


        <!-- Bootstrap 5 JS CDN Links -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    
</body>
</html>
