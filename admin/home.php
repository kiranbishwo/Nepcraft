<?php include 'connect.php'; 
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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/home.css?v=<?php echo time();?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                 <h2>Dashboard</h2>
            </div>
            <div class="col-2 pt-2 ">
                 <h6 class="users_name">Hello! <?php echo$_SESSION["u_name"];?></h6>
            </div>
        <hr>
        </div>
        <div class="row">
        
        </div>
        <div class="row text-center">
            <?php if($_SESSION["u_role"]!=3){?>
            <div class="col-md-3">
                <div class="col-12  revenue">
                    <h3><i class="fas fa-hryvnia"></i> Total Revenue</h3>
                    <?php
                    $sql5 = "SELECT SUM(new_price) FROM order_details WHERE order_status= 'Delevered'";
                      $result5 = mysqli_query($conn, $sql5);
                      if (mysqli_num_rows($result5) > 0) {
                        $row5 = mysqli_fetch_assoc($result5);
                    }
                    ?>
                    <p><span>Rs.</span> <?php echo $row5['SUM(new_price)'];?></p>
                </div>
            </div>
            <?php } ?>
            <div class="<?php if($_SESSION["u_role"]==3){ echo 'col-md-4'; }?> col-md-3">
                <div class="col-12  income">
                    <h3><i class="fas fa-box-open"></i>Products</h3>
                    <?php
                      $sql4 = "SELECT COUNT(p_id) FROM  product";
                      $result4 = mysqli_query($conn, $sql4);
                      if (mysqli_num_rows($result4) > 0) {
                        $row4 = mysqli_fetch_assoc($result4);
                    }
                    ?>
                    <p><span></span> <?php echo $row4['COUNT(p_id)'];?></p>
                </div>
            </div>
            <div class="<?php if($_SESSION["u_role"]==3){ echo 'col-md-4'; }?> col-md-3">
                <div class="col-12  profit">
                    <h3><i class="far fa-chart-bar"></i>Orders</h3>
                    <?php
                      $sql3 = "SELECT COUNT(o_id) FROM  order_details";
                      $result3 = mysqli_query($conn, $sql3);
                      if (mysqli_num_rows($result3) > 0) {
                        $row3 = mysqli_fetch_assoc($result3);
                    }
                    ?>
                    <p><span></span> <?php echo $row3['COUNT(o_id)'];?></p>
                </div>
            </div>
            <div class="<?php if($_SESSION["u_role"]==3){ echo 'col-md-4'; }?> col-md-3">
                <div class="col-12  sales">
                    <h3><i class="fas fa-user-friends"></i> Customers</h3>
                <?php
               $sql1 = "SELECT COUNT(c_id) FROM  customer";
              $result1 = mysqli_query($conn, $sql1);
              if (mysqli_num_rows($result1) > 0) {
                $row1 = mysqli_fetch_assoc($result1);
            }

            ?>
                    <p><?php echo $row1['COUNT(c_id)'];   ?></p>
                </div>
            </div>
        </div>
<!-- line chaer  start-->
       <!--  <div class="row">
            <div class="col-12 line">
                <canvas id="myChart2" width="400" height="200"></canvas>
            </div>
            <div class="col-12 bar">
                <canvas id="myChart1" width="400" height="400"></canvas>
            </div>
            
        </div> -->

<!-- line chaer  end-->

<!-- most favourate product and latest product -->
        <div class="row mt-3">
            <!-- favorite products -->
            <div class="col-md-6 p-2">
                <div class="col-12">
                    <h5>Most favorite Products</h5>
                    <table class="table table-sm table-striped table-hover table-borderless table-responsive">
                    <thead class="background">
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
               <?php
                $sql3 = "SELECT COUNT(wishlist.p_id), product.p_id, p_name, cat_name, p_price, available_status FROM wishlist LEFT JOIN product ON product.p_id = wishlist.p_id LEFT JOIN category ON product.p_cat = category.cat_id LEFT JOIN available ON product.p_status = available.available_id GROUP BY wishlist.p_id ORDER BY COUNT(wishlist.p_id) DESC LIMIT 5";
              $result3 = mysqli_query($conn, $sql3);
              if (mysqli_num_rows($result3) > 0) {
                while($row3 = mysqli_fetch_assoc($result3)) {
           
                  ?>
                        <tr>
                        <th scope="row"><?php echo $row3['p_id']; ?></th>
                        <td><?php echo $row3['p_name']; ?></td>
                        <td><?php echo $row3['cat_name']; ?></td>
                        <td>Rs.<?php echo $row3['p_price']; ?></td>
                        <td><?php echo $row3['available_status']; ?></td>
                        </tr>
                <?php
                        }
                    }
                ?>   
                    </tbody>
                    </table>
                </div>
            </div>
            <!-- letest products -->
            <div class="col-md-6 p-2">
                <div class="col-12">
                    <h5>Latest Products</h5>
                    <table class="table table-sm table-striped table-hover table-borderless table-responsive">
                    <thead class="background">
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        </tr>
                    
                    </thead>
                    <tbody>
            <?php
               $sql2 = "SELECT * FROM  product LEFT JOIN category ON product.p_cat = category.cat_id
                    LEFT JOIN available ON product.p_status = available.available_id  ORDER BY p_id DESC LIMIT 5";
              $result2 = mysqli_query($conn, $sql2);
              if (mysqli_num_rows($result2) > 0) {
                while($row2 = mysqli_fetch_assoc($result2)) {
           
                  ?> 
                        <tr>
                        <th scope="row"><?php echo $row2['p_id']; ?></th>
                        <td><?php echo $row2['p_name']; ?></td>
                        <td><?php echo $row2['cat_name']; ?></td>
                        <td>Rs.<?php echo $row2['p_price']; ?></td>
                        <td><?php echo $row2['available_status']; ?></td>
                        </tr>
                        <?php
        }
    }
        ?>  
                            
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

       
       <?php if($_SESSION["u_role"]!=3){?>
        <!--all Customer  -->
         <div class="row p-3 table-responsive">
             <h5>All Customers</h5>
            <table class="table table-sm table-striped table-hover table-borderless ">
                <thead class="background">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
             <?php
               $sql = "SELECT * FROM  customer ORDER BY c_id DESC LIMIT 5";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
           
                  ?> 
                    <tr>
                    <th scope="row"><?php echo $row['c_id']; ?></th>
                    <td><?php echo $row['c_name']; ?></td></td>
                    <td><?php echo $row['c_gender']; ?></td></td>
                    <td><?php echo $row['c_dob']; ?></td></td>
                    <td><?php echo $row['c_email']; ?></td></td>
                    <td><?php echo $row['c_address']; ?></td></td>
                    <td><?php echo $row['c_phone']; ?></td></td>
                    </tr> 
        <?php
        }
    }
        ?>   
                    
                </tbody>
                </table>
        </div>
        <div class="row justify-content-center">
            <div class="col-2">
                <a href="alluser.php" class="btn btn-sm background">See More</a>
            </div>
            
        </div>
        <?php } ?>

    </div>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/line.js"></script>
  <script src="js/bar.js"></script>
</body>
</html>