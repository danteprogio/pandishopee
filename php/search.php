<?php
include_once 'dbconnection.php';

if(isset($_POST['search'])){
    $search = $_POST['search'];
    
    $sql = "SELECT * FROM `product`  WHERE `product_name` LIKE '$search%' OR `category` LIKE '$search%' ";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_array($result);


  

    if ($product) {

        $seller_id = $product["seller_id"];
        $sql1 = "SELECT * FROM `account_seller` WHERE `seller_id` ='$seller_id'";
        $result1 = mysqli_query($con, $sql1);
        $seller = mysqli_fetch_array($result1);
        $data = '
        <div class="col-sm-9">
        <!-- cart item -->
            <div class="row">
                <div class="col-sm-2">
                    <img src="'.$product['image'].'" style="height: 125px; " alt="cart1" class="img-fluid">
                </div>
                <div class="col-sm-8">
                    <a href="./productviewing.php?product_no='.$product['product_id'] .'"><h5 class="font-baloo font-size-20">'.$product['product_name'] .'</h5><a>
                    <small><a href="./seller.php?seller='.$seller['seller_id'].'">Seller: '. $seller["store_name"].'</a></small>
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
    
    
                </div>
    
                <div class="col-sm-2 text-right">
                    <div class="font-size-20 text-danger font-baloo">
                    ₱<span class="product_price"> '.$product['price'] .'</span>
                    </div>
                </div>
            </div>
        </div>
        ';
 
        echo ($data);
    }else{
        $data = ' No item with that name ';
        
        echo ($data);
    }

    
}
?>