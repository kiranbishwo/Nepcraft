<?php
    ob_start();
    include 'head.php';
    if(!isset($_SESSION["c_name"])){
    header('Location:http://localhost/nepcraft/login.php');
  }    
?>
    <div class="container mt-4 mb-4">
        <div class="col-12">
            <h5 class="profile-heading2">My Cart</h5>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <table class="table table-hover table-responsive">
            <thead>
                <tr>
                <th scope="col">Product</th>
                <th scope="col">Photo</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM  cart LEFT JOIN product ON product.p_id = cart.p_cart WHERE c_id = {$_SESSION['c_id']}";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $new_price = $row['p_price'] - ($row['p_price']*$row['p_discount']/100);
                ?>
                <tr id="tr">
                <th scope="row"><?php echo $row['p_name']; ?></th>
                <td><img class="cart-img" src="admin/upload/<?php echo $row['p_photo']; ?>" alt="" ></td>
                <td>
                1
                <!-- <form class="quantity">
                    <input type="number"  min="1" step="1"  class="cart-qty" data-ccid="<?php //echo $row['p_id']; ?>">
                </form> -->
                </td>
                <td>Rs.<?php echo $new_price; ?></td>
                <td> <button type="submit" class="c-cancel-button" data-id="<?php echo $row['cart_id']; ?>"><i class="fas fa-times"></i></button></td>
                </tr>
                <?php
                                }
                            }
                ?>
                
            </tbody>
            </table>
           

            <div id="error-message"></div>
            <div id="success-message"></div>
        </div>
        <div class="col-md-4 p-0">
            <div class="row ">
                <div class="row checkout">
                    <div class="col-12">
                        <h5>Order Summery</h5>
                    </div>
                    
                    <div class="row">
                        <div class="row border-for-checkout">
                            <div class="col-8">
                                <p>Sub Total</p>
                            </div>
                            <div class="col-4">
                                <p >Rs <span class="sub-total"></span></p>
                            </div>
                            <div class="col-8">
                                <p class="m-0">Shipping Charge</p>
                            </div>
                            <div class="col-4">
                                <p>Free</p>
                            </div>
                        </div>
                        <div class="col-8">
                            <h6 >TOTAL</h6>
                        </div>
                        <div class="col-4">
                            <h6 >Rs<span class="sub-total"></span> </h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 check-out-button">
                    <a href="check-out.php">Check Out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-3 mb-3">
            <a href="product.php" class="btn-continue"> Continue Shopping</a>
        </div>
    </div>

     <!-- <div class="row">
            <form action=""  class="w-100">
            <div class="col-md-6">
            <table>
                <tr>
                <th>head 1</th>
                <th>head 2</th>
                </tr>
                <tr>
                <td><input type="text"></td>
                <td>name</td>
                </tr>
            </div>
            <div class="col-md-6">
                <tr>
                <td><input type="text"></td>
                <td><input type="submit"></td>
                </tr>
                </table>
            </div>
            </form>
             </div> -->
</div>


<?php
    include 'footer.php';    
?>