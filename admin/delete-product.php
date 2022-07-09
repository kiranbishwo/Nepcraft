<?php
  include "connect.php";
  session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }

  $p_id = $_GET['dp_id'];//product id
  $das = $_GET['das'];//stoclk quantity deleting fromdatabase
  $cat_id = $_GET['dcat_id'];//subbtracting stock from category
  $sql = "DELETE FROM product WHERE p_id = {$p_id};";
  $sql .= "UPDATE category SET cat_stock= cat_stock - {$das} WHERE cat_id = {$cat_id};";
  $sql .= "DELETE FROM wishlist WHERE p_id = {$p_id};";
  $sql .= "DELETE FROM order_details WHERE p_id = {$p_id};";
  $sql .= "DELETE FROM cart WHERE p_cart = {$p_id}";
  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/product.php");
  }else{
    echo "Query Failed";
  }
   mysqli_close($conn); 
?>