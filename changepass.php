<?php
ob_start();
    include 'head.php'; 
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 form">
                <h4>Change your password</h4>
                <form class="LRform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="n_pass">new password</label><br>
                    <input type="password" id="n_pass" name="n_pass" placeholder="Enter your new password" required><br>
                    <label for="c_pass">Confirm password</label><br>
                    <input type="password" id="c_pass" name="c_pass" placeholder="Enter your new password again" required><br>


                    <input type="submit" name="submit" value="Update">
                </form>
                <a href="profile.php">Cancel</a>
            </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
         $n_pass = mysqli_real_escape_string($conn,md5($_POST['n_pass']));
         $c_pass = mysqli_real_escape_string($conn,md5($_POST['c_pass']));
         if(empty($n_pass) || empty($c_pass)){
            echo '<div class="alert alert-danger">All Fields must be entered.</div>';
        }
        elseif($c_pass !== $n_pass){
            echo '<div class="alert alert-danger">Old password doesn\'t match.</div>';
        }
        else{
           $sql ="UPDATE customer  SET c_pass = '{$c_pass}' WHERE token = '{$_GET['token']}'";

           if(mysqli_query($conn, $sql)){
                echo '<div class="alert alert-success">Password successfully changed.</div>';
                $_SESSION['msg']="password changed successfully";
                header('Location:http://localhost/nepcraft/login.php');
            }else{
                echo '<div class="alert alert-danger">Some error occures.</div>';
            }
           }
    
        
    }
    
    mysqli_close($conn); ?>



<?php
    include 'footer.php';    
?>