<?php
 include 'connect.php';
 session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  if($_SESSION["u_role"] != 1){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/mastercss.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="container justify-content-center">
        <h2 class="text-center mx-4 ">Add New Employee</h2><hr>
        <form action="save-new-user.php" method="post" >
            <div class="row ">
            <!-- <div class="form-group col-md-4 ">
                <label for="user_id">User's ID:</label>
                <input type="number" class="form-control" name="u_id" id="user_id" value="1234" required>
            </div> -->
            <div class="form-group col-md-4">
                <label for="u_name">User's Name :</label>
                <input type="text" class="form-control" name="u_name" id="u_name" placeholder="Enter User's name" required>
            </div>
            <div class="form-group col-md-4">
             <label  for="u_role">Select Role:</label>
                <select class="form-control" id="p_role"  name ="u_role"required>
                    <option value="" selected disabled>Select Role</option>
                     <?php
                    $sql1 = "SELECT * FROM role";

                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            echo "<option value='{$row1['role_id']}'>{$row1['role_name']}</option>";
                        }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4 ">
                <label for="user_email">Email:</label>
                <input type="email" class="form-control" name="u_email" id="user_email" placeholder="Enter user's email" required>
            </div>
            <div class="form-group col-md-4 ">
                <label for="user_pass">Password:</label>
                <input type="password" class="form-control" name="u_pass" id="user_pass" placeholder="Enter password" required>
            </div>
            <div class="form-group col-md-4 ">
                <label for="user_address">Address:</label>
                <textarea class="form-control" name="u_address" id="user_address" cols="30"  placeholder="Enter Address" required></textarea>  
            </div>
            <div class="form-group col-md-4 ">
                <label for="user_phone">Phone Number:</label>
                <input type="number" class="form-control" name="u_phone" id="user_phone" placeholder="Enter Contact number" required>
            </div>
            <div class="modal-footer  my-4">
                <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                 <a href="users.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                <button type="submit" name="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>
    </div>
    <?php mysqli_close($conn); ?>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>