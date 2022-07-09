<?php
include 'connect.php';
session_start();
 $qty = $_GET['quntity'];
 $cart_id = $_GET['cart_id'];
 $name = $_GET['name'];
if($name == 'sub' && $qty >= 1){
    $sql = "UPDATE cart SET qty =  qty - 1 WHERE cart_id = {$cart_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/cart.php");
        echo "successfully added";
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>" ;
    }
}elseif($name == 'add'){
    $sql = "UPDATE cart SET qty =  qty + 1 WHERE cart_id = {$cart_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/cart.php");
        echo "successfully added";
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>" ;
    }
}
else{
    $sql = "UPDATE cart SET qty =  1 WHERE cart_id = {$cart_id}";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/cart.php");
        echo "successfully added";
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>" ;
    }
}
?>