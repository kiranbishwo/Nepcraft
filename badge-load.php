<?php
ob_start();
session_start();
include 'connect.php';

    // if(!isset($_SESSION["c_name"])){
    // header('Location:http://localhost/nepcraft/html/login.php');
    // }
 if(!isset($_SESSION['c_id'])){
     echo 0;
 }else{
     $sql = "SELECT SUM(qty) FROM cart WHERE c_id = {$_SESSION['c_id']}";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
    $output = 0;
    if(mysqli_num_rows($result) > 0 ){
     while($row = mysqli_fetch_assoc($result)){
         $output = $row['SUM(qty)'];
     }
    echo $output;
    }else{
        echo "0";
    }
 }
    

?>