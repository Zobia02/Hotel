<?php

$hname='localhost';
$uname='root';
$pass='';
$db='bvz_inn';
$con=mysqli_connect($hname,$uname,$pass,$db);
if(!$con){
    die("Cannot connect to Database".mysqli_connect_error());
}

function select($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-Select");
        }
    }
    else{
        die("Query cannot be prepared-Select");

    }
}
function delete($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-Delete");
        }
    }
    else{
        die("Query cannot be prepared-Delete");

    }
}

function update($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-Update");
        }
    }
    else{
        die("Query cannot be prepared-Update");

    }
}
function insert($sql,$values,$datatypes)
{
    $con=$GLOBALS['con'];
    if($stmt=mysqli_prepare($con,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-insert");
        }
    }
    else{
        die("Query cannot be prepared-insert");

    }
}

?>
