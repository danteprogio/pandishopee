<?php
include_once 'dbconnection.php';
$user_id = $_COOKIE['id'];
?>

<style>
  .myDiv{
	display:none;
    text-align:center;
}  
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel" >Place Order</h2>
        </button>
      </div>
      <div class="modal-body">
          <?php
            $sql = "SELECT * FROM `address_customer` WHERE `user_id` = '$id '";
             $result1 = mysqli_query($con, $sql);
            ?>
            <h4>Select Recipient</h4>
            <select id="myselection" style="margin: 10px;" >
            <option>Select Recipient</option>

            <?php
              while($row = mysqli_fetch_array($result1)) { ?>

            <option value="<?php echo $row["Id"] ?>"><?php echo $row["recipient_name"] ?></option>
            
           
           
            <?php } ?>
            </select>
            <?php
            $sql1 = "SELECT * FROM `address_customer` WHERE `user_id` = '$id '";
             $result11 = mysqli_query($con, $sql1);
            ?>
            <?php
              while($row1 = mysqli_fetch_array($result11)) { ?>

            
            <div id="show<?php echo $row1["Id"] ?>" class="myDiv">
            
              <div class="col-6"  style="width: 470;">
                <div class="p-5 border bg-light">
                
                <div class="d-flex align-items-center bg-body text-left ">
                    <div class="location-icon">
                      <img src="./images/location.png" class="img-fluid" width="50" height="50" style="margin-left: 30px;" alt="">
                      <div class="edit "><a href="#" data-target=".bs1-editprofile-modal-sm" data-toggle="modal"></a></div>
                    </div>
                    
  
                    <div class="ms-3">
                      <div class="fs-4 fw-bold"><?php echo $row1['recipient_name'] ?></div>
                      <div class="text-secondary"><p><?php echo $row1['number'] ?></p></div>
                      <div class="fs-4 "><?php echo $row1['street'].", ".$row1['district'].", ".$row1['city'] ?></div>
                      </div>
                    </div>
                  
                </div>
              </div>


            </div>
           
            <?php } ?>
            
                          
                        <hr>
                        <?php
                            $seller_global1 = "";
                            $semitotal_global = "";
                            $sql = "SELECT * FROM `cart` WHERE `user_id` = '$id ' and `place_order_number`= 0  ORDER BY `seller_id` ";
                            $result1 = mysqli_query($con, $sql);

                        ?>

                            <div class="container overflow-hidden" style="width: 470;" >
                                <div class="row g-2" >

                                <?php
                                    while($row2 = mysqli_fetch_array($result1)) { 
                                        
                                      
                                        $product_id2 = $row2["product_id"];
                                        $sql2 = "SELECT * FROM `product` WHERE `product_id` ='$product_id2'";
                                        $result2 = mysqli_query($con, $sql2);
                                        $product2 = mysqli_fetch_array($result2)
                                   

                                        
                                        ?>
                                         <?php 
                                        // kukunin ung info ni seller like store name  sa account_seller database
                                            $seller_id = $product2["seller_id"];
                                            $sql = "SELECT * FROM `account_seller` WHERE `seller_id` ='$seller_id'";
                                            $result2 = mysqli_query($con, $sql);
                                            $seller1 = mysqli_fetch_array($result2);

                                            // kapag c seller_global ay same sa $row['seller_id'] wala cyang gagawin
                                            if ($seller_global1 == $row2['seller_id']) { 
                                               ?>

                                            <!-- kapag naman d mag kamuka gagawa cya ng bagong header nakalagay ung store name  -->
                                           <?php } else{ 
                                                $seller_global1 = $seller1['seller_id'];


                                                $shop_total = "SELECT `seller_id`, sum( `qty` *`price`) as `total` FROM cart WHERE `user_id` = '$id' and `place_order_number`= 0 GROUP BY seller_id;";
                                                $data_1 = mysqli_query($con, $shop_total);
                                                
                                                if ($semitotal_global == "") {
                                                  while($shop_total_p = mysqli_fetch_array($data_1)){
                                                    if ($row2['seller_id'] == $shop_total_p['seller_id']) {
                                                        $semitotal_global = $shop_total_p['total'];
                                                  
                                                    }
  
                                                  }
                                                }else{
                                                  echo '
                                                  <hr>
                                                  <div>
                                                    <div class="row">
                                                    <div class="col-md-6" ><p class="float-start"><i class="fas fa-money "></i> Sub Total</div>
                                                    <div class="col-md-6 "  ><p class="float-end ">₱'.$semitotal_global.'</span></div>

                                                    <div class="col-md-6" ><p class="float-start"><i class="fas fa-money "></i>Shipping Fee</div>
                                                    <div class="col-md-6 " ><p class="float-end ">₱0</span></div>

                                                    </div>
                                                    
                                                  </div> 
                                                    
                                                    ';
                                                }
                                                
                                                
                                               
                                                ?>


                                                
                                                
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6" ><p class="float-start"><i class="fas fa-store "></i> <?php echo $seller1["store_name"]?></div>
                                                    <div class="col-md-6 " id="sub1" ><p class="float-end "></span></div>
                                    
                                                </div>
              
                                                
                                                
                                           <?php }
                                             ?>
                                <!-- cart item -->
                                <div class="row border-top py-3 mt-3">
                                            <div class="col-sm-2" style="width: 110;">
                                                <img src="<?php echo $product2["image"] ?>" style=" height: 110px; " alt="cart1" class="img-fluid">
                                            </div>
                                            <div class="col-sm-8 text-left">
                                                <h5 class="font-baloo font-size-20" ><?php echo $product2["product_name"] ?> (<?php echo $row2["size"] ?>)</h5>
                                                
                                                <!-- product rating -->
                                                <div class="d-flex text-left" >
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
                                                    <div class="qty d-flex pt-2 text-left" >
                                                        <small>QTY: <?php echo $row2["qty"] ?></small>
                                                        <div class="col-sm-2 ">
                                                            <div class="font-size-20 text-danger font-baloo">
                                                              
                                                                <span class="product_price">₱<?php echo $product2["price"] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- !product qty -->

                                            </div>

                                            
                                        </div>
                                  <?php } 
                                  
                                  $shop_total = "SELECT `seller_id`, sum( `qty` *`price`) as `total` FROM cart WHERE `user_id` = '$id' and `place_order_number`= 0 GROUP BY seller_id;";
                                  $data_1 = mysqli_query($con, $shop_total);
                                  
                                  
                                    while($shop_total_p = mysqli_fetch_array($data_1)){
                                      if ($seller_global1 == $shop_total_p['seller_id']) {
                                        echo '
                                        <hr>
                                        <div>
                                          <div class="row">
                                          <div class="col-md-6" ><p class="float-start"><i class="fas fa-money "></i> Sub Total</div>
                                          <div class="col-md-6 "  ><p class="float-end ">₱'.$shop_total_p['total'].'</span></div>

                                          <div class="col-md-6" ><p class="float-start"><i class="fas fa-money "></i>Shipping Fee</div>
                                          <div class="col-md-6 "  ><p class="float-end ">₱0</span></div>

                                          </div>
                                          
                                        </div> 
                                          
                                          ';
                                        
                                      }

                                    }
                                  
                                  
                                  ?>
                                    <!-- !cart item -->

                                    


                             
                            
                        <hr>
                        <div >
                        <h4>Summary</h4>
                       
                            <div class="row">
                                <div class="col-md-6" ><p class="float-start">Sub total</div>
                                <div class="col-md-6 " id="sub1" ><p class="float-end subT1">₱0</span></div>
                
                            </div>

                       
                        
                            <div class="row">
                                <div class="col-md-6" ><p class="float-start">Discount</div>
                                <div class="col-md-6" id="discount"  ><p class="float-end discount">₱0</span></div>
                            </div>
                       
                        
                            <div class="row">
                                <div class="col-md-6" ><p class="float-start">Delivery cost</div>
                                <div class="col-md-6" id="delivery"  ><p class="float-end delivery">₱0</span></div>
                            </div>
                     
                        <hr>
                       
                            <div class="row">
                                <div class="col-md-6" ><p class="float-start">Total cost</div>
                                <div class="col-md-6" ><p class="float-end total">₱0</span></div>
                            </div>
                    
                            
                        </div>
                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Place Order</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    // for animation of address
    $('#myselection').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });

  
});


</script>