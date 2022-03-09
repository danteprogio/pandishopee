<?php
include_once 'dbconnection.php';
$id = $_COOKIE["id"];
if(isset($_POST['view'])){

    
    $sql = "SELECT sum( `qty`) as `sumqty` ,sum( `qty` *`price`) as `total` FROM `cart` WHERE `user_id` = '$id' and `place_order_number`= 0";
    $total = mysqli_query($con, $sql);
    $total1 = mysqli_fetch_array($total);
    $sumqty = $total1["sumqty"];
    $total = $total1["total"];
    $data1 = '
    <h5 class="font-baloo font-size-20">Subtotal ('.$sumqty.' item):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price">₱'.$total.'</span> </span> </h5>
    <butaon class="btn btn-warning mt-3" data-toggle="modal" data-target="#exampleModal">Proceed to Buy</butaon>
    <!-- need to include the form to able to use the modals -->
     
    ';
    $data2 = '₱'.$total;
    $data = array(
        'data'  => $data1,
        'data1' => $data2
    );
    
    echo json_encode($data);
    
}

// update quantity in cart
if (isset($_POST['product'])) {
    $qty = $_POST["qty"];
    $product = $_POST["product"];
  

    $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `id` = '$product' AND`user_id` ='$id'";
    $result2 = mysqli_query($con, $sql);
}




?>