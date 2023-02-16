<?php 
    require('config.php');
    require('essentials.php');
    require('functions.php');
    login();
    if(isset($_POST['get_facilities']))
    {
        $res=selectAll('facility');
        $i=1;
        $data="";
        while($row=mysqli_fetch_assoc($res)){
           
        
        
            $data.="
            <tr class='align-middle'>
            <td> $i</td>
            <td> 
            <span class='badge rounded-pill bg-light text-dark'>
            $row[name]
            
            <td> $row[description]  </td>
            
            
          

            </tr>";
            $i++;
        }
        echo $data;
    }
    


    
     

?>
