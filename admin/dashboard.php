<?php include 'connect.php'; 
session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>NEPCRAFT</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- external css -->
    <link rel="stylesheet" href="css/dashboard.css?v=<?php echo time(); ?>">
  </head>
  <body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="hamburger__inner">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
       </div>
    </div>
    <div class="menu shadow-sm">
      <div class="logo">
        <i class="fas fa-dolly"></i>NEP CRAFT
      </div>
      <div class="right_menu">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
      </div>
    </div>
  </div>
    
  <div class="main_container">
      <div class="sidebar">
          <div class="sidebar__inner">
            <ul>
              <li>
                <a href="#" class="tablinks active" onclick="openDiv(event, 'Dashboard')">
                  <span class="icon"><i class="fas fa-dice-d6"></i></span>
                  <span class="title">Dashboard</span>
                  <span class="tooltip">Dashboard</span>
                </a>
                
              </li>
              <?php
                if($_SESSION["u_role"]!=3){ ?>
                <li>
                  <a href="#" class=" tablinks" onclick="openDiv(event, 'Categories')">
                    <span class="icon"><i class="fas fa-th-large"></i></span>
                    <span class="title">Categories</span>
                    <span class="tooltip">Categories</span>
                  </a>
                </li>
                <li>
                  <a href="#" class=" tablinks" onclick="openDiv(event, 'Products')">
                    <span class="icon"><i class="fas fa-box-open"></i></span>
                    <span class="title">Products</span>
                    <span class="tooltip">Products</span>
                  </a>
                </li>
                <?php
                }
              ?>
              <li>
                <a href="#" class=" tablinks" onclick="openDiv(event, 'Orders')">
                  <span class="icon"><i class="fas fa-cart-arrow-down"></i></span>
                  <span class="title">Orders</span>
                  <span class="tooltip">Orders</span>
                </a>
              </li>
              <?php
                if($_SESSION["u_role"]==1){ ?>
                  <li>
                    <a href="#" class="tablinks" onclick="openDiv(event, 'Employees')">
                      <span class="icon"><i class="fas fa-users"></i></span>
                      <span class="title">Employees</span>
                      <span class="tooltip">Employees</span>
                    </a>
                  </li>
              <?php }  ?>
              
              <li>
                <a href="#" class="tablinks" onclick="openDiv(event, 'Setting')">
                  <span class="icon"><i class="fas fa-cog"></i></span>
                  <span class="title">Setting</span>
                  <span class="tooltip">Setting</span>
                </a>
              </li>

            </ul>
          </div>
      </div>
      <div class="content_div">
        <div id="Dashboard" class="tabcontent">
          <iframe src="home.php" height="100%" width="100%" title="Iframe Example"></iframe>
          
        </div>
        <div id="Categories" class="tabcontent">
            
          <iframe src="category.php" height="100%" width="100%" title="Iframe Example"></iframe>
        </div>
        <div id="Products" class="tabcontent">
          <iframe src="product.php" height="100%" width="100%" title="Iframe Example"></iframe>
        </div>
        <div id="Orders" class="tabcontent">
          <iframe src="order.php" height="100%" width="100%" title="Iframe Example"></iframe>
        </div>
        <div id="Employees" class="tabcontent">
          <iframe src="users.php" height="100%" width="100%" title="Iframe Example"></iframe>
        </div>
        <div id="Setting" class="tabcontent">
          <iframe src="setting.php" height="100%" width="100%" title="Iframe Example"></iframe>
        </div>
      </div>
  </div>
  
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="js/dashboard.js"></script>
    <script>
        $(document).ready(function () {
            $(".hamburger .hamburger__inner").click(function () {
                $(".wrapper").toggleClass("active")
            })

            $(".top_navbar .fas").click(function () {
                $(".profile_dd").toggleClass("active");
            });
            $("#Dashboard").show();
        });
    </script>
    <!-- <script src="js/dashboard.js?v=<?php echo time(); ?>"></script> -->
  </body>
</html>