<?php
 include 'connect.php';
 session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");

  }

  $sql = "SELECT u_pass FROM users WHERE u_id = {$_SESSION["u_id"]}";

          $result = mysqli_query($conn, $sql) or die("Query Failed.");

         if(mysqli_num_rows($result) > 0){

         while($row1 = mysqli_fetch_assoc($result)){
         $password = $row1['u_pass'];
          }

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
        <h2 class="text-center mx-4 ">Change password</h2><hr>
        <div class="row ">
            <div class="col-md-5 m-auto">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="form-group">
                        <label for="o_pass">Old Password</label>
                        <input type="password" class="form-control"  id="o_pass" name="o_pass" placeholder="Enter Old password" >
                    </div>
                    <div class="form-group ">
                        <label for="c_pass">New Password</label>
                        <input type="password" class="form-control"  id="n_pass" name="n_pass" placeholder="Enter New password" >
                    </div>
                    <div class="form-group">
                        <label for="c_pass">Confirm Password:</label>
                        <input type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Confirm Password" >
                    </div>
                    <div class="form-group  text-center p-4">
                        <button type="reset" class="btn btn-sm   btn-danger">Reset</button>
                        <a href="setting.php" type="button" class="btn btn-sm btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-success" name="submit">Update</button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
    <?php
    if(isset($_POST['submit'])){
        



         $o_pass = mysqli_real_escape_string($conn,md5($_POST['o_pass']));
         $n_pass = mysqli_real_escape_string($conn,md5($_POST['n_pass']));
         $c_pass = mysqli_real_escape_string($conn,md5($_POST['c_pass']));
        //  echo $old_pass = $_SESSION["u_pass"];
         if($n_pass !== $c_pass){
            echo '<div class="alert alert-danger">Confirm password doesn\'t match.</div>';
             die();
        }
        elseif(empty($n_pass) || empty($n_pass) || empty($n_pass)){
            echo '<div class="alert alert-danger">All Fields must be entered.</div>';
             die();
        }
        elseif($password !== $o_pass){
            echo '<div class="alert alert-danger">Old password doesn\'t match.</div>';
             die();
        }
        else{
        
        
         $sql ="UPDATE users  SET u_pass = '{$c_pass}' WHERE u_id = {$_SESSION['u_id']}";

        if(mysqli_query($conn, $sql)){
                echo '<div class="alert alert-success">Password successfully changed.</div>';
            }else{
                echo '<div class="alert alert-danger">Some error occures.</div>';
            }
           }
    
        
    }
    
    mysqli_close($conn); ?>

 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>