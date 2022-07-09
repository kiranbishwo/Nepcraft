<?php
    include 'head.php'; 

    $sql = "SELECT shipping_address FROM customer WHERE c_id = {$_SESSION["c_id"]}";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

         if(mysqli_num_rows($result) > 0){

         while($row = mysqli_fetch_assoc($result)){
         $shipping_address = $row['shipping_address'];
          }

        }   
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 form">
                <h4>Change your Shipping Address</h4>
                <form class="LRform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <label for="o_pass">Current Shipping Address</label><br>
                    <input type="text" id="shipping_address" name="shipping_address" placeholder="Enter your current password" value="<?php echo $shipping_address ?>"><br>
                    
                    <input type="submit" name="submit" value="Update">
                </form>
                
                <?php
                if(isset($_POST['submit'])){
                    $shipping_address = mysqli_real_escape_string($conn,$_POST['shipping_address']);
                    
                    $sql ="UPDATE customer  SET shipping_address = '{$shipping_address}' WHERE c_id = {$_SESSION['c_id']}";

                    if(mysqli_query($conn, $sql)){
                            echo '<div class="alert bg_success">Shipping Address Changed successfully .</div>';
                        }else{
                            echo '<div class="alert bg_error">Some error occures.</div>';
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