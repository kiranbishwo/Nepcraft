<?php
    include 'head.php';  
    if(isset($_GET['cat_id'])){
         $cat_id = $_GET['cat_id'];
         $condition = "SELECT * FROM  product WHERE p_cat = {$cat_id}";
    }
    else{
        $condition = "SELECT * FROM  product ";
    }
    if(isset($_POST['search'])){
        $search_value = $_POST['search_item'];
        $condition = "SELECT * FROM  product LEFT JOIN category ON product.p_cat = category.cat_id WHERE p_id LIKE '%{$search_value}%' OR p_name LIKE '%{$search_value}%' OR cat_name LIKE '%{$search_value}%'";
    }
    if(isset($_GET['case'])){
        $case = $_GET['case'];
        if($case == 'a'){
            $condition = "SELECT * FROM  product  ORDER BY p_id DESC LIMIT 20";
        }elseif($case == 'b'){
            $condition = "SELECT COUNT(wishlist.p_id), product.p_id, p_name, p_price,p_discount ,p_photo FROM wishlist LEFT JOIN product ON product.p_id = wishlist.p_id  GROUP BY wishlist.p_id ORDER BY COUNT(wishlist.p_id) DESC LIMIT 20";
        }
    }
?>
    <div class="container mt-4" >
        <div class="col-12">
            <h5 class="profile-heading2">All product</h5>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
        <?php
        $sql1 = "{$condition}";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while($row1 = mysqli_fetch_assoc($result1)) {
                $new_price1 = $row1['p_price'] - ($row1['p_price']*$row1['p_discount']/100);
?>
            <div class="col-md-3 col-6 ">
                <div class="card">
                <img class="card-img-top w-100" src="admin/upload/<?php echo $row1['p_photo']; ?>" alt="Card image">
                <div class="card-body text-center">
                    <a href="product-details.php?p_id=<?php echo $row1['p_id']; ?>"><h5 class="card-title"><?php echo $row1['p_name']; ?></h5></a>
                    <p class="card-text text-muted">Rs. <?php echo $new_price1; ?> <del>Rs.<?php echo $row1['p_price']; ?></del></p>
                    
                     <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button data-toggle="modal" data-target="#exampleModal" class="text-danger"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row1['p_id'];?>"></i></button>
                    
                        <button data-toggle="modal" data-target="#exampleModal" class="text-primary"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row1['p_id'];?>"></i></button>
                        <?php
                    }else{
                         echo '<a href="login.php" class="text-danger"><i class="fas fa-heart" ></i></a>';
                    
                        echo '<a href="login.php"   class="text-primary"><i class="fas fa-cart-plus" ></i></a>';
                    }?>
                </div>
                </div>
                <!-- <div class="row justify-content-center text-center">
                <h3 style="background-color: red; color:white; padding:10px;" >No Product Available</h3>
                </div> -->
            </div>
<?php
                    }
                }else{
                    echo '<div class="row justify-content-center text-center">
                <h3 style="background-color: red; color:white; padding:10px;" >No Product Available</h3>
                </div>';
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
                    <p class="card-text text-muted">Rs.<?php echo $new_price2; ?> <del>Rs.<?php echo $row2['p_price']; ?></del></p>                 
                    
                    <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button data-toggle="modal" data-target="#exampleModal" class="text-danger"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row2['p_id'];?>"></i></button>
                    
                        <button data-toggle="modal" data-target="#exampleModal"  class="text-primary"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row2['p_id'];?>"></i></button>
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
<!-- Most famous product -->
<div class="container">
        <div class="col-12">
            <h5 class="profile-heading2">Famous Products</h5>
        </div>
    </div>
    <div class="container p-3">
        <div class="owl-carousel owl-theme">
<?php 

     $sql3 = "SELECT COUNT(wishlist.p_id), product.p_id, p_name, p_discount, p_photo, p_price FROM wishlist LEFT JOIN product ON product.p_id = wishlist.p_id GROUP BY wishlist.p_id ORDER BY COUNT(wishlist.p_id) DESC LIMIT 5";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                    while($row3 = mysqli_fetch_assoc($result3)) {
                        $new_price3 = $row3['p_price'] - ($row3['p_price']*$row3['p_discount']/100);
        ?>

           <div class="col-md-3 col-6 item">
                <div class="card">
                <img class="card-img-top w-100" src="admin/upload/<?php echo $row3['p_photo'];?>" alt="Card image">
                <div class="card-body text-center">
                    <a href="product-details.php?p_id=<?php echo $row3['p_id']; ?>"><h5 class="card-title"><?php echo $row3['p_name']; ?></h5></a>
                    <p class="card-text text-muted">Rs.<?php echo $new_price3; ?> <del>Rs.<?php echo $row3['p_price']; ?></del></p>                 
                    
                    <?php                
                    if(isset($_SESSION["c_name"])){
                        ?>
                        <button data-toggle="modal" data-target="#exampleModal" class="text-danger"><i class="fas fa-heart cart-heart" data-wid="<?php echo $row3['p_id'];?>"></i></button>
                    
                        <button data-toggle="modal" data-target="#exampleModal"  class="text-primary"><i class="fas fa-cart-plus add-cart " data-id="<?php echo $row3['p_id'];?>"></i></button>
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

<?php
    include 'footer.php';    
?>