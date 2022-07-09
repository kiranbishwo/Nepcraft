<?php
include 'connect.php';
session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  
$cat_id = $_POST["deleting-cat-id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM category WHERE cat_id ='{$cat_id}'";

    if (mysqli_query($conn, $sql)) {
        // echo "successfully deleted";
        header("location:{$hostname}/admin/category.php");
    }

    mysqli_close($conn);




?>