<?php
include_once './php/dbconnection.php';


if (!isset($_COOKIE["id_seller"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id_seller = "";
}else{
  $id_seller = $_COOKIE["id_seller"];
}
?>


<html>
<head>
<?php include "./php/imports_link.php" ?>
<link rel="stylesheet" href="test.css">

  <!-- jQuery DataTables Boostrap5 CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <!-- Bootstrap5 JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- jQuery JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <!-- jQuery Bootstrap5 JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
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

<!-- content -->
  <div class="container-fluid">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-3 mx-3 mt-4">
      <div class="div">
        <h3>Product List</h3>
      </div>
      <div class="ms-auto">
        <!-- New employee modal -->
        <button type="button" class="btn btn-primary" data-target=".bs1-example-modal-sm" data-toggle="modal"">
        <i class="bi bi-person-plus-fill me-1"></i><small>Add Product</small>
        </button> 
        
      </div>
    </div>
    <div>

    <?php
        $sql = "SELECT * FROM `product` WHERE seller_id ='$id_seller'";
        $result1 = mysqli_query($con, $sql);

    ?>

      <!-- Table Body -->
      
      
      <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="table_id">
                    <thead class="table-light align-middle text-center">
                    <tr>
                        <th>Product_id</th>
                        <th>Name of Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stack</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result1)) { ?>
                        <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td>
                          <center>
                          <img src="<?php echo $row['image'] ?>" class="img-fluid" width="100" height="100"  alt="">
                          <br><?php echo $row['product_name']; ?>
                          </center>
                          
                        </td>
                        <td><?php echo $row['category']; ?></td>
                        <td>₱ <?php echo $row['price']; ?></td>
                        <td><?php echo $row['stack']; ?></td>
                        <td>
                           
                     
                            
                                <!-- Update Trigger Modal -->
                                <button type="button" class="btn btn-warning " data-target=".bs1-<?php echo $row['product_id']; ?>-modal-sm" data-toggle="modal">
                                    <i class="bi bi-pencil-square me-1 d-none d-md-inline-block"></i> Edit
                                </button>                       
                                
                            
                                <!-- Delete Trigger Modal -->
                                <button type="button" class="btn btn-danger " data-target=".bs-<?php echo $row['product_id']; ?>-modal-sm" data-toggle="modal">
                                    <i class="bi bi-trash me-1 d-none d-md-inline-block"></i>Delete
                                </button>
                                

                          
                            <?php include "./php/inventory_modals.php";  ?>
                            

                        </td> 
                        <?php }?>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>



    </div>
   

    <form action="./php/update_info.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Modal -->
          <div tabindex="-1" class="modal bs1-example-modal-sm" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <!-- content -->
                  <div class="modal-body">
                    <div class="col">
                      <label for="fname" class="form-label">Product name</label>
                      <input type="text" class="form-control" name="pname" id="pname" placeholder="Product name" value="" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" aria-label="First Name" required>
                      
                    </div>
                   
                    <div class="col">
                      <label for="pname" class="form-label">Category</label>
                      <input list="Category"  class="form-control" name="category" placeholder="Category" value="" required/>
                      <datalist id="Category">
                      <option value="Men">
                      <option value="Women">
                      <option value="Kids">
                      </datalist>
                    </div>

                    <div class="col">
                      <label for="pname" class="form-label">Size</label>
                      <input list="Size"  class="form-control" name="size" placeholder="Size" value="" required/>
                      <datalist id="Size">
                      <option value="Small">
                      <option value="Medium">
                      <option value="Large">
                      </datalist>
                    </div>

                    <div class="col">
                      <label for="fname" class="form-label">Price</label>
                      <input type="text" class="form-control" name="price" placeholder="Price" id="price" value="" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" aria-label="First Name" required>
                      
                    </div>

                    <div class="col">
                      <label for="lname" class="form-label">Stock</label>
                      <input type="number" class="form-control" name="stock" value ="" placeholder="Number" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false" required/>
                    </div>

                    <div class="col">
                      <label for="lname" class="form-label">Product Picture</label>
                      <input id="avatar-1" name="avatar-1" type="file" class="form-control" onchange="readURL(this);" required>
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





<!-- clean string -->
<script src="./clean_string.js"></script>

<!-- table -->
<script>
        $(document).ready(function () {
      $('#table_id').DataTable();
    });
</script>
</body>



