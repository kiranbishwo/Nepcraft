<?php
include 'connect.php';
session_start();
     $sql = "SELECT p_price, p_discount , qty FROM product LEFT JOIN cart ON cart.p_cart = product.p_id WHERE cart.c_id = {$_SESSION['c_id']}";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $total = 0;
    $sub_total =0;
    $otutput = 0;
    if(mysqli_num_rows($result) > 0 ){
    
     while($row = mysqli_fetch_assoc($result)){
           $output = ($row['p_price']-($row['p_price']*$row['p_discount'])/100)*$row['qty'];
          $total = $total + $output;
     }
    }else{
        $total = 0;
    }
    echo $total;
?>