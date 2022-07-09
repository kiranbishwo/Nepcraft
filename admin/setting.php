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
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
</head>
<style>
    table{
        font-weight: bolder;
        padding: 20px;
    }
    .edit{
        text-decoration: none;
        font-weight: bold;
    }
    .btn{
        background-color: #290149;
        color: white;
        font-weight: bold;
    }
    .btn:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        background-color:  white;
        color: red;
    }
</style>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                 <h2>General Account Settings</h2>
            </div>
            <hr>
        </div>
        <div class="row p-3">
            <table class="table table-borderless  table-responsive">
            <tbody>
                <?php
                $sql = "SELECT * FROM  users LEFT JOIN role ON role.role_id = users.u_role  WHERE u_id = {$_SESSION['u_id']}";
                $result = mysqli_query($conn, $sql);
                //$result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
            
                    ?>
                <tr>
                    <td>id</td>
                    <td>:</td>
                    <td><?php echo $row['u_id']; ?></td>
                </tr>
                <tr>
                    <td>Name </td>
                    <td>:</td>
                    <td><?php echo $row['u_name']; ?></td>
                </tr>
                <tr>
                    <td>Role </td>
                    <td>:</td>
                    <td><?php echo $row['role_name']; ?></td>
                </tr>
                <tr>
                    <td>Email </td>
                    <td>:</td>
                    <td><?php echo $row['u_email']; ?></td>

                </tr>
                
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $row['u_address']; ?></td>

                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $row['u_phone']; ?></td>

                </tr>
                <tr>
                    <td>
                        <a href="change-password.php">Change your password!</a><br>
                        <a href="admin.php" target="_blank">See Older version!</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                
            </tbody>
            </table>
            <hr>
        </div>
        <div class="row">
            <div class=" text-center">
                <a href="generalsetting.php" type="button" class="btn">Edit</a>
            </div>
        </div>
    </div>
 <?php   mysqli_close($conn); ?>
 <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>