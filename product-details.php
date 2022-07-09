<?php
    include 'head.php'; 
         $p_id = $_GET['p_id'];
        $sql = "SELECT * FROM  product LEFT JOIN category ON product.p_cat = category.cat_id
                    LEFT JOIN available ON product.p_status = available.available_id WHERE p_id = {$p_id}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $new_price = $row['p_price'] - ($row['p_price']*$row['p_discount']/100);
        ?>
   <div class="container p-4">
       <div class="row">
           <div class="col-md-6 product-detail-img">
               <img src="admin/upload/<?php echo $row['p_photo']; ?>" alt="">
           </div>
           <div class="col-md-6 product-details">
               <?php  $cat_id = $row['p_cat']; ?>
               <h1><?php echo $row['p_name']; ?></h1>
               <p style="color: blue;"><?php echo $row['cat_name']; ?></p>

               <p><?php echo $row['p_disc']; ?></p>
               <h4>Rs <?php echo $new_price; ?></h4>
               <hp><del>Rs <?php echo $row['p_price']; ?></del> </hp>
               <p><?php echo $row['p_discount']; ?>% off</p>
               <p><?php echo $row['available_status']; ?></p>
               <form action="" class="p-0 pb-4 ">
                    <?php
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <div class="col-12 check-out-button">
                        <a href="cart.php?>" class="add-cart" data-id="<?php echo $row['p_id'];?>">Add To Cart</a>
                        </div>
                    <?php
                    }else{
                         echo '<div class="col-12 check-out-button">
                        <a href="login.php?>">Add To Cart</a>
                        </div>';
                    
                    }?>
                    
               </form>
                

           </div>
       </div>
   </div>
   <?php
                    }
                }
?>
   <div class="container">
        <div class="col-12">
            <h5 class="profile-heading2">Related Product</h5>
        </div>
    </div>
    <div class="container p-3">
        <div class="owl-carousel owl-theme">
        
    <?php 
     $sql1 = "SELECT * FROM  product WHERE p_cat = {$cat_id}";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $new_price1 = $row1['p_price'] - ($row1['p_price']*$row1['p_discount']/100);
        ?>


            <div class="col-md-3 col-6 item">
                <div class="card">
                <img class="card-img-top w-100" src="admin/upload/<?php echo $row1['p_photo']; ?>" alt="Card image">
                <div class="card-body text-center">
                    <a href="product-details.php?p_id=<?php echo $row1['p_id']; ?>"><h5 class="card-title"><?php echo $row1['p_name']; ?></h5></a>
                    <p class="card-text text-muted">Rs.<?php echo $new_price1; ?> <del>Rs.<?php echo $row1['p_price']; ?></del></p>
                    
                    <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button class="text-danger"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row1['p_id'];?>"></i></button>
                    
                        <button  class="text-primary"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row1['p_id'];?>"></i></button>
                        <?php
                    }else{
                         echo '<a href="login.php" class="text-danger"><i class="fas fa-heart" ></i></a>';
                    
                        echo '<a href="login.php"   class="text-primary"><i class="fas fa-cart-plus" ></i></a>';
                    }?>
                </div>
                </div>
            </div>
<?php
                    }
                }
?>

        </div>
    </div>
<?php  include 'footer.php';   ?>