<?php
include 'connect.php';
?>
<body>
    <div class="container-fluid footer p-0">
        <div class="container  py-5 px-0">
            <div class="row">
                <div class="col-12 footer-logo ">
                    <a href="index.php"><h1><i class="fas fa-dolly"></i><span class="brand-title">Nepcraft</span></h1></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-white text-justify"> 
                    <h4>About Us</h4>
                    <p>Nep~Craft is a platform where we can get varieties of Nepali handmade crafts and goods. The process of this website is easier and more reliable, so the customer will face fewer difficulties while accessing it. Here, the varieties of crafts along with their details are mentioned systematically. The price and the quality of the product are based on the types of Craft (nature of product).</p>
                </div>
                <div class="col-md-2 text-white footer-quick-link">
                    <h4>Quick Links</h4>
                     <a href="">All</a>
                    <a href="product.php?case=a">Latest</a>
                    <a href="product.php?case=b">Famous</a>
                </div>
                <div class="col-md-2 text-white footer-contact">
                    <h4>Contact Us</h4>
                    <p class="mt-2">061-23453(KTM) / 061-23453 (PKR) / 061-23453 (BTWL) / 061-23453 (MHNR) / nepcraft@gmail.com </p>
                </div>
                <div class="col-md-2 text-white footer-quick-link">
                    <h4>Follow Us</h4>
                    <a href=""><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href=""><i class="fab fa-twitter"></i> Twitter</a>
                    <a href=""><i class="fab fa-instagram"></i> Instagram</a>
                    <a href=""><i class="fab fa-youtube"></i> Youtube</a>
                </div>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-12 copyright">
                <p>@2021 copyright</p>
            </div>
        </div> 
    </div>
    <?php mysqli_close($conn); ?>

<!-- java scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <script src="js/jquery.nice-number.min.js"></script>
<script src="js/script.js"></script>
  </body>
</html>