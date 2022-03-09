
<?php
include_once './php/dbconnection.php';


if (!isset($_COOKIE["id_seller"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id_seller = "";
  header("Location: ./index.php");
}else{
  $id_seller = $_COOKIE["id_seller"];
}
?>


<html>
<head>
<?php include "./php/imports_link.php" ?> 
</head>

 <!--using FontAwesome and for icons--------------->
 <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

<!-- for changing password ( confiming the old password) -->
<script src="./checking_data.js"></script>

<!-- para mag fade with in 5sec ung nakalagay na wrong password/email -->
<script>
  $(function() {
    setTimeout(function() { $("#hideDiv").fadeOut(1500); }, 5000)
    })
</script>

<!-- edit button in profile/hover -->
<style>
    .profile-pic {
	position: relative;
	display: inline-block;
}

.profile-pic:hover .edit {
	display: block;
}

.edit {
	padding-top: 7px;	
	padding-right: 7px;
	position: absolute;
	right: 0;
	top: 0;
	display: none;
}

</style>
<body>

<?php include "./php/navbar.php" ?>

   
    <!-- Edit profile -->

    <div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-3 mx-3 mt-4">
      <div class="div">
        <h3>Account Setting</h3>
      </div>
    </div>

    <div class="card bg-body rounded m-4">
    <!-- Card Header -->
    <div class="mt-4 ms-3">
      <p><strong>Note:</strong> You may edit your account information here. Need help? <a href="how-to-use.php">Learn more about Instructor role</a>.</p>
    </div>

    <!-- for viewing of info from data base -->
    <?php
        $sql = "SELECT * FROM account_seller WHERE seller_id ='$id_seller' ";
        $query1 = mysqli_query($con, $sql );
        $result = mysqli_fetch_array($query1);
    ?>
   

    <main>
      <div class="d-flex align-items-center bg-body p-3 my-3">
        <div class="profile-pic lh-1">
          <img src="<?php echo $result['profile'] ?>" class="img-fluid" width="100" height="100" style="border-radius: 50%;" alt="">
          <div class="edit "><a href="#" data-target=".bs1-editprofile-modal-sm" data-toggle="modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a></div>
        </div>
        

        <div class="ms-3">
          <div class="fs-4 fw-bold"><?php echo $result['full_name'] ?></div>
          <div class="text-secondary"><p><?php echo $result['email'] ?></p></div>
          <a href="#" data-target=".bs1-example-modal-sm" data-toggle="modal"><i class="far fa-edit"></i> Edit Info</a><br>
          <a href="#" data-target=".bs3-changepass-modal-sm" data-toggle="modal">Change password</a> 
          <?php include './php/pass_modals.php'?>
        </div>
      </div>
     
<!-- peronal info -->
      <div class="my-3 p-3 bg-body">
        <div class="border-bottom">
          <div class="div">
            <h5 class="fw-bold">Personal Information and Contact</h5>
            <p class="pb-2 mb-0 text-secondary" style="font-size: .85rem">Your personal information contact details. are shown here.</p>
          </div>
        </div>

        <div class="mt-4">
          <div class="me-5 pe-5">
            <dl class="row">
              <dt class="col-5 col-lg-3">Name</dt>
              <dd class="col-7 col-lg-9"><?php echo $result['full_name'] ?></dd>

              <dt class="col-5 col-lg-3">Gender</dt>
              <dd class="col-7 col-lg-9"><?php echo $result['gender'] ?></dd>

              <dt class="col-5 col-lg-3">Date of Birth</dt>
              <dd class="col-7 col-lg-9"><?php echo  date("M j, Y", strtotime($result['birthday'])) ?></dd>

              <dt class="col-5 col-lg-3">Contact Number</dt>
              <dd class="col-7 col-lg-9"><?php echo $result['number'] ?></dd>
            </dl>
          </div>
        </div>
      </div>



  
   <!-- Edit profile modals-->
      <form action="./php/update_info.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Modal -->
          <div tabindex="-1" class="modal bs1-example-modal-sm" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Basic Information</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <!-- content -->
                  <div class="modal-body">
                    <div class="col">
                      <label for="fname" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" id="email" value="<?php echo $result['email'] ?>" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" aria-label="First Name">
                      
                    </div>
                    <div class="col">
                      <label for="fname" class="form-label">Full Name</label>
                      <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $result['full_name'] ?>" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" aria-label="First Name">
                      
                    </div>
                    <div class="col">
                      <label for="mname" class="form-label">Gender</label>
                      <input list="Gender"  class="form-control" name="gender" placeholder="Gender" value="<?php echo $result['gender'] ?>" />
                      <datalist id="Gender">
                      <option value="Male">
                      <option value="Female">
                      <option value="Other..">
                      </datalist>
                    </div>

                    <div class="col">
                      <label for="lname" class="form-label">Number</label>
                      <input type="number" class="form-control" name="number" value ="<?php echo $result['number'] ?>" placeholder="Number" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
                    </div>

                    <div class="col">
                      <label for="lname" class="form-label">Birthday</label>
                      <input type="date" name="birthday" class="form-control" value="<?php echo $result['birthday'] ?>" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
                    </div>

                    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name ="submit" class="btn btn-primary">Save changes</button>

                  </div>
                </div>
              </div>
            </div>
        </div>
      </form>
    </div>
  </div>   

    <!-- !Edit profile modals -->




    <!-- Edit Profile picture-->
    <form action="./php/profile_pic_upload.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Modal -->
          <div tabindex="-1" class="modal bs1-editprofile-modal-sm" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile Picture</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- content -->
                  <div class="col text-center">
                      <div class="kv-avatar">
                        <div class="file-loading">
                          <img src="<?php echo $result['profile'] ?>" class="img-fluid" id="img_preview" width="150" height="150" style="border-radius: 50%;" alt="">
                        </div>
                        <br>
                        <input id="avatar-1" name="avatar-1" type="file" class="form-control" onchange="readURL(this);">
                      </div>
                      <div class="kv-avatar-hint">
                        <small>Select file < 1500 KB</small>
                      </div>
                    </div>  
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name ="upload_profile" class="btn btn-primary">Save changes</button>

                  </div>
                </div>
              </div>
            </div>
        </div>
      </form>
    </div>
  </div>   

    <!-- !Edit Profile picture -->






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





<!-- profile viewing and uploading -->
<script> 

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#img_preview").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>


</body>




</html>
