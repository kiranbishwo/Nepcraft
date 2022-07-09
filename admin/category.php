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
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css?v=<?php echo time(); ?>" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-2">
                 <h2>Categories</h2>
            </div>
        <hr>
        </div>
        <!-- product adding start -->
        <div class="row justify-content-center">
            <div class="col-sm-4 col-12 mb-4">
                <a href="addnew_cat.php"  class="btn background w-100"><i class="fas fa-cart-plus"></i> &nbsp;&nbsp;Add New Category</a>
            </div>
        </div>
        <!-- product adding end -->
       

        <!--product list start  -->
        <div class="row p-3 table-responsive ">
            <table class="table table-sm table-striped table-hover table-borderless ">
                <thead class="background">
                    <tr>
                    <th scope="col">sn</th>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" class="edit">Delete</th>
                    </tr>
                </thead>
                <tbody>
        <?php
               
                  $limit = 5;
                  if(isset($_GET["page"])){
                      $page = $_GET["page"];
                  }
                  else{
                      $page = 1;
                  };
                  $offset = ($page-1)* $limit;
              /* select query with offset and limit */
              $sql = "SELECT * FROM  category  ORDER BY cat_id DESC LIMIT {$offset} ,{$limit}";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                    $serial = $offset + 1;
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                    <th scope="row"><?php echo $serial; ?></th>
                    <td><?php echo $row['cat_id']; ?></td>
                    <td><?php echo $row['cat_name']; ?></td>
                    <td><?php echo $row['cat_stock']; ?></td>
                    <td class="edit">
                        <div class="row  text-center">
                            <div class="text-danger">
                                <!-- Button trigger delete modal -->
                                <i class="far fa-trash-alt cat-del-btn" type="button" data-toggle="modal" data-target="#exampleModal"></i>
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
            $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);
                echo '<ul class="pagination justify-content-center">';
                if($page > 1){
                    echo '<li class="page-item">
                   <a class="page-link" href="category.php?page='.($page - 1).'"><<</a>';
                  }
                for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="page-item "><a class="page-link '.$active.'" href="category.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page){
                    echo '<li class="page-item">
                    <a class="page-link" href="category.php?page='.($page + 1).'">>></a>
                    </li>';
                 }
            }


?>
        </ul>
        </nav>
        <!-- pagination end -->
        <!-- model start -->

    </div>
   
        

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confermation</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                </button>
                <i class="fas fa-times " type="button" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body table-responsive">
                    <p>Delete Category!!!!</p>
                    <h5 id="deleting-cat-name"></h5>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <form action="delete-cat.php" method="post">
                    <input type="hidden" name="deleting-cat-id"  id="deleting-cat-id">
                    <button type="submit" name="submit" class="btn btn-sm btn-danger">Delete</button>
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
    $('.cat-del-btn').on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#deleting-cat-name').text(data[1]);
        $('#deleting-cat-id').val(data[0]);
    });

   });
  </script>
</body>
</html>