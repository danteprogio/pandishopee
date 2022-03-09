<?php
include_once 'dbconnection.php';
$user_id = $_COOKIE['id'];

// deleteing product in cart base in product id and size 
if (isset($_REQUEST['del_cart_product'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];
    $info = "DELETE FROM `cart` WHERE `product_id` = '$product_id' and `size`= '$size' and `user_id`= '$user_id'";
    $item = mysqli_query($con, $info);
    header("Location: ../cart.php?st1=del");

    
}

?>


<!-- delete product in cart modals -->

<div tabindex="-1" class="modal bs-<?php echo $row["product_id"],$row["size"] ?>-modal-sm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header"><h4>Delete <i class="fa fa-trash"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to Delete this Product?</div>
        <div class="modal-footer ">
            <form action="./php/del_cart_product_modals.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>">
                <input type="hidden" name="size" value="<?php echo $row["size"] ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="del_cart_product" class="btn btn-danger"  value="Delete">
            </form>
        </div>
        </div>
    </div>
</div>