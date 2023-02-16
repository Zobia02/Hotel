<?php 

include_once("admin/essentials.php");
include_once("./admin/functions.php");
include_once('config.php');
session_start();


function check(){
    $db = $GLOBALS['db'];
    $total_payment = "SELECT ((b.no_of_rooms)*(b.check_out-b.check_in)*(r.price)) as total_payment, b.user_id as user_id,b.booking_id as bId  FROM rooms r ,room_book b where b.user_id = $_SESSION[userId] and  r.id = b.room_id and b.status=1 and b.paymentDone=0";
    $result_2 = mysqli_query($db,$total_payment);
    print_r(($result_2));
    while($result_1 = mysqli_fetch_assoc($result_2)){
        $sql = "INSERT INTO payment (book_id,total_amount,payment_method)
            VALUES ('$result_1[bId]','$result_1[total_payment]','cash')";
            $result = mysqli_query($db, $sql);
            $q = "UPDATE room_book 
            SET   room_book.paymentDone = 1
            WHERE room_book.user_id=$_SESSION[userId] and  room_book.paymentDone = 0";
            $updated = mysqli_query($db, $q);
        }

}


$array = (check());


?>

