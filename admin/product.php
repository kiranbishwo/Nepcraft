<?php
 include 'connect.php';
 session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  if($_SESSION["u_role"] != 1 && $_SESSION["u_role"] != 2){
      header("Location: {$hostname}/admin/");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css?v=<?php echo time(); ?>"integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">

</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-2">
                 <h2>Products</h2>
            </div>
            <hr>
        </div>
        <!-- product adding start -->
        <div class="row justify-content-center">
            <div class="col-sm-4 col-12 mb-4">
                <a href="addnew-product.php"  class="btn background w-100"><i class="fas fa-cart-plus"></i> &nbsp;&nbsp;Add New Product</a>
            </div>
        </div>
        <!-- product adding end -->
        <!-- search product start -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row ">
                        <div class="col-11">
                            <input type="text" name="search_item" class="form-control"  placeholder="Search Product.">
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
            $condition = "SELECT * FROM  product LEFT JOIN category ON product.p_cat = category.cat_id
                    LEFT JOIN available ON product.p_status = available.available_id WHERE p_id LIKE '%{$search_value}%' OR p_name LIKE '%{$search_value}%' OR cat_name LIKE '%{$search_value}%'  ORDER BY p_id DESC LIMIT {$offset} ,{$limit}";
            $new_pagination = 1;
            if($new_pagination = 1){
            // for pagination
             $sql1 = "SELECT * FROM product LEFT JOIN category ON product.p_cat = category.cat_id
                    LEFT JOIN available ON product.p_status = available.available_id WHERE p_id LIKE '%{$search_value}%' OR p_name LIKE '%{$search_value}%' OR cat_name LIKE '%{$search_value}%'";

                 $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);
                }
            }
        }else{
            $condition = "SELECT * FROM  product LEFT JOIN category ON product.p_cat = category.cat_id
                    LEFT JOIN available ON product.p_status = available.available_id ORDER BY p_id DESC LIMIT {$offset} ,{$limit}";
            // for pagination
            $sql1 = "SELECT * FROM product";
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
                    <th scope="col">sn</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="product_disc">Discription</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="edit">Edit</th>
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
                    <th scope="row"><?php echo $serial; ?></th>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['p_name']; ?></td>
                    <!-- use for modal image -->
                    <td class="p-0"style="display:none">upload/<?php echo $row['p_photo']; ?></td>
                    <td class="td_img"><img src="upload/<?php echo $row['p_photo']; ?>" alt="" width="100" height="100">
                
                </td>
                    <td style="display:none"><?php echo $row['p_cat']; ?></td>
                    <td><?php echo $row['cat_name']; ?></td>
                    <td class="product_disc"><?php echo $row['p_disc']; ?></td>
                    <td>Rs. <?php echo $row['p_price']; ?></td>
                    <td><?php echo $row['p_discount']; ?> %</td>
                    <td><?php echo $row['p_qty']; ?></td>
                    <td><?php echo $row['available_status']; ?></td>
                    <td class="edit">
                        <div class="row  ">
                            <div class="col-6 text-center">
                                <!-- Button trigger update modal -->
                                <a href="update.php?p_id=<?php echo $row['p_id']; ?>" class="far fa-edit  text-success "></a>
                            </div>
                            <div class="col-6 text-danger text-center">
                                <!-- Button trigger delete modal -->
                                <i class="far fa-trash-alt p-del-btn" type="button"  data-toggle="modal" data-target="#exampleModal"></i>

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
                   <a class="page-link" href="product.php?page='.($page - 1).'"><<</a>';
                  }
                for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="page-item "><a class="page-link '.$active.'" href="product.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page){
                    echo '<li class="page-item">
                    <a class="page-link" href="product.php?page='.($page + 1).'">>></a>
                    </li>';
                 }
 

?>
        </ul>
        </nav>
        <!-- pagination end -->
        <!-- model start -->

    </div>
    <div class="container">
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confermation</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                </button>
                <i class="fas fa-times " type="button" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body table-responsive">
                    <table class="table table-sm table-borderless ">
                            <thead class="background">
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row" class="p_id">1</th>
                                <td class="p_name">Fulbutte Sari</td>
                                <td><img class="img-thumbnail rounded " id="model-p-photo" src="photo/download (1).jpg" alt="" width="100" height="100"></td>
                                <td class="p_category">Sari</td>
                                <td class="p_price">Rs. 5000</td>                    
                                </tr>
                            </tbody>
                        </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <form action="delete-product.php" method="get">
                    <!-- delete product id -->
                    <input type="hidden" name="dp_id" id="dp_id">
                    <!-- delete available stock -->
                    <input type="hidden" name="das" id="das">
                    <!-- sybtract product from cateory -->
                    <input type="hidden" name="dcat_id" id="dcat_id">
                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>
                
            </div>
            </div>
        </div>
        </div>
    </div>
<?php mysqli_close($conn); ?>


 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
   $(document).ready(function(){
    $('.p-del-btn').on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
         
        $('.p_id').text(data[0]);
        $('.p_name').text(data[1]);
        $("#model-p-photo").attr("src", data[2]);
        $('.p_category').text(data[5]);
        $('.p_price').text(data[6]);

        // for delete product
        $('#dp_id').val(data[0]);
        $('#das').val(data[9]);
        $('#dcat_id').val(data[4]);

    });

   });
  </script>
</body>
</html>