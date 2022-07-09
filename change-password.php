<?php
    include 'head.php'; 

    $sql = "SELECT c_pass FROM customer WHERE c_id = {$_SESSION["c_id"]}";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

         if(mysqli_num_rows($result) > 0){

         while($row = mysqli_fetch_assoc($result)){
         $password = $row['c_pass'];
          }

        }   
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 form">
                <h4>Change your password</h4>
                <form class="LRform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="o_pass">Current password</label><br>
                    <input type="password" id="o_pass" name="o_pass" placeholder="Enter your current password" required><br>
                    <label for="n_pass">new password</label><br>
                    <input type="password" id="n_pass" name="n_pass" placeholder="Enter your new password" required><br>
                    <label for="c_pass">Confirm password</label><br>
                    <input type="password" id="c_pass" name="c_pass" placeholder="Enter your new password again" required><br>


                    <input type="submit" name="submit" value="Update">
                </form>
                
                    <?php
                if(isset($_POST['submit'])){
                    $o_pass = mysqli_real_escape_string($conn,md5($_POST['o_pass']));
                    $n_pass = mysqli_real_escape_string($conn,md5($_POST['n_pass']));
                    $c_pass = mysqli_real_escape_string($conn,md5($_POST['c_pass']));
                    //  echo $old_pass = $_SESSION["u_pass"];
                    if($n_pass !== $c_pass){
                        echo '<div class="alert bg_error">Confirm password doesn\'t match.</div>';
                    }
                    elseif(empty($n_pass) || empty($c_pass) || empty($o_pass)){
                        echo '<div class="alert bg_error">All Fields must be entered.</div>';
                    }
                    elseif($password !== $o_pass){
                        echo '<div class="alert bg_error">Old password doesn\'t match.</div>';
                    }
                    else{
                    
                    
                    $sql ="UPDATE customer  SET c_pass = '{$c_pass}' WHERE c_id = {$_SESSION['c_id']}";

                    if(mysqli_query($conn, $sql)){
                            echo '<div class="alert bg_success">Password successfully changed.</div>';
                        }else{
                            echo '<div class="alert bg_error">Some error occures.</div>';
                        }
                    } 
                
                    
                }
                
                mysqli_close($conn); ?>
                <a href="profile.php">Back</a>
            </div>
            </div>
        </div>
    </div>




<?php
    include 'footer.php';    
?>