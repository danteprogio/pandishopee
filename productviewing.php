
<?php
include_once './php/dbconnection.php';


if (!isset($_COOKIE["id"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id = "";
}else{
  $id = $_COOKIE["id"];
}

if (isset($_COOKIE["id_seller"])) {
	header("Location: seller.php");
}

$product_id = $_GET["product_no"];

$sql = "SELECT * FROM `product` WHERE `product_id` ='$product_id'";
$result1 = mysqli_query($con, $sql);
$product = mysqli_fetch_array($result1)
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

<body>

<?php include "./php/navbar.php" ?>

    <!-- product viewing -->
    <section id="product" class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?php echo $product["image"]?>" alt="product" class="img-fluid">
                        </div>
                        
                        <div class="col-sm-6 py-5">
                            <h5 class="font-baloo font-size-20"><?php echo $product["product_name"]?></h5>
                            <!-- GETTING SELLER INFO  -->
                            <?php 
                                $seller_id = $product["seller_id"];
                                $sql = "SELECT * FROM `account_seller` WHERE `seller_id` ='$seller_id'";
                                $result1 = mysqli_query($con, $sql);
                                $seller = mysqli_fetch_array($result1)
                            ?>
                            <small><a href="./seller.php?seller=<?php echo $seller['seller_id'] ?>">Seller: <?php echo $seller["store_name"]?></a></small>
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                  </div>
                                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                                <br>
            
                            </div>
                            <hr class="m-0">
                            <br>



                            <!-- button-->
                            <?php
                                if (!isset($_COOKIE["id"])) { ?>
            
                                <button type="submit" class="btn btn-danger " onclick="notif()">Proceed to Buy</button>
                                <button class="btn btn-warning " onclick="notif()" >Add to Cart</button>
                                
                                <?php }else{ ?>
                                
                                <button type="submit" class="btn btn-danger ">Proceed to Buy</button>
                                <button onclick="addcart(<?php echo $product_id ?>,<?php echo $seller_id  ?>)"  class="btn btn-warning ">Add to Cart</button>
                                
                            <?php }?>

                            
                            
                            
                            <!-- !button-->


                            <!---    product price       -->
                                <table class="my-3">
                                    <tr class="font-rale font-size-14">
                                        <td>M.R.P:</td>
                                        <td><strike>₱ <?php echo $product["old_price"]?></strike></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td>Deal Price:</td>
                                        <td class="font-size-20 text-danger">₱ <span id="price" ><?php echo $product["price"]?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                                    </tr>
                                    <tr class="font-rale font-size-14">
                                        <td>You Save:</td>
                                        <td><span class="font-size-16 text-danger">₱ <?php echo $product["old_price"] - $product["price"]?></span></td>
                                    </tr>
                                </table>
                            <!---    !product price       -->

                             <!--    #policy -->
                                <div id="policy">
                                    <div class="d-flex">
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</a>
                                        </div>
                                        <div class="return text-center mr-5">
                                            <div class="font-size-20 my-2 color-second">
                                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                            </div>
                                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                                        </div>
                                    </div>
                                </div>
                              <!--    !policy -->
                                <hr>

                            <!-- order-details -->
                                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                                    <small>Delivery by : Mar 29  - Apr 1</small>
                                    <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                                </div>
                             <!-- !order-details -->

                             <div class="row">
                            
                                 <div class="col-6">
                                     <!-- product qty section -->  
                                     <br>
                                     <div class="qty d-flex">
                                         <h6 class="font-baloo">Qty</h6>
                                         <div class="px-4 d-flex font-rale">
                                             <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                             <input type="text" data-id="pro1" id="qty" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                             <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                         </div>
                                     </div>
                                    <!-- !product qty section -->  
                                    
                
                                    <!-- size -->
                                    <div class="qty d-flex" style="margin-top: 10;">
                                         <h6 class="font-baloo">Size</h6>
                                         <div class="px-4 d-flex font-rale">
                                         <select class="custom-select" id="size" style="width: 156;" require> 
                                            <option selected>Choose Size</option>
                                            <option value="small">Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                        </select>
                                         </div>
                                     </div>
                                    <!-- !size -->
                                   
                                 </div>
                             </div>
                           
                         


                        </div>

                        <div class="col-12">
                            <h6>Product Description</h6>
                            <hr>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit, delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus, accusantium velit numquam a aliquam vitae vel?</p>
                        </div>
                    </div>
                </div>
            </section>


    <!-- !product viewing -->


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="navbar/nav_fix_position.js"></script>
<script src="searchbar.js"></script>
<script src="/login.js"></script>
<script src="/slider.js"></script>
<script src="/product-categories.js"></script>

<!-- Owl Carousel Js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

<!-- clean string -->
<script src="./clean_string.js"></script>

<!-- notification "add to cart in product viewing -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- qty and adding in cart  -->
<script src="./productviewing.js"></script>

<script>
function notif(){
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'You need to login!',
    })
} 

  // para ma add sa  cart 
  function addcart(product_id,seller){
        let $input = $(`.qty_input[data-id='pro1']`);
        var qty = $input.val()
        var size = $('#size').val()
        var price = '<?php echo $product["price"]?>'
        console.log(size)
        
       if (size == 'Choose Size') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please choose your size!'
            })
       }else{
            $.ajax({
            url:"./php/cart.php",
            method:"POST",
            data:{product_id:product_id,qty:qty,size:size,price:price,seller:seller},
            dataType:"json",   
            success:function(data){
                Swal.fire(
                    'Added in Cart!',
                    'Just Check you Cart!',
                    'success'
                    )
        }
        })

       }
        
    } 

</script>
</body>




</html>
