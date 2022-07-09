<?php
  include "connect.php";
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
    <title>General Setting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container justify-content-center">
        <h2 class="text-center mx-4 ">Users General setting</h2><hr>
        <?php
        $sql = "SELECT * FROM  users  WHERE u_id = {$_SESSION["u_id"]}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" >
            <div class="row ">
            <!-- <div class="form-group col-md-4 ">
                <label for="user_id">User's ID:</label>
                <input type="number" class="form-control" name="user_id" id="user_id" value="1234" required>
            </div> -->
            <div class="form-group col-md-4">
                <label for="u_name">User's Name :</label>
                <input type="text" class="form-control" name="u_name" id="u_name" value="<?php echo $row['u_name']; ?>">
            </div>
            
            <div class="form-group col-md-4 ">
                <label for="user_email">Email:</label>
                <input type="email" class="form-control" name="u_email" id="user_email" value="<?php echo $row['u_email']; ?>" >
            </div>
            <!-- <div class="form-group col-md-4 ">
                <label for="user_pass">Password:</label>
                <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Enter password" required>
            </div> -->
            <div class="form-group col-md-4 ">
                <label for="user_address">Address:</label>
                <textarea class="form-control" name="u_address" id="user_address" cols="30"><?php echo $row['u_address']; ?></textarea>  
            </div>
            <div class="form-group col-md-4 ">
                <label for="user_phone">Phone Number:</label>
                <input type="number" class="form-control" name="u_phone" id="user_phone" value="<?php echo $row['u_phone']; ?>" >
            </div>
            <div class="modal-footer  my-4">
                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                 <a href="setting.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="submit" name="submit" class="btn btn-sm btn-success">Update</button>
            </div>
        </form>
        <?php
                    }
                }

            if( isset($_POST['submit']) ){
                $u_name =mysqli_real_escape_string($conn, $_POST['u_name']);
                $u_email =mysqli_real_escape_string($conn, $_POST['u_email']);
                $u_address =mysqli_real_escape_string($conn, $_POST['u_address']);
                $u_phone =mysqli_real_escape_string($conn, $_POST['u_phone']);
            
                $sql = "UPDATE users SET u_name='{$u_name}' ,u_email='{$u_email}',u_address='{$u_address}',u_phone={$u_phone} WHERE u_id = {$_SESSION["u_id"]}";
                
                if(mysqli_query($conn, $sql)){
                     echo "<div class='alert alert-success'>Data Edited Successfully</div>" ;

                }else{
                    echo "<div class='alert alert-danger'>Query Failed.</div>" ;
                }
            }


?>
    </div>
     <?php   mysqli_close($conn); ?>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>