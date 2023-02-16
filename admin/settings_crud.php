<?php 
    require('config.php');
    require('essentials.php');
    require('functions.php');
    login();


    if(isset($_POST['get_general']))
    {
        $q="SELECT * FROM settings WHERE sr_no=?";
        $values=[1];
        $res=select($q,$values,"i");
        $data=mysqli_fetch_assoc($res);
        $json_data=json_encode($data);
        echo $json_data;
    }
    if (isset($_POST['upd_general'])) {
    
    
        // Data sanitization to prevent SQL injection
        $site_title = mysqli_real_escape_string($con, $_POST['site_title']);
        $site_about= mysqli_real_escape_string($con, $_POST['site_about']);
    
        $query = "UPDATE settings SET site_title=?, site_about=? WHERE sr_no=?";
        $values=[$site_title,$site_about,1];
        $res = update($query,$values,"ssi");
        echo $res;
        
    }
    
    if(isset($_POST['get_contacts']))
    {
        $q="SELECT * FROM  contact_details WHERE sr_no=?";
        $values=[1];
        $res=select($q,$values,"i");
        $data=mysqli_fetch_assoc($res);
        $json_data=json_encode($data);
        echo $json_data;
    }
    if (isset($_POST['upd_contacts'])) {
        $frm_data=filteration($_POST);
        $q="UPDATE contact_details SET adress=?, email=?,phoneno=? WHERE sr_no=?";
        $values=[$frm_data['adress'],$frm_data['phoneno'],$frm_data['email'],1];
        $res = update($q,$values,"sssi");//string so sssi
        echo $res;
        
    }
    if (isset($POST['add_feature'])){
        $frm_data=filteration($_POST);
        $q="INSERT INTO `features`(`name`) VALUES (?)";
        $values=[$frm_data['name']];
        $res=insert($q,$values,"s");
        echo $res;
  
      }

 
?>
