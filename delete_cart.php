<?php
    include 'connect.php';
    $cart_id = $_POST["cart_id"];

    $sql2 = "DELETE FROM cart WHERE cart_id = {$cart_id}";

    if(mysqli_query($conn, $sql2)){
    echo 1;
    }else{
    echo 0;
    }

?>