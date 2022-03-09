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

 <!-- Shopping cart section  -->
 <section id="cart" class="py-3">
                    <div class="container-fluid w-75">
                        <h4 class="font-baloo font-size-20">Shopping Cart</h4>

                        <?php
                            $seller_global = "";
                            $sql = "SELECT * FROM `cart` WHERE  `user_id` = '$id ' and `place_order_number`= 0 ORDER BY `seller_id` ";
                            $result1 = mysqli_query($con, $sql);

                        ?>
                        <!--  shopping cart items   -->
                            <div class="row">
                                <div class="col-sm-9">

                                <?php
                                    while($row = mysqli_fetch_array($result1)) { 
                                        
                                        // kukunin unproduct info sa product database 
                                        $product_id = $row["product_id"];
                                        $sql = "SELECT * FROM `product` WHERE `product_id` ='$product_id'";
                                        $result = mysqli_query($con, $sql);
                                        $product = mysqli_fetch_array($result)
                                   
                                        
                                        
                                        ?>

                                        <?php 
                                        // kukunin ung info ni seller like store name  sa account_seller database
                                            $seller_id = $product["seller_id"];
                                            $sql = "SELECT * FROM `account_seller` WHERE `seller_id` ='$seller_id'";
                                            $result2 = mysqli_query($con, $sql);
                                            $seller = mysqli_fetch_array($result2);

                                            // kapag c seller_global ay same sa $row['seller_id'] wala cyang gagawin
                                            if ($seller_global == $row['seller_id']) { 
                                               ?>

                                            <!-- kapag naman d mag kamuka gagawa cya ng bagong header nakalagay ung store name  -->
                                           <?php } else{ 
                                                $seller_global = $seller['seller_id']; ?>
                                                
                                                <hr>
                                                <h4><a href="./seller.php?seller=<?php echo $seller['seller_id'] ?>"><i class="fas fa-store"></i> <?php echo $seller["store_name"]?></a></h4>
                                                
                                           <?php }
                                             ?>
                                    <!-- cart item   -->
                                       
                                        <div class="row border-top py-3 mt-3">
                                            <div class="col-sm-2">
                                                <img src="<?php echo $product["image"] ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                            </div>
                                            <div class="col-sm-8">
                                                <h5 class="font-baloo font-size-20"><?php echo $product["product_name"] ?></h5>

   
                                                <small>Size: <?php echo $row["size"] ?></small> <br>
                                                <small><a href="./seller.php?seller=<?php echo $seller['seller_id'] ?>">Seller: <?php echo $seller["store_name"]?></a></small>
                                                <!-- product rating -->
                                                <div class="d-flex">
                                                    <div class="rating text-warning font-size-12">
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="fas fa-star"></i></span>
                                                        <span><i class="far fa-star"></i></span>
                                                      </div>
                                                      <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                                </div>
                                                <!--  !product rating-->

                                                <!-- product qty -->
                                                    <div class="qty d-flex pt-2">
                                                        <div class="d-flex font-rale w-25">
                                                            <!-- hidden input to be avle to track the product id for update qty -->
                                                            <!-- i use id of the cart to able to identify each item -->
                                                            <input type="hidden" data-id="<?php echo $row["id"]?>"   class="qty_input1 border px-2 w-100 bg-light" disabled  value="<?php echo $row["id"] ?>" >
                                                            <button class="qty-up border bg-light" data-id="<?php echo $row["id"] ?>"  ><i class="fas fa-angle-up"></i></button>
                                                            <input type="text" data-id="<?php echo $row["id"]?>" id="qty"  class="qty_input border px-2 w-100 bg-light" disabled  value="<?php echo $row["qty"] ?>" >
                                                            <button data-id="<?php echo $row["id"] ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                                        </div>
                                                        <button data-target=".bs-<?php echo $row["product_id"],$row["size"] ?>-modal-sm" data-toggle="modal" class="btn font-baloo text-danger px-3 border-right">Delete</button>

                                                        <button type="submit" class="btn font-baloo text-danger">Save for Later</button>
                                                        <?php include './php/del_cart_product_modals.php'?>
                                                    </div>
                                                <!-- !product qty -->

                                            </div>

                                            <div class="col-sm-2 text-right">
                                                <div class="font-size-20 text-danger font-baloo">
                                                    <span class="product_price"  >₱<?php echo $product["price"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- !cart item -->
                                <?php } ?> 
                                
                                </div>


                                <!-- subtotal section-->
                                <div class="col-sm-3">
                                    <div class="sub-total border text-center mt-2">
                                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                                        <div class="border-top py-4 subT">
                                          
                                        </div>
                                        <?php include './php/place_order.php'?> 
                                    </div>
                                </div>
                                <!-- !subtotal section-->
                            </div>
                        <!--  !shopping cart items   -->
                    </div>
                </section>
            <!-- !Shopping cart section  -->
  



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

<!-- for button qty and update qty and auto see subtotal -->
<script src="./cart.js"></script>



</body>




</html>
