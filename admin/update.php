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
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
    $id = $_GET['p_id'];
    $sql = "SELECT * FROM  product WHERE p_id = {$id}";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {

    ?>

    <div class="container">
        <h2 class="text-center mx-4 ">Update Product</h2><hr>
        <form action="update-product.php" method="post" enctype="multipart/form-data">
            <div class="row">
            <input type="hidden" class="form-control" id="p_id" name="p_id" value="<?php  echo $row['p_id']; ?>" >
            <div class="form-group col-md-4">
                <label for="p_name">Product Name</label>
                <input type="text" class="form-control" value="<?php echo $row['p_name']; ?>" id="p_name" name="p_name" placeholder="Enter Product name" >
            </div>
            <div class="form-group col-md-4">
                <label for="p_photo" >Choose Image:</label>
                <input type="hidden" name="old_img" value="<?php echo $row['p_photo']; ?>">
                <input type="file" class="form-control-file" name="p_photo" id="file" onchange="getImagePreview(event)">
                    <div class="div" id="oldpreview">
                        <img src="upload/<?php echo $row['p_photo']; ?>"  alt="" width="250" height="250">
                    </div>
                    <div  id="preview" ></div>
            </div>
            <div class="form-group col-md-4">
             <label  for="p_category">Select Category:</label>
             <input type="hidden" name="old_cat" value="<?php echo $row['p_cat']; ?>">
                <select class="form-control" id="p_category" name="p_category" >
                    <option value="" selected disabled>Select Category</option>
                    <?php
                    $sql1 = "SELECT * FROM category";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            if($row1['cat_id']==$row['p_cat']){
                                $selected = "selected";

                            }
                            else{
                                $selected = "";
                            }
                            echo "<option value='{$row1['cat_id']}' ".$selected.">{$row1['cat_name']}</option>";
                        }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="p_disc">Product Discription</label>
                <textarea class="form-control" id="p_disc" name="p_disc" rows="3" placeholder="Enter Product Discription" ><?php echo $row['p_disc']; ?></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="p_price">Product Price:</label>
                <input type="number" class="form-control" value="<?php echo $row['p_price']; ?>" name="p_price" id="p_price" placeholder="Enter Product price" >
            </div>
            <div class="form-group col-md-4">
                <label for="p_disc">Product Discount:</label>
                <input type="number" class="form-control" value="<?php echo $row['p_discount']; ?>" name="p_discount" id="p_disc" placeholder="Enter Product Discount rate" >
            </div>
            <div class="form-group col-md-4">
                <label for="p_qty">Product Quantity:</label>
                <input type="hidden" name="old_qty" id="old_qty"  value="<?php echo $row['p_qty']; ?>"  >
                <input type="number" class="form-control" name="p_qty" id="p_qty"  value="<?php echo $row['p_qty']; ?>"  placeholder="Enter Product Quantity" >
            </div>
            <div class="form-group col-md-4">
             <label for="p_status">Select Status:</label>
                <select class="form-control" id="p_status" name="p_status"  >
                    <option value="" selected disabled>Select Status</option>
                     <?php
                    $sql2 = "SELECT * FROM available ";

                    $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");

                    if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                            if($row2['available_id']==$row['p_status']){
                                $selected = "selected";

                            }
                            else{
                                $selected = "";
                            }
                            echo "<option value='{$row2['available_id']}' ".$selected.">{$row2['available_status']}</option>";
                        }
                        }
                    ?>
                </select>
                
            </div>
            <div class="modal-footer my-4">
                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                 <a href="product.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-sm btn-success">Update</button>
            </div>
        </form>
    </div>
    <?php
                }
            }
            ?>
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
        var oldimg = document.getElementById('oldpreview');
        oldimg.innerHTML='';
        newimg.src=image;
        newimg.width="250";
        newimg.height="250";
        imagediv.appendChild(newimg);
    }
</script>

</body>
</html>