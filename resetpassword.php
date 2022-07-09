<?php
ob_start();
include 'head.php';
if(isset($_SESSION["c_name"])){
    header('Location:http://localhost/nepcraft/index.php');
  }
?>
<div class="container">
        <div class="row">
            <div class="col-md-6 form">
                <h4>Forget password!!</h4>
                
                <form class="LRform" action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                    <label for="">Enter your email </label><br>
                    <input type="email" id="email" name="email" placeholder="Please enter your email address." required><br>
                    
                    <input type="submit" name="submit" value="Send Mail">
                </form>
            </div>
        </div>
    </div>


<?php
if (isset($_POST['email'])) {
	 $c_email = $_POST['email'];
	 $checkemail = "SELECT * FROM customer WHERE c_email = '{$c_email}'";
     $query = mysqli_query($conn, $checkemail);
     if (mysqli_num_rows($query) >= 1){
    	
    	while ( $row = mysqli_fetch_assoc($query)) {
    		$subject = 'Change your password';
	    	$token=$row['token'];
	    	$name=$row['c_name'];
            $txt = 'Hi '.$name.', Click here to change your password http://localhost/nepcraft/changepass.php?token='.$token;
            $headers = "From: nepcraft123@gmail.com";

            if (mail($c_email, $subject, $txt, $headers)) {
                $_SESSION['msg']="Check your email to change your password ".$c_email."." ;
                header('Location:http://localhost/nepcraft/login.php');
            } else {
                 echo "Email sending failed...";
        }
    	}
	    	
    }else{
    	echo '<div class="alert alert-danger">Email doesnt exist</div>';
    }
}





include 'footer.php';
?>