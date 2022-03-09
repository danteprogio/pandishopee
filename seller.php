<?php
include_once './php/dbconnection.php';


if (!isset($_COOKIE["id_seller"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id_seller = $_GET["seller"];
}else{
  $id_seller = $_COOKIE["id_seller"];
  $sql = "SELECT * FROM `account_seller` WHERE `seller_id` = '$id_seller'";
  $result1 = mysqli_query($con, $sql);
  $seller = mysqli_fetch_array($result1);
}

if (!isset($_COOKIE["id"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id = "";
}else{
  $id = $_COOKIE["id"];
  
}


?>


<html>
<head>
<?php include "./php/imports_link.php" ?>
</head>

 <!--using FontAwesome and for icons--------------->
 <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

<!-- para mag fade with in 5sec ung nakalagay na wrong password/email -->
<script>
  $(function() {
    setTimeout(function() { $("#hideDiv").fadeOut(1500); }, 5000)
    })
</script>

<style>
  * {
  transition: 0.5s all ease-in-out;
  -webkit-transition: 0.5s all ease-in-out;
  -moz-transition: 0.5s all ease-in-out;
  -ms-transition: 0.5s all ease-in-out;
  -o-transition: 0.5s all ease-in-out;
}
.propic {
  border: 2px solid #e2e2e2;
  margin-top: -130px;
  margin-left: 70px;
  width:15%;
}
.cover {
  border: 2px solid #e2e2e2;
  margin-left: 50px;
  margin-top: 20px;
  width:92%;
  
}
.propic:hover,
.cover:hover {
  box-shadow: 0 0 10px 10px #9f9f9f;
  -webkit-box-shadow: 0 0 10px 10px #9f9f9f;
  -moz-box-shadow: 0 0 10px 10px #9f9f9f;
  -ms-box-shadow: 0 0 10px 10px #9f9f9f;
  -o-box-shadow: 0 0 10px 10px #9f9f9f;
}

.profile {

  border: 5px solid #e2e2e2;
  border-radius: 50%;
}


</style>

<body>

<?php include "./php/navbar.php" ?>

<!-- content -->
<?php
    $sql = "SELECT * FROM `account_seller` WHERE `seller_id` = '$id_seller'";
    $result1 = mysqli_query($con, $sql);
    $seller = mysqli_fetch_array($result1)
?>
<div class="" >
<img src="./images/cover-9.png" alt="Cover_Photo" class="cover" /> <br />
<img src="<?php echo $seller["profile"]?>" class=" profile  propic" alt="Profile_picture" />
<span style="font-size: 50px;" ><?php echo $seller["store_name"]?></span> 
  





 <!--product-categories-slider---------------------->
  <!-- category -->
  <section id="category">
    <div class="container py-5">
      <h4 >Category</h4>
      <hr>
      <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
        
          <div class="item py-2 ">
            <div class="product"> 
                <br>
              <a href="#"><img src="./images/feature_1.jpg" style="width: 117%;" alt="product1" ></a>
              <div class="text-center">
                <h6>T-Shirts</h6>
              </div>
            </div>
          </div>
          <div class="item py-2">
            <div class="product">
                <br>
              <a href="#"><img src="./images/feature_2.jpg" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Women T-Shirts</h6>
              </div>
            </div>
          </div>
          <div class="item py-2">
            <div class="product">
                <br>
              <a href="#"><img src="./images/feature_3.jpg" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Kids T-Shirts</h6>
              </div>
            </div>
          </div>
          <div class="item py-2">
            <div class="product">
                <br>
              <a href="#"><img src="./images/feature_4.jpg" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Pillow</h6>
              </div>
            </div>
          </div>
          <div class="item py-2">
            <div class="product">
                <br>
              <a href="#"><img src="./images/feature_5.jpg" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Phone Cases</h6>
              </div>
            </div>
          </div>
          <div class="item py-2">
            <div class="product">
                 <br>
              <a href="#"><img src="./images/feature_6.jpg" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6>Shopping Bags</h6>
              </div>
            </div>
          </div>
        </div> 
      <!-- !owl carousel -->
    </div>
  </section>
<!-- !category -->    







   <!--NEW ARRIVAL-------------------------------->
   <section class="new-arrival">
   <?php
        $sql = "SELECT * FROM `product` WHERE `seller_id` = '$id_seller'";
        $result1 = mysqli_query($con, $sql);

    ?>
    <!--heading-------->
    <div class="arrival-heading">
        <strong>New Arrival</strong>
        <p>We Provide You New Fasion Design Clothes</p>
    </div>
      <!--products----------------------->
      <div class="product-container">
      <?php
      while($row = mysqli_fetch_array($result1)) { ?>
        <!--product-box-1---------->
          <div class="product-box">
              <!--product-img------------>
              <div class="product-img">
                  <!--add-cart---->
                  <?php
                    if (!isset($_COOKIE["id"])) { ?>
  
                      <a  class="add-cart user" onclick="uselogin()">
                        <i class="fas fa-shopping-cart"></i>
                      </a>
                      
                    <?php }elseif (isset($_COOKIE["id"])) { ?>
                      
                      <a onclick="test(<?php echo $row['product_id'] ?>,<?php echo $row['price'] ?>)" class="add-cart">
                        <i class="fas fa-shopping-cart"></i>
                      </a>
                      
                   <?php }?>
                 
                  <!--img------>
                <img src="<?php echo $row['image'] ?>">
              </div>
              <!--product-details-------->
              <div class="product-details">
                  <a href="./productviewing.php?product_no=<?php echo $row['product_id'] ?>" class="p-name"><?php echo $row['product_name'] ?></a>
                  <span class="p-price">₱ <?php echo $row['price'] ?></span>
              </div>
          </div>

      <?php }?>
      </div>
  </section>

  <!--Feature-items-------------------------------->
   <section class="new-arrival">
   <?php
        $sql = "SELECT * FROM `product` WHERE `seller_id` = '$id_seller' ORDER BY `product_id` DESC LIMIT 4 ;";
        $result = mysqli_query($con, $sql);

    ?>
    <!--heading-------->
    <div class="arrival-heading">
        <strong>Featured Items</strong>
        <p>We Provide You New Fasion Design Clothes</p>
    </div>
      <!--products----------------------->
      <div class="product-container">
          
      <?php
      while($row1 = mysqli_fetch_array($result)) { ?>
        <!--product-box-1---------->
          <div class="product-box">
              <!--product-img------------>
              <div class="product-img">
                  <!--add-cart---->
                  <a href="#" class="add-cart">
                      <i class="fas fa-shopping-cart"></i>
                    </a>
                  <!--img------>
                <img src="<?php echo $row1['image'] ?>">
              </div>
              <!--product-details-------->
              <div class="product-details">
                  <a href="./productviewing.php?product_no=<?php echo $row1['product_id'] ?>" class="p-name"><?php echo $row1['product_name'] ?></a>
                  <span class="p-price">₱ <?php echo $row1['price'] ?></span>
              </div>
          </div>

      <?php }?>
      </div>
  </section>


   <!--banner-->
   <div class="banner-box f-slide-3">
        
        <div class="banner-text-container">
        <div class="banner-text">
            <span>Limited Offer</span>
            <strong>30% Off<br/> With <font>Promo Code</font></strong>
            <a href="#" class="banner-btn">Shop Now</a>
        </div>
        </div>

    </div> 



    <!--services------------------------->
     <section class="services">
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-shipping-fast"></i>
            <span>Free Shipping</span>
            <p>Free Shipping for all US order</p>
        </div>
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-headphones-alt"></i>
            <span>Support 24/7</span>
            <p>We support 24h a day</p>
        </div>
        <!--services-box---------->
        <div class="services-box">
            <i class="fas fa-sync"></i>
            <span>100% Money Back</span>
            <p>You have 30 days to Return</p>
        </div>
        
    </section>







    <!--footer---------------------------->
    <footer>
        <!--copyright-------------->
        <span class="copyright">
            Copyright 2020 - dante progio
        </span>
        <!--subcribe---------------->
        <div class="subscribe">
            <form>
            <input type="email" placeholder="Example@gmail.com" required/>
            <input type="submit" value="Subscribe">
            </form>
        </div>
    </footer>

    <!-- pop up side notification -->
    <link rel="stylesheet" href="./css/popupnotif.css">
    
    <section class="custom-social-proof">
    </section>

    <!-- cart side pop up -->
    <script src="./cart.js"></script>
   <!-- !pop up side notification -->

<!--using JQuery--------------->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="navbar/nav_fix_position.js"></script>
<script src="searchbar.js"></script>
<script src="login.js"></script>
<script src="slider.js"></script>
<script src="product-categories.js"></script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!-- clean string -->
<script src="./clean_string.js"></script>

</body>




</html>
