<?php
include_once 'dbconnection.php';
$user_id = $_COOKIE['id'];
//notification
if(isset($_POST['view'])){

    
    $status_query = "SELECT * FROM `cart` WHERE `user_id` = '$user_id' and`place_order_number`= 0";
    $result_query = mysqli_query($con, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = array(
        'unseen_notification'  => $count
    );
    
    echo json_encode($data);
    
}
 

if(isset($_POST['autoadd'])){

    $product_id = $_POST['autoadd'];
    $size = "small";
    $qty = "1";
    $price = $_POST['price'];
    $seller = $_POST['seller'];
    // /checking if user already have that in cart 
    $info = "SELECT * FROM `cart` WHERE `product_id` = '$product_id' and `user_id`= '$user_id'";
    $item = mysqli_query($con, $info);
    $result_cart = mysqli_fetch_array($item);
    if ($result_cart && $size == $result_cart["size"]) {
        // getting info of product
        $iteminfo = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
        $result = mysqli_fetch_array(mysqli_query($con, $iteminfo));
        $popup ='
            <div class="custom-notification">
            <div class="custom-notification-container">
            <div class="custom-notification-image-wrapper">
                <img src="./images/cart.gif" width="50" height="50" >
            </div>
            <div class="custom-notification-content-wrapper">
                <p class="custom-notification-content"> just add
                <a href="./cart.php">'.$result["product_name"].'</a><br>₱'.$result["price"].' <b></b> 
                <small>just now</small>
                </p>
            </div>
            </div>
            <div class="custom-close" onclick="$(this).parent().remove();"></div>
        </div>
        <br>
        ';
        // updating cart qty
        $updateqty = "UPDATE `cart` SET `qty`= `qty`+ 1 WHERE `product_id` = '$product_id' and `user_id`= '$user_id'";
        mysqli_query($con, $updateqty);
        $data = array(
            'data'  => $popup
        );
        
        echo json_encode($data);
        
    }
    else{
        $insert = "INSERT INTO `cart`(`id`, `product_id`, `user_id`, `qty`, `size`, `price`, `seller_id`) VALUES ('','$product_id','$user_id','$qty','$size','$price','$seller')";
    
        if (mysqli_query($con, $insert)) {
             // getting info of product
            $iteminfo = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
            $result = mysqli_fetch_array(mysqli_query($con, $iteminfo));
            $popup ='
                <div class="custom-notification">
                <div class="custom-notification-container">
                <div class="custom-notification-image-wrapper">
                    <img src="./images/cart.gif" width="50" height="50" >
                </div>
                <div class="custom-notification-content-wrapper">
                    <p class="custom-notification-content"> New Item added
                    <a href="./cart.php">'.$result["product_name"].'</a><br>₱'.$result["price"].' <b></b> 
                    <small>just now</small>
                    </p>
                </div>
                </div>
                <div class="custom-close" onclick="$(this).parent().remove();"></div>
            </div>
            <br>
            ';
            $data = array(
                'data'  => $popup
            );
            
            echo json_encode($data);
        }
  
        
       
    }



    
}


// product viewing .php

if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $seller = $_POST['seller'];

     // /checking if user already have that in cart 
    $info = "SELECT * FROM `cart` WHERE `product_id` = '$product_id' and `user_id`= '$user_id'";
    $item = mysqli_query($con, $info);
    $result_cart = mysqli_fetch_array($item);
    if ($result_cart && $size == $result_cart["size"]  ) {

        // getting info of product
        $iteminfo = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
        $result = mysqli_fetch_array(mysqli_query($con, $iteminfo));
        $d = $result['product_name'];;

        // updating cart qty
        $updateqty = "UPDATE `cart` SET `qty`= `qty`+ '$qty' WHERE `product_id` = '$product_id' and `user_id`= '$user_id'";
        mysqli_query($con, $updateqty);
       
        $data = array(
            'data'  => $d
        );
            
        echo json_encode($data);
        
    }
    else{
        $insert = "INSERT INTO `cart`(`id`, `product_id`, `user_id`, `qty`, `size`, `price`,`seller_id`) VALUES ('','$product_id','$user_id','$qty','$size','$price','$seller')";
    
        if (mysqli_query($con, $insert)) {
             // getting info of product
            $iteminfo = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
            $result = mysqli_fetch_array(mysqli_query($con, $iteminfo));

            $d = $result['product_name'];
            $data = array(
                'data'  => $d
            );
            
            echo json_encode($data);
        }
  
        
       
    }
   
}
  

?>