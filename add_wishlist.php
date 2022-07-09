<?php
session_start();
include 'connect.php';
echo $p_id = $_POST['id'];

$sql = "INSERT INTO wishlist (c_id, p_id) VALUES ({$_SESSION['c_id']} , {$p_id})";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}
?>