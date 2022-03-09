<?php
include_once './php/dbconnection.php';


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



<!--  content -->
<body>

<?php include "./php/navbar.php" ?>
	 <!-----------full-slider----------------------------->
   
     <div class="" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
             <!-- Owl-carousel -->
             <section id="banner-area">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                         <!--box-1--------------------------->
                        <div class="full-slider-box f-slide-1" >
                            
                            <div class="f-slider-text-container">
                            <div class="f-slider-text" >
                                <span>Limited Offer</span>
                                <strong style="color:brown;">30% Off<br/> With <font> Promo Code </font></strong>
                                <a href="#" class="f-slider-btn">Shop Now</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <!--box-2--------------------------->
                        <div class="full-slider-box f-slide-2">
                            
                            <div class="f-slider-text-container">
                            <div class="f-slider-text">
                                <span>Limited Offer</span>
                                <strong>30% Off<br/> With <font>Promo Code</font></strong>
                                <a href="#" class="f-slider-btn">Shop Now</a>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="item">
                         <!--box-3--------------------------->
                        <div class="full-slider-box f-slide-3">
                            
                            <div class="f-slider-text-container">
                            <div class="f-slider-text">
                                <span>Limited Offer</span>
                                <strong>30% Off<br/> With <font>Promo Code</font></strong>
                                <a href="#" class="f-slider-btn">Shop Now</a>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </section>
            <!-- !Owl-carousel -->


   <!--NEW ARRIVAL-------------------------------->
   <section class="new-arrival">
   <?php
        $category = $_GET["category"];
        if ($category == "men") {
            $sql = "SELECT * FROM `product` WHERE `category`= '$category'";
            $result1 = mysqli_query($con, $sql);    
        }elseif ($category == "women") {
            $sql = "SELECT * FROM `product` WHERE `category`= '$category'";
            $result1 = mysqli_query($con, $sql); 
        }elseif ($category == "kids") {
            $sql = "SELECT * FROM `product` WHERE `category`= '$category'";
            $result1 = mysqli_query($con, $sql);
        }
       
    ?>       
    <!--heading-------->
    <div class="arrival-heading">
        <strong>New Arrival</strong>
        <p>We Provide You New Fasion Design Clothes</p>
    </div>
      <!--products----------------------->
      <div class="product-container">
          
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
                      
                    <?php }else{ ?>
                      
                      <a onclick="test(<?php echo $row['product_id'] ?>,<?php echo $row['price'] ?>,<?php echo $row['seller_id'] ?>)" class="add-cart">
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
        $sql = "SELECT * FROM `product` ORDER BY `product_id` DESC LIMIT 4;";
        $result = mysqli_query($con, $sql);

    ?>         
    <!--heading-------->
    <div class="arrival-heading">
        <strong>You may like</strong>
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
                  <a onclick="test(<?php echo $row1['product_id'] ?>,<?php echo $row1['price'] ?>,<?php echo $row1['seller_id'] ?>)" class="add-cart">
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

<script>
// changing cover in carousel
$(document).ready(function () {
    category()
    
  });

  function category(){
    var category = "<?php echo $category ?>"
    console.log(category)
    $.ajax({
     url:"./php/category.php",
     method:"POST",
     data:{category:category},
     dataType:"json",   
     success:function(data){
        $(".f-slide-1").removeClass("f-slide-1").addClass(data.data);
        console.log("haha")
        }
    }); 
}  
</script>
</body>




</html>
