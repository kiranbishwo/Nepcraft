<?php
 include 'connect.php';
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
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css?v=<?php echo time(); ?>" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time();?>">
</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-2">
                 <h2>Orders</h2>
            </div>
        <hr>
        </div>
        <!-- search product start -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row ">
                        <div class="col-11">
                            <input type="text" name="search_item" class="form-control"  placeholder="Search Orders..">
                        </div>
                        <div class="col-1 ">
                            <button type="submit" name="search_btn" class="btn mb-2 background"><i class="fas fa-search"></i></button>
                        </div>
                </div>
            </div>
        </div>
        </form>
        <?php 
         $limit = 5;
                  if(isset($_GET["page"])){
                      $page = $_GET["page"];
                  }
                  else{
                      $page = 1;
                  };
                  $offset = ($page-1)* $limit;

        if(isset($_POST['search_btn'])){
            $search_value = $_POST['search_item'];
            $condition = "SELECT * FROM order_details LEFT JOIN product ON order_details.p_id = product.p_id LEFT JOIN customer ON customer.c_id = order_details.c_id WHERE o_id LIKE '%{$search_value}%' OR order_details.p_id LIKE '%{$search_value}%' OR product.p_name LIKE '%{$search_value}%' OR customer.c_name LIKE '%{$search_value}%'  ORDER BY o_id DESC LIMIT {$offset} ,{$limit}";
            $new_pagination = 1;
            if($new_pagination = 1){
            // for pagination
             $sql1 = "SELECT * FROM order_details LEFT JOIN product ON order_details.p_id = product.p_id LEFT JOIN customer ON customer.c_id = order_details.c_id WHERE o_id LIKE '%{$search_value}%' OR order_details.p_id LIKE '%{$search_value}%' OR product.p_name LIKE '%{$search_value}%' OR customer.c_name LIKE '%{$search_value}%'";

                 $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);
                }
            }
        }else{
            $condition = "SELECT * FROM  order_details LEFT JOIN product ON order_details.p_id = product.p_id LEFT JOIN customer ON customer.c_id = order_details.c_id 
                   ORDER BY o_id DESC LIMIT {$offset} ,{$limit}";
            // for pagination
            $sql1 = "SELECT * FROM order_details";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);
                }
        }
        ?>
        <!-- search product start -->

        <!--product list start  -->
        
        <div class="row p-3 table-responsive ">
            <table class="table table-sm table-striped table-hover table-borderless ">
                <thead class="background">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Product id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Customer's Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="edit">Details</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
              /* select query with offset and limit */
               $sql = "{$condition}";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                $serial = $offset + 1;
                while($row = mysqli_fetch_assoc($result)) {
           
                  ?>
                    <tr>
                    <td scope="row"><?php echo $row['o_id']; ?></td>
                    <td scope="row"><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['c_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td>Rs. <?php echo $row['new_price']*$row['qty']; ?></td>
                    <td><?php echo $row['shipping_address']; ?></td>
                    <td><?php echo $row['ordered_date']; ?></td>
                    <td><?php echo $row['payment_status']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td class="edit">
                        <div class="row  text-center">
                            <div class="col-12">
                                <!-- Button trigger update modal -->
                                <a href="orderdetails.php?o_id=<?php echo $row['o_id']; ?>" class="fas fa-info-circle text-primary"></a>
                            </div>
                        </div>
                    </td>
                    </tr>
          <?php
                $serial++;
                }
            }
                    ?>
                </tbody>
                </table>


        </div>
        <!--product list end  -->

          <!-- pagination part -->
        <nav aria-label="...">
            <?php
            
                echo '<ul class="pagination justify-content-center">';
                if($page > 1){
                    echo '<li class="page-item">
                   <a class="page-link" href="order.php?page='.($page - 1).'"><<</a>';
                  }
                for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="page-item "><a class="page-link '.$active.'" href="order.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page){
                    echo '<li class="page-item">
                    <a class="page-link" href="order.php?page='.($page + 1).'">>></a>
                    </li>';
                 }



?>
        </ul>
        </nav>
        <!-- pagination end -->
        <!-- model start -->

    </div>
<?php mysqli_close($conn); ?>
 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>