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
                <h4>Welcome to Nepcraft ! Please login</h4>
                <!-- <button class="btn w-100 text-center login_google"><p class="text-white m-0 "><i class="fab fa-google"></i> Login By Google</p></button> -->

                <form class="LRform" action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                    <label for="">Email*</label><br>
                    <input type="email" id="email" name="email" placeholder="Please enter your email." value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie']; }?>" required><br>
                    <label for="">Password</label><br>
                    <div id="passworddiv">
                      <input type="password"  name="password" id="password" value="<?php if(isset($_COOKIE['passcookie'])){echo $_COOKIE['passcookie'];}?>" placeholder="Please enter your password" required> <span id="showpass" onclick="showpass()"><i class="fas fa-eye"></i></span> <br>
                    </div>
                    <input type="checkbox" name="remember" class="mt-4"> Remember me. <br>
                    <input type="submit" name="submit" value="Login">
                </form>
                <?php
                if (isset($_SESSION['msg'])) {
                  echo '<p class="w-100 text-center text-white bg-success p-1 my-2" style="">';
                  echo $_SESSION['msg'];
                  echo '</p>';
                }else{
                 // echo $_SESSION['msg'] =  
                } ?>
                
                <p  class="login-p">New member? <a href="signup.php">Register </a> Here</p>
                <p  class="login-p"><a href="resetpassword.php">Forget password? </a></p>
                    <?php
                          if(isset($_POST['submit'])){

                            if(empty($_POST['email']) || empty($_POST['password'])){
                              echo '<div class="alert bg_error">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['email']);
                              $passforcookey = $_POST['password'];
                              $password = mysqli_real_escape_string($conn,md5($_POST['password']));

                               $sql = "SELECT c_id, c_name, c_email FROM customer WHERE c_email = '{$username}' AND status = 'active' AND c_pass= '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row1 = mysqli_fetch_assoc($result)){
                                  if (isset($_POST['remember'])) {

                                     setcookie('emailcookie',$username, time() +86400);
                                     setcookie('passcookie',$passforcookey, time() +86400);

                                     $_SESSION["c_id"] = $row1['c_id'];
                                     $_SESSION["c_name"] = $row1['c_name'];
                                     header('Location:http://localhost/nepcraft/index.php');
                                  }else{
                                     echo $_SESSION["c_id"] = $row1['c_id'];
                                     echo $_SESSION["c_name"] = $row1['c_name'];
                                     header('Location:http://localhost/nepcraft/index.php');
                                  }
                                 
                                }

                              }else{
                                echo '<div class="alert bg_error">Username and Password are not matched.</div>';
                              }
                          }
                          }
                        ?>
            </div>
            </div>
        </div>
    </div>
 


<?php
//         session_destroy();
    include 'footer.php';    
?>