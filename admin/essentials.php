<?php 
// frontend purpose
    define('SITE_URL','http://127.0.0.1/project/admin/');
    define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
    //backend purpose
    define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/project/images/');
    define('ABOUT_FOLDER','about/');

    function login(){
        session_start();
        if(!(isset($_SESSION["adminLogin"]) && $_SESSION["adminLogin"]==true)){
            header("location:index.php");
        }
    }
    function filteration($data){
        foreach($data as $key=>$value){
            $data[$key]=trim($value);
            $data[$key]=stripcslashes($value);
            $data[$key]=htmlspecialchars($value);
            $data[$key]=strip_tags($value);
        }
        return $data;
    }
    function selectAll($table){
        $con=$GLOBALS['con'];
        $res=mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }
    
    
    
    function redirect($url){
        echo"<script>
            window.location.href='$url';
        </script>";
    }
    function alert($type,$msg){
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
        echo <<<alert
            <div class="alert $bs_class alert-warning alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
    }
    
   


?>
