<?php include 'connect.php'; 
session_start();

  if(isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/dashboard.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Nepcraft Login</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="css/login.css?v=<?php echo time();?>">

</head>
<body>
<div class="container align-content-center">
    <div class="row justify-content-center text-white p-4">
        <div class="col-md-5 background p-4 " >
            <div class="col-12 text-center">
                <h2><i class="fas fa-dolly"></i> <span class="text-white">Nepcraft</span></h2>
            </div>
            <form class="p-3" action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div id="passworddiv">
                    <input type="password" class="form-control"
                    name="password" id="password" placeholder="Password"><span id="showpass" onclick="showpass()"><i class="fas fa-eye"></i></span>
                </div>
                
            </div>
            
            <div class="col-12 text-center my-2">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
                        <?php
                          if(isset($_POST['submit'])){

                            if(empty($_POST['email']) || empty($_POST['password'])){
                              echo '<div class="alert bg_error">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['email']);
                              $password = mysqli_real_escape_string($conn,md5($_POST['password']));

                               $sql = "SELECT u_id, u_name, u_role FROM users WHERE u_email = '{$username}' AND u_pass= '{$password}'";

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){

                                while($row1 = mysqli_fetch_assoc($result)){
                                  session_start();
                                 echo  $_SESSION["u_id"] = $row1['u_id'];
                                 echo  $_SESSION["u_name"] = $row1['u_name'];
                                 echo  $_SESSION["u_role"] = $row1['u_role'];

                                  header("Location: {$hostname}/admin/dashboard.php");
                                }

                              }else{
                              echo '<div class="alert bg_error">Username and Password are not matched.</div>';
                            }
                          }
                          }
                        ?>


        </div>

    </div>
    
</div>
<canvas id="scene"></canvas>
<input id="copy" type="hidden" value="♥ NEPCRAFT ♥" />

<?php  mysqli_close($conn); ?>
  <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/dotsanimate.js?v=<?php echo time();?>"></script>
  <script>
    // foe showing password 
var state= false;
function showpass(){
    if (state) {
        document.getElementById('password').setAttribute("type","password");
        document.getElementById('showpass').style.color='gray';
        state= false;
    }else{
        document.getElementById('password').setAttribute("type","text");
        document.getElementById('showpass').style.color='blue';
        state= true;
    }

}

  </script>

</body>
</html>