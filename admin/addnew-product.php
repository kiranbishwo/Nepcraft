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
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
        <h2 class="text-center mx-4 ">Add New Product</h2><hr>
        <form action="save-new-product.php" method="post" enctype="multipart/form-data">
            <div class="row">
            
            <div class="form-group col-md-4">
                <label for="p_name">Product Name</label>
                <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter Product name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="p_photo" >Choose Image:</label>
                <input type="file" class="form-control-file" name="p_photo" id="file" onchange="getImagePreview(event)"  required>
                    <div  id="preview" style="padding:15px">
                    </div>
            </div>
            <div class="form-group col-md-4">
             <label  for="p_category">Select Category:</label>
                <select class="form-control" name="p_category" id="p_category" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php
                    $sql = "SELECT * FROM category";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                        }
                        }
                    ?>
                </select>



            </div>
            <div class="form-group col-md-4">
                <label for="p_disc">Product Description</label>
                <textarea class="form-control" name="p_disc" id="p_disc" rows="3" placeholder="Enter Product Description" required></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="p_price">Product Price:</label>
                <input type="number" class="form-control" name="p_price" id="p_price" placeholder="Enter Product price" required>
            </div>
            <div class="form-group col-md-4">
                <label for="p_discount">Product Discount:</label>
                <input type="number" class="form-control" name="p_discount" id="p_discount" placeholder="Enter Product Discount rate" required>
            </div>
            <div class="form-group col-md-4">
                <label for="p_qty">Product Quantity:</label>
                <input type="number" class="form-control" name="p_qty" id="p_qty" placeholder="Enter Product Quantity" required>
            </div>
            <div class="form-group col-md-4">
             <label for="p_status">Select Status:</label>
                <select class="form-control" name="p_status" id="p_status" required>
                    <option value="" selected disabled>Select Products Status</option>
                    <?php
                    $sql1 = "SELECT * FROM available";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo "<option value='{$row1['available_id']}'>{$row1['available_status']}</option>";
                        }
                        }
                    ?>
                </select>



                
            </div>
            <div class="modal-footer my-4">
                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                 <a href="product.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="submit" name="save" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>
    </div>
   <?php mysqli_close($conn); ?>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
     function getImagePreview(event)
    {
        var image=URL.createObjectURL(event.target.files[0]);
        var imagediv= document.getElementById('preview');
        var newimg=document.createElement('img');
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="250";
        newimg.height="250";
        imagediv.appendChild(newimg);
    }
</script>
</body>
</html>