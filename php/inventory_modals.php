
    <form action="./php/update_info.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <!-- Modal -->
          <div tabindex="-1" class="modal bs1-<?php echo $row['product_id']; ?>-modal-sm" role="dialog" aria-hidden="true">
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



  <div tabindex="-1" class="modal bs-<?php echo $row["product_id"] ?>-modal-sm" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header"><h4>Delete <i class="fa fa-trash"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to Delete this Product?</div>
        <div class="modal-footer ">
            <form action="./php/del_cart_product_modals.php" method="post">
                <!-- <input type="hidden" name="product_id" value="<?php echo $row["product_id"] ?>">
                <input type="hidden" name="size" value="<?php echo $row["size"] ?>"> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="del_cart_product" class="btn btn-danger"  value="Delete">
            </form>
        </div>
        </div>
    </div>
</div>