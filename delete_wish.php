<?php
    include 'connect.php';
    $wish_id = $_POST["wish_id"];

    $sql2 = "DELETE FROM wishlist WHERE w_id = {$wish_id}";

    if(mysqli_query($conn, $sql2)){
    echo 1;
    }else{
    echo 0;
    }

?>