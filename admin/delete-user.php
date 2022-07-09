<?php
include 'connect.php';
session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  if($_SESSION["u_role"] != 1){
      header("Location: {$hostname}/admin/");
  }
  
$u_id = $_POST["deleting-user-id"];

    /*sql to delete a record*/
    echo $sql = "DELETE FROM users WHERE u_id ={$u_id}";

    if (mysqli_query($conn, $sql)) {
        echo "successfully deleted";
        header("location:{$hostname}/admin/users.php");
    }
    else{
        echo mysqli_error($conn);
    }

    mysqli_close($conn);

?>