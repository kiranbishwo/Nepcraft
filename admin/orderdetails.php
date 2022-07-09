<?php
 include 'connect.php';
 ob_start();
 session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">
</head>
<style>
    table{
        font-weight: bolder;
        padding: 20px;
    }
    .edit{
        text-decoration: none;
        font-weight: bold;
    }
    table{
        width: 70%;
    }
    /* .btn{
        background-color: #290149;
        color: white;
        font-weight: bold;
    }
    .btn:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color:  white;
        color: red;
    } */
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                 <h2>Order Details</h2>
            </div>
        </div>
            <hr>
        <div class="row p-3">
            <table class="table table-borderless  table-responsive">
            <tbody>
                <?php
               $o_id = $_GET['o_id'];
                 $sql = "SELECT * FROM  order_details LEFT JOIN product ON order_details.p_id = product.p_id LEFT JOIN customer ON customer.c_id = order_details.c_id LEFT JOIN category ON product.p_cat = category.cat_id WHERE o_id = {$o_id}";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $qty = $row['qty'];
                    $p_id = $row['p_id'];
                    $order_status = $row['order_status'];
           
                  ?>
                <tr>
                    <td>Order id</td>
                    <td>:</td>
                    <td><?php echo $row['o_id']; ?></td>
                </tr>
                <tr>
                    <td>Product Id </td>
                    <td>:</td>
                    <td><?php echo $row['p_id']; ?></td>
                </tr>
                <tr>
                    <td>Product name </td>
                    <td>:</td>
                    <td><?php echo $row['p_name']; ?></td>
                </tr>
                <tr>
                    <td>Product Photo </td>
                    <td>:</td>
                    <td class="orderdetail_img" ><img src="upload/<?php echo $row['p_photo']; ?>" width="300" ></td>
                </tr>
                <tr>
                    <td>Category </td>
                    <td>:</td>
                    <td><?php echo $row['cat_name']; ?></td>

                </tr>
                <tr>
                    <td>Ordered Quantity</td>
                    <td>:</td>
                    <td><?php echo $row['qty']; ?></td>

                </tr>
                <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td>Rs. <?php echo $row['new_price']; ?></td>

                </tr>
                <tr>
                    <td>Ordered By</td>
                    <td>:</td>
                    <td><?php echo $row['c_name']; ?></td>

                </tr>
                <tr>
                    <td>email</td>
                    <td>:</td>
                    <td><?php echo $row['c_email']; ?></td>

                </tr>
                <tr>
                    <td>Shipping Adderss</td>
                    <td>:</td>
                    <td><?php echo $row['shipping_address']; ?></td>

                </tr>
                <tr>
                    <td>Contact</td>
                    <td>:</td>
                    <td><?php echo $row['c_phone']; ?></td>

                </tr>
                <tr>
                    <td>Ordered Date</td>
                    <td>:</td>
                    <td><?php echo $row['ordered_date']; ?></td>

                </tr>
                <tr>
                    <td>Ordered Time</td>
                    <td>:</td>
                    <td><?php echo $row['ordered_time']; ?></td>

                </tr>
                <tr>
                    <td>Payment Status</td>
                    <td>:</td>
                    <td><?php echo $row['payment_status']; ?></td>

                </tr>
                <tr>
                    <td>Order Status</td>
                    <td>:</td>
                    <td><?php echo $row['order_status']; ?></td>

                </tr>
                <tr>
                    <td>Total </td>
                    <td>:</td>
                    <td>Rs. <?php echo $row['new_price']*$row['qty']; ?></td>

                </tr>
         
            </tbody>
            </table>
            <hr>
        </div>
        <div class="row ">
            <div class=" text-center">
                
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                    <a href="order.php" type="button" class="btn btn-sm btn-secondary">Back</a>
                    <input type="hidden" name="hidden_order_id" value="<?php echo $row['o_id']; ?>">
                    <?php
                        if($order_status == 'Delevered'){
                            echo '<button type="submit" name="pending" class="btn btn-sm btn-danger">Make As Pending</button>';
                        }elseif($order_status == 'Pending'){
                            echo '<button type="submit" name="delever" class="btn btn-sm btn-success">Make As Delivered</button>';
                        }
                    ?>
                    
                    
                </form>
            </div>
        </div>
           <?php
                }
            }
            if(isset($_POST['delever'])){
                $hidden_order_id = $_POST['hidden_order_id'];
            $sql1 = "UPDATE order_details SET order_status='Delevered' WHERE o_id = {$hidden_order_id};";
            $sql1 .= "UPDATE product SET p_qty= p_qty - {$qty} WHERE p_id = {$p_id}";
    
                if(mysqli_multi_query($conn, $sql1)){
                    echo "<div class='alert alert-success'>Order Delevered successfully</div>" ;
                    header("location: {$hostname}/admin/order.php");
                }else{
                    echo "<div class='alert <div class='alert alert-danger'>Query failed</div>";
                }
            }
            if(isset($_POST['pending'])){
                $hidden_order_id = $_POST['hidden_order_id'];
            $sql1 = "UPDATE order_details SET order_status='Pending' WHERE o_id = {$hidden_order_id};";
            $sql1 .= "UPDATE product SET p_qty= p_qty + {$qty} WHERE p_id = {$p_id}";
    
                if(mysqli_multi_query($conn, $sql1)){
                    echo "<div class='alert alert-success'>Order Delevered Status Changed successfully</div>" ;
                    header("location: {$hostname}/admin/order.php");
                }else{
                    echo "<div class='alert <div class='alert alert-danger'>Query failed</div>";
                }
            }
mysqli_close($conn);
    ?>
    </div>


 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>