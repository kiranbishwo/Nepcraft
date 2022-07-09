<?php
    include 'head.php'; 
   // echo $new_price;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 form">
    <?php

        $sql = "SELECT product.p_id ,product.p_price, product.p_discount, cart.cart_id ,cart.c_id , cart.p_cart,  cart.qty FROM product LEFT JOIN cart ON cart.p_cart = product.p_id WHERE cart.c_id = {$_SESSION['c_id']}";
        $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
        $new_price = 0;
        if(mysqli_num_rows($result) > 0 ){
        
        while($row = mysqli_fetch_assoc($result)){
            //  $o_id= order id
              $c_id = $row['c_id'];
              $p_id = $row['p_cart'];
              $qty = $row['qty'];
              $payment_status = 'cod';
              date_default_timezone_set('Asia/Kathmandu');
              $order_date = date("Y-m-d");
              $order_time = date("H:m");
            //   $shipping_address = $_POST['shiping_address'];
              $order_status ='Pending';
              $new_price = $row['p_price']-($row['p_price']*$row['p_discount'])/100;

            $sql1 = "INSERT INTO order_details ( p_id, c_id,  ordered_date, ordered_time, payment_status, order_status, new_price ,qty) VALUES ({$p_id} ,{$_SESSION['c_id']}  ,'{$order_date}' ,'{$order_time}' ,'{$payment_status}' ,'{$order_status}' ,{$new_price} ,{$qty})";

            if(mysqli_query($conn, $sql1)){
                $success = 1;
            }else{
                $success = 0;
            }

        }
        }else{
            $new_price = 0;
        }

        if($success == 1){
            echo "<div class='alert bg_success'>Order placed successfully</div>" ;

            $sql2 = "DELETE FROM cart WHERE c_id = {$_SESSION['c_id']}";

            if(mysqli_query($conn, $sql2)){
                echo "<div class='alert bg_success'>Order Deleted from cart.</div>" ;
            }else{
                echo "<div class='alert bg_error'>Query Failed to delete order from cart.</div>" ;
            }
        }else{
             echo "<div class='alert bg_error'>Query Failed.</div>" ;
        }
      
?>
           <a class="login-a mt-3"  href="index.php">Back To Home</a>
            </div>
        </div>
    </div>
<?php
include 'footer.php';  
?>