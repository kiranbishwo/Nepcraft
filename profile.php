<?php
ob_start();
    include 'head.php';
    if(!isset($_SESSION["c_name"])){
    header('Location:http://localhost/nepcraft/login.php');
  }   
?>
<div class="container">
    <div class="row profile-info shadow-sm" >
        <?php
        $sql = "SELECT * FROM  customer WHERE c_id = {$_SESSION['c_id']}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 p-details">
            <div class="row ">
                <div class="col-4">
                    <p>Name</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_name']; ?></p>
                </div>
                <div class="col-4">
                    <p class="m-0">Email</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_email']; ?></p>
                </div>
                <div class="col-4">
                    <p>Gender</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_gender']; ?></p>
                </div>
                <div class="col-4">
                    <p class="m-0">Shipping Address</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['shipping_address']; ?></p>
                </div>
                
            </div>
        </div>
        <div class="col-sm-6 p-details">
            <div class="row ">
                <div class="col-4">
                    <p class="m-0">Address</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_address']; ?></p>
                </div>
                <div class="col-4">
                    <p>DOB</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_dob']; ?></p>
                </div>
                <div class="col-4">
                    <p class="m-0">Contact</p>
                </div>
                <div class="col-8">
                    <p><?php echo $row['c_phone']; ?></p>
                </div>
            </div>
        </div>
        <?php
                    }
                }
        ?>
    </div>
    <div class="row w-100">
        <div class="col-md-6 table-responsive">
            <h5 class="profile-heading2">My Wishlist</h5>
            <table class="table table-sm table-hover ">
            <thead>
             <?php
                $sql1 = "SELECT * FROM  wishlist LEFT JOIN product ON product.p_id = wishlist.p_id LEFT JOIN available ON product.p_status = available.available_id WHERE c_id = {$_SESSION['c_id']} ORDER BY w_id DESC";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                ?>
                <tr>
                <th scope="col">Product</th>
                <th scope="col">Photo</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody>
           <?php
                    while($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                <tr>
                <th scope="row"><a href="product-details.php?p_id=<?php echo $row1['p_id']; ?>" class="wished_product"><?php echo $row1['p_name']; ?></a></th>
                <td><img class="cart-img" src="admin/upload/<?php echo $row1['p_photo']; ?>" alt="" ></td>
                <td>Rs.<?php echo $row1['p_price']; ?></td>
                <td><?php echo $row1['available_status']; ?></td>
                <td> <button type="submit" class="w-cancel-button" data-wid="<?php echo $row1['w_id']; ?>"><i class="fas fa-times"></i></button></td>
                </tr>
             <?php
                                }?>
                            
            </tbody>
            <?php
                }
                          else{
                                echo 'no wish record found';
                            }
                ?>
            </table>
        </div>
        <div class="col-md-6  table-responsive">
            <h5 class="profile-heading2">My Orders</h5>
            <table class="table table-sm table-hover">
            <?php
                $sql2 = "SELECT * FROM  order_details LEFT JOIN product ON product.p_id = order_details.p_id WHERE order_details.c_id = {$_SESSION['c_id']} ORDER BY o_id DESC";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) { ?>
            <thead>
                <tr>
                <th scope="col">Product</th>
                <th scope="col">Photo</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php   while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <tr>
                <th scope="row"><a href="product-details.php?p_id=<?php echo $row2['p_id']; ?>" class="wished_product"><?php echo $row2['p_name']; ?></a></th>
                <td><img class="cart-img" src="admin/upload/<?php echo $row2['p_photo']; ?>" alt="" ></td>
                <td><?php echo $row2['qty']; ?></td>
                <td>Rs. <?php echo $row2['new_price']; ?></td>
                <td><?php echo $row2['order_status']; ?></td>
                </tr>
                <?php
                                }?>
                           
            </tbody>
            <?php }else{
                                echo 'No Orders Found!!!!';
                            }
                ?>
            </table>
        </div>

    </div>
        
    
    <div class="row">
        <div class="change-password">
            <p>Do you want to change your password? <a href="change-password.php">Click</a> Here</p>
            <p>Change Shipping Address <a href="change-shippingaddress.php">Click</a> Here</p>
        </div>
    </div>
</div>
<?php
    include 'footer.php';    
?>