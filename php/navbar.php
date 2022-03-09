

<nav> 
		<!--social-links-and-phone-number----------------->
 <div class="social-call">
	 <!--social-links--->
	 <div class="social">
		 <a href="#"><i class="fab fa-facebook-f"></i></a>
		 <a href="#"><i class="fab fa-twitter"></i></a>
		 <a href="#"><i class="fab fa-youtube"></i></a>
		 <a href="#"><i class="fab fa-instagram"></i></a>
	 </div>
	 <!--phone-number------>
	 <div class="phone">
		 <span>Call: +123456789</span>
	 </div>
     <div class="phone">
         <!-- cehcking if admin is already log in -->
         <?php
          if (isset($_COOKIE["id_admin"])) { 
        ?>
           <a href="./admin/admin.php" class="user" name="seller_admin">Login as Seller</a>
        
        <?php } ?>

         
        <!-- cehcking if seller is already log in -->
        <?php
          if (isset($_COOKIE["id_seller"])) { 
        ?>
            <a href="./seller.php" class="user" name="seller_admin">Login as Seller</a>
        
        <?php } ?>

        <!-- if no one login -->
        <?php
          if (!isset($_COOKIE["id_seller"]) && !isset($_COOKIE["id_admin"])) { 
        ?>
              <a href="#" class="user" name="seller_admin" onclick="seller_admin()" >Login as Seller</a>
        
        <?php } ?>
         
         
		

	 </div>
 </div>
 <?php if(isset($_GET['st1'])) { ?>
    
      <?php if ($_GET['st1'] == 'wronguserorpassword') {
              echo '<div class="alert alert-danger text-center" id="hideDiv">
              Wrong password or Email';
                  }
            elseif($_GET['st1'] == 'register'){
                echo '<div class="alert alert-success text-center" id="hideDiv">
                Successfuly Register';
                  }
            elseif($_GET['st1'] == 'notregister'){
                echo '<div class="alert alert-danger text-center" id="hideDiv">
                Failed to Register';
                  }
            elseif($_GET['st1'] == 'accountupdated'){
                echo '<div class="alert alert-success text-center" id="hideDiv">
                Successfuly Updated';
                  }
            elseif($_GET['st1'] == 'notaccountupdated'){
                echo '<div class="alert alert-danger text-center" id="hideDiv">
                Failed to Update';
                  }
            elseif($_GET['st1'] == 'del'){
                
                echo '<div class="alert alert-success text-center" id="hideDiv">
                Successfuly Remove item';
                
                  }

               
                  
      ?>
    </div>
<?php } ?>


        <?php   
          if (!isset($_COOKIE["id_seller"])) { 
        ?>
        
        <!--menu-bar----------------------------------------->
        <div class="navigation">
            <!--logo------------>
            <a href="./index.php" class="logo"><img src="images/logo1.png" style="height: 60px;" ></a>
            <!--menu-icon------------->
            <div class="toggle"></div>
            <!--menu----------------->
            <ul class="menu">
                <li><a href="./index.php">Home</a></li>
                <li  class="shop"><a href="./shop.php" >Shop</a></li>
                <li><a href="./categories.php?category=men">Men</a>
                    <!--lable---->
                    <span class="sale-lable">Sale</span>
                </li>
                <li><a href="./categories.php?category=women">Women</a></li>
                <li><a href="./categories.php?category=kids">Kids</a></li>
            </ul>
            <!--right-menu----------->
            <div class="right-menu">
                <a href="javascript:void(0);" class="search">
                    <i class="fas fa-search"></i>
                </a>
            <?php
            if ($id == "") {
                echo '<a href="#" class="user" onclick="uselogin()">
                <i class="far fa-user"></i>
                </a>
                
                <a   class="user" onclick="uselogin()">
                    <i class="fas fa-shopping-cart">
                    </i>
                </a>
                
                
                ';
            
            }else{
            
                $userpass = "SELECT * FROM account_customer WHERE user_id='$id' ";
                $query1 = mysqli_query($con, $userpass);
                $result = mysqli_fetch_array($query1);

                if ($result["full_name"]=="") {
                    echo '<a href="./profile.php" class="account">
                    <i class="far fa-user"></i> '.$result["email"].'</a>
                    <a  href="#"data-target=".bs-example-modal-sm" data-toggle="modal">Logout</a>

                    <a href="./cart.php">
                        <i class="fas fa-shopping-cart">
                            <span class="num-cart-product count" id= "notify_no">0</span>
                        </i>
                    </a>
                    ';
                }else{
                    echo '<a href="./profile.php" class="account">
                    <i class="far fa-user"></i> '.$result["full_name"].'</a>
                    <a  href="#" data-target=".bs-example-modal-sm" data-toggle="modal">Logout</a>
                    
                    <a href="./cart.php">
                        <i class="fas fa-shopping-cart">
                            <span class="num-cart-product count" id= "notify_no">0</span>
                        </i>
                    </a>
                    
                    
                    ';
                }

            }
            
            ?>


                
                
            </div>
            </div>
        </nav>



        <!--search-bar----------------------------------->
            <div class="search-bar">
           
                <table class="main_div" style="margin-left: 55px; width: 90%;"> 
                <tr >
                    <td valign="top" >

                        <!--search-input------->
                        <div class="search-input">
                            <input type="text" placeholder="Search For Product" id="search" onkeyup="search();" name="search" />
                            <!--cancel-btn--->
                            <a href="javascript:void(0);" class="search-cancel">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                
                    </td>
                </tr>
                <tr>
                    <td id="item"></td>
                </tr>
        </table>
            </div>


            <!---login-and-sign-up--------------------------------->
            <div class="form">
                <!--login---------->
                <div class="login-form" id="login-form">
                    
                </div>


                <!--Sign-up---------->
                <div class="sign-up-form" id="sign-up-form">
                    
                </div>
        </div>




        <?php }
        else{ ?>

            <!--menu-bar----------------------------------------->
        <div class="navigation">
            <!--logo------------>
            <a href="./index.php" class="logo"><img src="images/logo1.png" style="height: 60px;" ></a>
            <!--menu-icon------------->
            <div class="toggle"></div>
            <!--menu----------------->
            <ul class="menu">
                <li><a href="./seller.php">Home</a></li>
                <li><a href="./inventory.php" >Inventory</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <!--right-menu----------->
            <div class="right-menu">
                
            <?php
            
                $userpass = "SELECT * FROM account_seller WHERE seller_id='$id_seller' ";
                $query1 = mysqli_query($con, $userpass);
                $result = mysqli_fetch_array($query1);

                if ($result["full_name"]=="") {
                    echo '<a href="./seller_profile.php" class="account">
                    <i class="far fa-user"></i> '.$result["store_name"].'</a>
                    <a  href="#"data-target=".bs-example-modal-sm" data-toggle="modal">Logout</a>

                  
                    ';
                }else{
                    echo '<a href="./seller_profile.php" class="account">
                    <i class="far fa-user"></i> '.$result["full_name"].'</a>
                    <a  href="#" data-target=".bs-example-modal-sm" data-toggle="modal">Logout</a>
                    
                   
                    
                    
                    ';
                }

            
        
            ?>


                
                
            </div>
            </div>
        </nav>
            
        
        <?php }  ?>





 





  
    <div tabindex="-1" class="modal bs-example-modal-sm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
        <div class="modal-footer"><a class="btn btn-primary btn-block" href="./php/logout.php">Logout</a></div>
        </div>
    </div>
    </div>


<!-- cart count -->
<script>

$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"./php/cart.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
     $('.count').html(data.unseen_notification);
   }
  });
 }
 
 load_unseen_notification();

 setInterval(function(){ 
  load_unseen_notification();;  
 }, 5000);
 
});


// search

function search()
  {
      var search = document.getElementById("search").value;
      console.log(search);
      if(search)
      {
        
          $.ajax({
              type: 'post',
              url: './php/search.php',
              data: {
                search: search
              },
              success: function (data) {
                $( '#item' ).html(data)

              }    
          });
      }
   
   else
   {
    $( '#item' ).html("<p> No Search </p>");
   }
    
};

    </script>