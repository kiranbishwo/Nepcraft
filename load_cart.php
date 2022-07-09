<?php
session_start();
include 'connect.php';
$p_id = $_POST["id"];
$qty = 1;

$sql = "INSERT INTO cart (c_id, p_cart, qty) VALUES ('{$_SESSION['c_id']}' , '{$p_id}' ,{$qty})";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}
?>