<?php 
include 'connect.php';
session_start();
// Change Info From Here
$epay_url = "https://uat.esewa.com.np/epay/main";
// $pid = 1342338342;
$successurl = "http://localhost/nepcraft/esewa-payment-success.php?q=su";
$failedurl = "http://localhost/nepcraft/esewa-payment-failed.php?q=fu";
$merchant_code = "EPAYTEST"; 
$fraudcheck_url = "https://uat.esewa.com.np/epay/transrec";

// For Amount Check
 $sql = "SELECT p_price, p_discount , qty, cart_id FROM product LEFT JOIN cart ON cart.p_cart = product.p_id WHERE cart.c_id = {$_SESSION['c_id']}";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $total = 0;
    $sub_total =0;
    $otutput = 0;
    if(mysqli_num_rows($result) > 0 ){
    
     while($row = mysqli_fetch_assoc($result)){
           $output = ($row['p_price']-($row['p_price']*$row['p_discount'])/100)*$row['qty'];
          $total = $total + $output;
          $pid = $row['cart_id'];
     }
    }else{
        $total = 0;
    }
    $totalAmount = $total;

?>