<?php
    require('essentials.php');
    require('db_config.php');
    login();
    if(isset($_POST['get_all_rooms']))
    {
        $res=select("SELECT * FROM `room` WHERE `removed`=?",[0],'i');
        $i=1;
        $data="";
        while($row=mysqli_fetch_assoc($res)){
            if ($row['status']==1){
                $status="<button onclick='toggle_status($row[id],0)' >active
                </button>"; }
            else{ 
                $status="<button onclick='toggle_status($row[id],1)'>Inactive
                </button>";

            }
        
        
            $data.="
            <tr class='align-middle'>
            <td> $i</td>
            <td> $row[name]</td>
            <td> $row[area]  sq.ft</td>
            <td>
            <span class='badge rounded-pill bg-light text-dark'>
            Adult:$row[adult]
            </span><br>
            <span class='badge rounded-pill bg-light text-dark'>
            Children:$row[children]
            </span>
            </td>
      
            <td> $row[price] per night</td>
            <td> $row[quantity]</td>
            <td> $status</td>
            <td> <button type='button' onclick='remove_room($row[id])' class='btn btn-dark shadow-none btn-sm' > Delete
            </button>
            

            </tr>";
            $i++;
        }
        echo $data;
    }
    if(isset($_POST['toggle_status'])){
        $frm_data=filteration($_POST);
        $q="UPDATE `room` SET `status`=? WHERE `id`=?";
        $v=[$frm_data['value'],$frm_data['toggle_status']];
        if (update($q,$v,'ii')){
            echo 1;
          
        }
        else{
            echo 0;
        }


    }
   
    if(isset($_POST['remove_room'])){
        $frm_data=filteration($_POST);
        $res1=delete("DELETE FROM `room_feature` WHERE `room_id`=?",[$frm_data['room_id']],'i');
        $res2=delete("DELETE FROM `room_facility` WHERE `room_id`=?",[$frm_data['room_id']],'i');
        $res3=update("UPDATE `room` SET `removed`=? WHERE `id`=?",[1,$frm_data['room_id']],'ii' );
       if($res1 || $res2){
        echo 1;
       }
       else{
        echo 0;
       }
    }
    if(isset($_POST['get_all_booking']))
    {
        $res=select("SELECT * FROM `room_book` WHERE `status`=?",[0],'i');
        $i=1;
        $data="";
        while($row=mysqli_fetch_assoc($res)){
           
        
        
            $data.="
            <tr class='align-middle'>
            <td> $i</td>
            <td> 
            <span class='badge rounded-pill bg-light text-dark'>
            $row[f_name]
            </span>
            <span class='badge rounded-pill bg-light text-dark'>
             $row[l_name]
            </span></td>
            <td> $row[phone_no]  </td>
            <td> $row[no_of_rooms]  </td>
            <td> $row[room_id]  </td>
            <td> $row[check_in] </td>
            <td> $row[check_out]</td>
            <td> <button type='button' onclick='confirm_booking($row[booking_id])' class='btn btn-dark shadow-none btn-sm' > Confirm
            </button>
            <button type='button' onclick='remove_booking($row[booking_id])' class='btn btn-dark shadow-none btn-sm' > Delete
            </button></td>

            </tr>";
            $i++;
        }
        echo $data;
    }
    if(isset($_POST['confirm_booking'])){
        $frm_data=filteration($_POST);
        $res1=update("UPDATE `room_book` SET `status`=?  WHERE `booking_id`=?",[1,$frm_data['booking_id']],'ii');
     
       if($res1 ){
        echo 1;
       }
       else{
        echo 0;
       }
    }
    if(isset($_POST['remove_booking'])){
        $frm_data=filteration($_POST);
        $res1=delete("DELETE FROM `room_book` WHERE `booking_id`=?",[$frm_data['booking_id']],'i');
        if($res1 ){
            echo 1;
        }
        else{
            echo 0;
        }
        }
        ?>
