<?php
    include 'head.php';    
?>
    <div class="container-fulid ">
        <div class="row hide">
            <!-- <div class="col-3 category-link">
                <h3>CATEGORY</h3>
                <?php
                    $sql = "SELECT * FROM category";

                    $result = mysqli_query($conn, $sql) or die("Query Failed.");

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<a href='product.php?cat_id={$row['cat_id']}'>{$row['cat_name']}</a>";
                            // echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                        }
                        }
                    ?>
               
            </div> -->
            <div class="col-md-12 mb-3 p-0">
                <div class="cover">
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="images/ProjectBanner1.jpg" alt="cover1.png" width="1100" >
                         </div>
                        <div class="carousel-item">
                        <img src="images/ProjectBanner2_0.jpg" alt="cover2.png" width="1100" >
                        </div>
                        <div class="carousel-item">
                        <img src="images/banner3.jpg" alt="cover3.png" width="1100">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- all products  -->
    <div class="container ">
        <div class="row justify-content-center products-nav ">
            <div class="col-12 nav-for-products">
                <a href="" class="active-nav-for-product">All</a>
                <a href="product.php?case=a">Latest</a>
                <a href="product.php?case=b">Famous</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
        <?php
              

        $sql1 = "SELECT * FROM  product ORDER BY p_id DESC LIMIT 8";
                $result1 = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result1) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $new_price = $row1['p_price'] - ($row1['p_price']*$row1['p_discount']/100);
        ?>

            <div class="col-md-3 col-6 ">
                <div class="card">
                <img class="card-img-top w-100" src="admin/upload/<?php echo $row1['p_photo']; ?>" alt="Card image">
                <div class="card-body text-center">
                    <a href="product-details.php?p_id=<?php echo $row1['p_id']; ?>"><h5 class="card-title"><?php echo $row1['p_name']; ?></h5></a>
                    <p class="card-text text-muted">Rs. <?php echo $new_price; ?> <del> Rs. <?php echo $row1['p_price']; ?> </del></p>
                    <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button class="text-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row1['p_id'];?>"></i></button>
                    
                        <button  class="text-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row1['p_id'];?>"></i></button>
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
    
    <div class="container">
        <div class="col-12">
            <h5 class="profile-heading2">Latest Products</h5>
        </div>
    </div>
    <div class="container p-3">
        <div class="owl-carousel owl-theme">
<?php 

     $sql2 = "SELECT * FROM  product ORDER BY p_id DESC LIMIT 5";
                $result2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    while($row2 = mysqli_fetch_assoc($result2)) {
                        $new_price2 = $row2['p_price'] - ($row2['p_price']*$row2['p_discount']/100);
        ?>

           <div class="col-md-3 col-6 item">
                <div class="card">
                <img class="card-img-top w-100" src="admin/upload/<?php echo $row2['p_photo']; ?>" alt="Card image">
                <div class="card-body text-center">
                    <a href="product-details.php?p_id=<?php echo $row2['p_id']; ?>"><h5 class="card-title"><?php echo $row2['p_name']; ?></h5></a>
                    <p class="card-text text-muted">Rs.<?php echo $new_price2; ?>   <del> Rs.<?php echo $row2['p_price']; ?></del></p> 
                    <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button class="text-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row2['p_id'];?>"></i></button>
                    
                        <button  class="text-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row2['p_id'];?>"></i></button>
                        <?php
                    }else{
                         echo '<a href="login.php" class="text-danger" ><i class="fas fa-heart cart-heart" ></i></a>';
                    
                        echo '<a href="login.php"   class="text-primary" ><i class="fas fa-cart-plus add-cart " ></i></a>';
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
    
    <!-- load more -->
    <!-- <div class="container">
        <div class="row justify-content-center mb-2 mt-2">
            <div class="col-12 text-center">
                <button class="load-more">Load More</button>
            </div>
        </div>
    </div> -->







<?php
    include 'footer.php';    
?>