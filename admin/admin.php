<?php include 'connect.php'; 
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
  <title>Nepcraft admin panel</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
  <div class="container-fluid">
    <div class="row">
    <!-- sive nav start -->
    <div class=" col-md-2 topnav text-white ">
        <h2><i class="fas fa-dolly"></i> <span class="sidenavtext">Nepcraft</span></h2>
        <div class="nav flex-column nav-pills text-white" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home" aria-hidden="true"></i><span class="sidenavtext"> Home</span></a>
          <?php
          if($_SESSION["u_role"]!=3){
          echo '<a class="nav-link" id="v-pills-categories-tab" data-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="v-pills-categories" aria-selected="false"><i class="fas fa-th-large"></i><span class="sidenavtext"> Categories</span></a>';

          echo '<a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false"><i class="fas fa-box-open"></i><span class="sidenavtext"> Products</span></a>';
        }
        ?>
          <!-- <a class="nav-link" id="v-pills-charts-tab" data-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="v-pills-charts" aria-selected="false"><i class="fas fa-chart-line"></i><span class="sidenavtext"> Charts</span></a> -->
          <a class="nav-link" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="v-pills-order" aria-selected="false"><i class="fas fa-cart-arrow-down"></i><span class="sidenavtext"> Orders</span></a>
          <?php
          if($_SESSION["u_role"]==1){
            echo '<a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false"><i class="fas fa-users"></i><span class="sidenavtext"> Employee</span></a>';
          }
          ?>
          

          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cog"></i><span class="sidenavtext"> Setting</span></a>

        </div>
    </div>
    <!-- small col start here -->
    <div class=" small-col col-md-1 vh-100 topnav text-center text-white ">
        <h2><i class="fas fa-dolly"></i></h2>
        <div class="nav flex-column nav-pills text-white" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home" aria-hidden="true"></i></a>
         <?php
          if($_SESSION["u_role"]!=3){
          echo'<a class="nav-link" id="v-pills-categories-tab" data-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="v-pills-categories" aria-selected="false"><i class="fas fa-th-large"></i></a>';
         
          echo '<a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false"><i class="fas fa-box-open"></i></a>';
        }
        ?>
          <!-- 
          <a class="nav-link" id="v-pills-charts-tab" data-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="v-pills-charts" aria-selected="false"><i class="fas fa-chart-line"></i></a> -->
          <a class="nav-link" id="v-pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="v-pills-order" aria-selected="false"><i class="fas fa-cart-arrow-down"></i></a>
          <?php
          if($_SESSION["u_role"]==1){
            echo '<a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false"><i class="fas fa-users"></i></a>';
          }
            ?>

          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cog"></i></a>

        </div>
    </div>
    <!-- side nav end -->
    <!-- side nav for small mobile -->
    <div class="container-fluid mobile-nav">
        <div class="row px-4 py-2 topnav2 text-white">
        <div class="col-10">
          <h2><i class="fas fa-dolly"></i> <span class="sidenavtext">Nepcraft</span></h2>
        </div>
        <div class="col-2 justify-content-end">
          <a href="logout.php" class="fa fa-sign-out" aria-hidden="true"></a>
        </div>
      </div>
    </div>
<!-- nav nav-pills px-3 shadow-lg bg-white  nav-justified text-black mobilenav -->
    <div class="mobilenav p-0">
      <ul class=" nav nav-pills px-0 shadow-lg nav-fill" id="pills-tab" role="tablist" >
      <li class="nav-item">
        <a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-home text-black" aria-hidden="true"></i></a>
      </li>
      <?php
          if($_SESSION["u_role"]!=3){

      echo '<li class="nav-item">
       <a class="nav-link" id="pills-categories-tab" data-toggle="pill" href="#v-pills-categories" role="tab" aria-controls="pills-categories" aria-selected="false"><i class="fas fa-th-large text-black"></i></a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link " id="pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="pills-products" aria-selected="false"><i class="fas fa-box-open text-black" aria-hidden="true"></i></a>
      </li>';
    }
    ?>
      <!-- <li class="nav-item"> 
        <a class="nav-link " id="pills-charts-tab" data-toggle="pill" href="#v-pills-charts" role="tab" aria-controls="pills-charts" aria-selected="false"><i class="fas fa-chart-line text-black" aria-hidden="true"></i></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link " id="pills-order-tab" data-toggle="pill" href="#v-pills-order" role="tab" aria-controls="pills-order" aria-selected="false"><i class="fas fa-cart-arrow-down text-black" aria-hidden="true"></i></a>
      </li>
      <?php
          if($_SESSION["u_role"]==1){
            echo '<li class="nav-item">
                <a class="nav-link " id="pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="pills-users" aria-selected="false"><i class="fas fa-users text-black" aria-hidden="true"></i></a>
              </li>';
          }
          ?>
      <li class="nav-item">
        <a class="nav-link " id="pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false"><i class="fas fa-cog text-black" aria-hidden="true"></i></a>
      </li>
     
    </ul>
    </div>









    <!-- right col start -->

    <div class="col-md-10 no-gutter">
      <div class="row shadow bg-white justify-content-sm-between">
        <div class="col-md-1 ml-auto" id="icon">
          <i class="fa fa-bars" id="button"></i>

        </div>
        <div class="col-md-1 text-end"id="icon">
          <a href="logout.php" class="fa fa-sign-out" aria-hidden="true"></a>
        </div>
      </div>
      <div class="tab-content w-100" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><iframe src="home.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab"><iframe src="category.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab"><iframe src="product.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-charts" role="tabpanel" aria-labelledby="v-pills-charts-tab"><iframe src="chart.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab"><iframe src="order.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab"><iframe src="users.php" height="630" width="100%" title="Iframe Example"></iframe></div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><iframe src="setting.php" height="630" width="100%" title="Iframe Example"></iframe></div>
      </div>
    </div>


  </div>
</div>

  <!-- JavaScript Bundle with Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  $("#button").click(function(){
    $(".small-col").toggle();
    $(".col-md-2").toggleClass("sidenav");
    $(".col-md-10").toggleClass("col-md-11");

  });
});
</script>
</body>
</html>