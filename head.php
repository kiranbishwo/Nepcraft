<?php include 'connect.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nepcraft</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" href="css/jquery.nice-number.min.css">
  <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
   <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/product.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/footer.css?v=<?php echo time(); ?>">

  </head>
  <body>
      <!-- header for desktop and tab view -->
  <div class="container-fluid shadow-sm desktop-nav">
      <div class="row header">
          <div class="col-3 brand text-center">
            <a href="index.php"><h1><i class="fas fa-dolly"></i><span class="brand-title">Nepcraft</span></h1></a>
          </div>
          <div class="col-5">
            <div class="nav-links text-center ">
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-th-list"></i> Category
                </a>
                <!-- dropdown items -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<a  class='dropdown-item' href='product.php?cat_id={$row['cat_id']}'>{$row['cat_name']}</a>";
                        }
                        }
                    ?>
            </div>
                <?php
                 if(isset($_SESSION['c_id'])){
                echo '<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                }
                if(!isset($_SESSION['c_id'])){
                echo  '<a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>';
                }
                ?>
                
            </div>
          </div>
          <div class="col-3 justify-content-end p-0">
            <form class="search_form LRform" action="product.php" method ="POST">
              <div class="row">
                <div class="col-9 search_item">
                  <input class="" type="text" name="search_item" placeholder="Search product" required>
                </div>
                <div class="col-2 search_item_btn">
                <button class="search_item_btn" type="submit" name="search"><i class="fas fa-search "></i></button>
              </div>
              </div>
              
            </form>
           
          </div>
          <div class="col-1 cart text-justify ">
              <a href="cart.php" type="button"  ><span class="badge badge-light bg-primary cart-badge">1</span><i class="fas fa-cart-plus  "></i></a>
            <a href="profile.php"><i class="fas fa-user "></i></a>
          </div>
      </div>
  </div>

  <!-- header for mobile view -->
  <div class="container-fluid mobile-nav">
      <div class="row">
          <div class="col-5 brand text-center p-0">
                <a href="index.php"><h1><i class="fas fa-dolly"></i><span class="brand-title">Nepcraft</span></h1></a>
          </div>
          <div class="col-5 p-0">
             <form  class="search_form LRform" action="product.php" method ="POST">
              <div class="row">
                <div class="col-9 search_item">
                  <input class="" type="text" name="search_item" placeholder="Search product" required>
                </div>
                <div class="col-2 search_item_btn">
                <button class="search_item_btn" type="submit" name="search"><i class="fas fa-search "></i></button>
              </div>
              </div>
              
            </form>

          </div>
          <div class="col-2 bars text-center">
            <button class="bar_icon"><i class="fas fa-bars"></i></button>
          </div>
      </div>
      <!-- nav links -->
      <div class="row hide-nav-links" >
          <div class="nav-links text-center">
                <a href="index.php">Home</a>
                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <!-- dropdown items -->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php
                    $sql = "SELECT * FROM category";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<a  class='dropdown-item' href='product.php?cat_id={$row['cat_id']}'>{$row['cat_name']}</a>";
                            // echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                        }
                        }
                    ?>
                </div>
                <?php
                 if(isset($_SESSION['c_id'])){
                echo '<a href="logout.php">Logout</a>';
                }
                if(!isset($_SESSION['c_id'])){
                echo  '<a href="login.php">Login</a>';
                }
                ?>
            </div>
      </div>

      <div class="row cart-profile">
          <div class="col-8">
          <?php
              if(isset($_SESSION["c_name"])){
                  echo '<h6>hello '.$_SESSION['c_name'].'</h6>';
              }
          ?>
          </div>
          <div class="col-4 small-cart">
              <a href="cart.php" type="button"  ><span class=" small-badge bg-primary cart-badge">0</span><i class="fas fa-cart-plus  "></i></a>
            <a href="profile.php"><i class="fas fa-user "></i></a>
          </div>
      </div>
  </div>
  </div>



  <!-- FOR ALLERT BOX -->


<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message from Nepcraft!!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <p id="alert_info">Product Successfully Added To Cart</p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
  

