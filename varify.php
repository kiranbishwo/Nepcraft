<?php
include 'connect.php';
session_start();
	$token = $_GET['token'];

	$sql = "UPDATE customer SET status = 'active' WHERE token = '{$token}'";
	 if(mysqli_query($conn, $sql)){ 
	 	if (isset($_SESSION['msg'])) {
	 		$_SESSION['msg'] = "Account verified successfully.";
	 		header('Location:http://localhost/nepcraft/login.php');
	 	}else{
	 		$_SESSION['msg'] = "";
	 		header('Location:http://localhost/nepcraft/login.php');
	 	}
     }else{
     		$_SESSION['msg'] = "Account not verified.";
	 		header('Location:http://localhost/nepcraft/login.php');
     }
?>
