<?php
  include "connect.php";
  session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  if($_SESSION["u_role"] != 1){
      header("Location: {$hostname}/admin/");
  }
if( isset($_POST['submit']) ){
    $u_name =mysqli_real_escape_string($conn, $_POST['u_name']);
    $u_role =mysqli_real_escape_string($conn, $_POST['u_role']);
    $u_email =mysqli_real_escape_string($conn, $_POST['u_email']);
    $u_pass =mysqli_real_escape_string($conn,md5($_POST['u_pass']));
    $u_address =mysqli_real_escape_string($conn, $_POST['u_address']);
    $u_phone =mysqli_real_escape_string($conn, $_POST['u_phone']);
   
    echo $sql = "INSERT INTO users(u_name, u_role, u_email, u_pass, u_address, u_phone) VALUES ('{$u_name}','{$u_role}','{$u_email}','{$u_pass}','{$u_address}','{$u_phone}')";
    if(mysqli_query($conn, $sql)){
        header("location: {$hostname}/admin/users.php");
        echo "successfully added";
    }else{
        echo "<div class='alert alert-danger'>Query Failed.</div>" ;
    }
}
?>
