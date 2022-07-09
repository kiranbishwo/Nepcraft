<?php
  include "connect.php";
  session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
if( isset($_POST['submit']) ){
    $u_id =mysqli_real_escape_string($conn, $_POST['u_id']);
    $u_name =mysqli_real_escape_string($conn, $_POST['u_name']);
    $u_role =mysqli_real_escape_string($conn, $_POST['u_role']);
    $u_email =mysqli_real_escape_string($conn, $_POST['u_email']);
    $u_address =mysqli_real_escape_string($conn, $_POST['u_address']);
    $u_phone =mysqli_real_escape_string($conn, $_POST['u_phone']);
   
    $sql = "UPDATE users SET u_name='{$u_name}',u_role={$u_role},u_email='{$u_email}',u_address='{$u_address}',u_phone={$u_phone} WHERE u_id = {$u_id}";
    
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/admin/users.php");
        echo "successfully added";
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>" ;
    }
}
?>
