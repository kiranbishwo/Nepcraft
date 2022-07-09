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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        .background{
            background-color: #290149;
            color: white;
            font-weight: bold;
        }
        .col-sm-1 .background:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color:  white;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p2-2">
                 <h2>All Users</h2>
            </div>
        <hr>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-1">
                <a href="home.php" class="btn btn-sm background">Back</a>
            </div>
        </div>
       
        <!--all Customer  -->
         <div class="row p-3 table-responsive text-center">
            <table class="table table-sm table-striped table-hover table-borderless ">
                <thead class="background">
                    <tr>
                    <th scope="col">Sn</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Shipping Address</th>
                    <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                <?php
               
                  $limit = 7;
                  if(isset($_GET["page"])){
                      $page = $_GET["page"];
                  }
                  else{
                      $page = 1;
                  };
                  $offset = ($page-1)* $limit;
              /* select query with offset and limit */
               $sql = "SELECT * FROM  customer ORDER BY c_id DESC LIMIT {$offset} ,{$limit}";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                $serial = $offset + 1;
                while($row = mysqli_fetch_assoc($result)) {
           
                  ?>
                    <tr>
                    <th scope="row"><?php echo $serial; ?></th>
                    <td><?php echo $row['c_id']; ?></td>
                    <td><?php echo $row['c_name']; ?></td>
                    <td><?php echo $row['c_gender']; ?></td>
                    <td><?php echo $row['c_dob']; ?></td>
                    <td><?php echo $row['c_email']; ?></td>
                    <td><?php echo $row['c_address']; ?></td>
                    <td><?php echo $row['shipping_address']; ?></td>
                    <td><?php echo $row['c_phone']; ?></td>
                    </tr>                  
                       <?php
                    $serial++;
                }
            }
                    ?> 
                </tbody>
                </table>

        </div>

        <!-- pagination part -->
        <nav aria-label="...">
            <?php
            $sql1 = "SELECT * FROM customer";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);
                echo '<ul class="pagination justify-content-center">';
                if($page > 1){
                    echo '<li class="page-item">
                   <a class="page-link" href="alluser.php?page='.($page - 1).'"><<</a>';
                  }
                for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="page-item "><a class="page-link '.$active.'" href="alluser.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page){
                    echo '<li class="page-item">
                    <a class="page-link" href="alluser.php?page='.($page + 1).'">>></a>
                    </li>';
                 }
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