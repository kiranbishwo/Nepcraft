<?php include "connect.php";
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
    <title>Add new category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">

</head>
<body>

    <div class="container justify-content-center">
        <h2 class="text-center mx-4 ">Add New Category</h2><hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row ">
            
            <div class="form-group col-md-6">
                <label for="c_name">Category Name :</label>
                <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Enter Category name" required>
            </div>
            
            <div class="form-group col-md-6 ">
                <label for="cat_stock">Category Quantity:</label>
                <input type="number" class="form-control" name="cat_stock" id="cat_quantity" value="0" placeholder="Enter Category Quantity" required>
            </div>
            
            <div class="modal-footer  my-4">
                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                 <a href="category.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="submit" name="save" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>
    </div>
    <?php
    if( isset($_POST['save']) ){
            // database configuration
            $c_name =mysqli_real_escape_string($conn, $_POST['c_name']);
            $cat_stock =mysqli_real_escape_string($conn, $_POST['cat_stock']);

            
                $sql = "INSERT INTO category (cat_name, cat_stock)
                        VALUES ('{$c_name}',{$cat_stock})";

                if (mysqli_query($conn, $sql)){
                    header("location: {$hostname}/admin/category.php");
                }else{
                echo "<p style = 'color:red;text-align:center;margin: 10px 0';>Query Failed.</p>";
                }
            }
        
    mysqli_close($conn);


?>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>