<?php
ob_start();
    include 'head.php';  
?>
<div class="container">
        <div class="row">
            <div class="col-md-6 form">
                <h4>New Customer Registration</h4>
                <form class="LRform" action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                    <label for="">Name<span style="color: red;">*</span></label><br>
                    <input type="text" name="c_name" placeholder="Please enter your name." required><br>
                    <label for="">Email<span style="color: red;">*</span></label><br>
                    <input type="email" name="c_email" placeholder="Please enter your email." required><br>
                    <label for="">DOB<span style="color: red;">*</span></label><br>
                    <input type="date" name="c_dob" required><br>
                    <label for="">Gender<span style="color: red;">*</span></label><br>
                    <span class="login-p">Male</span>
                    <input type="radio" name="c_gender"  value="male">
                    <span class="login-p">Female</span>
                    <input type="radio" name="c_gender"  value="female"><br>
                    <label for="">Contact Number<span style="color: red;">*</span></label><br>
                    <input type="text" name="c_phone" placeholder="Please enter your contact number." required><br>
                    <label for="">Address<span style="color: red;">*</span></label><br>
                    <textarea name="c_address" id="" cols="30" rows="3" placeholder="Enter your address"></textarea>
                    <br>
                    <label for="shipping_address">Shipping Address<span style="color: red;">*</span></label><br>
                    <textarea name="shipping_address" id="shipping_address" cols="30" rows="3" placeholder="Enter your shipping address"></textarea>
                    <br>
                    <label for="">Password<span style="color: red;">*</span></label><br>
                    <input type="password" name="c_pass" placeholder="Please enter your password" required><br>
                    <label for="">Confirm password<span style="color: red;">*</span></label><br>
                    <input type="password" name="cc_pass" placeholder="Please re-enter your password" required><br>
                    <input type="submit" name="submit" value="Sign Up">
                </form>
                <p  class="login-p">Already have an Account? <a href="login.php">Click </a> Here</p>
            </div>
            </div>
        </div>
    </div>
<?php
     if(isset($_POST['submit'])){
                              $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
                              $c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
                              $c_dob = date('Y-m-d' , strtotime($_POST['c_dob']));
                              $c_gender = mysqli_real_escape_string($conn, $_POST['c_gender']);
                              $c_phone = mysqli_real_escape_string($conn, $_POST['c_phone']);
                              $c_address = mysqli_real_escape_string($conn, $_POST['c_address']);
                              $shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
                              $c_pass = mysqli_real_escape_string($conn,md5($_POST['c_pass']));
                              $cc_pass = mysqli_real_escape_string($conn,md5($_POST['cc_pass']));
                               $token = bin2hex(random_bytes(15));

                              $checkemail = "SELECT * FROM customer WHERE c_email = '{$c_email}'";
                              $query = mysqli_query($conn, $checkemail);
                              if (mysqli_num_rows($query) > 1) {
                                echo $c_email ."<div class='alert alert-danger'>Email already exist.</div>";
                              }else{
                                if($c_pass == $cc_pass){

                                echo $sql = "INSERT INTO customer ( c_name, c_email, c_dob, c_gender, c_phone, c_address,shipping_address, c_pass, token, status) VALUES ('{$c_name}', '{$c_email}', '{$c_dob}', '{$c_gender}', {$c_phone}, '{$c_address}','{$shipping_address}', '{$c_pass}' ,'{$token}','inactive') ";
                                if(mysqli_query($conn, $sql)){   
                                    $subject = 'verify your emali';
                                    $txt = 'Hi '.$c_name.', Please verify your email by clicking http://localhost/nepcraft/varify.php?token='.$token;
                                    $headers = "From: nepcraft123@gmail.com";

                                    if (mail($c_email, $subject, $txt, $headers)) {
                                        $_SESSION['msg']="Please verify your email ".$c_name."." ;
                                       header('Location:http://localhost/nepcraft/login.php');
                                    } else {
                                        echo "Email sending failed...";
                                    }
                                }else{
                                    echo "<div class='alert alert-danger'>Signup failed.</div>" ;
                                }
                                }else{
                                    echo "<div class='alert alert-danger'>Passwords doesn\'t match.</div>" ;
                                }
                              }

                            
                          }  

                          include 'footer.php';    
?>