<?php include "./php_admin/imports.php ";

$sql = "SELECT * FROM `account_customer`";
$result1 = mysqli_query($con, $sql);
?>



<div class="navabar__grub">
  <div class="sidebar__navbar active">
        <span></span>
        <div class="px-3 py-4 position-relative">
            <?php include "./php_admin/admin_profile.php " ?>

          
          <hr>
          <ul class="sidebar__list--menu mt-5">
            <li><a href="../admin/admin.php" ><i class="fa fa-cube mr-2 a" aria-hidden="true"></i>My Dashboard</a></li>
            <li><a href="../admin/Customer.php" class="active"><i class="fa fa-group mr-2 a" aria-hidden="true"></i>Customer</a></li>
            <li><a href="#!"><i class="fa fa-store mr-2 a" aria-hidden="true"></i>Seller</a></li>
            <li><a href="#!"><i class="fa fa-houzz mr-2 a" aria-hidden="true"></i>History</a></li>
          </ul>
        </div>
        <hr>
        
    </div>


  <div class="sidebar__content">
      <nav class="navbar navbar-expand-md sidebar__side p-3">
        <a class="navabar__menu position-relative d-inline-block" href="#">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </a>

        <img src="logo1.png" alt="logo" style="margin-left: 10px ;">
      </nav>

      <div class="page__content">

        <div class="container-fluid">
            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between ">
                <div class="div">
                    <h3>Employee</h3>
                </div>
            </div>

            <div class="card bg-body rounded m-4">
            <!-- Card Header -->
            <div class="mt-4 ms-3">
                <p><strong>Note:</strong> This table contains the list of employees who are currently working in the institution.</p>

                <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger text-center">
                    <?php if ($_GET['st'] == 'success') {
                        echo "The employee information has been updated successfully.";
                    }
                    elseif ($_GET['st'] == 'success1') {
                        echo "The employee information has been deleted successfully.";
                    }
                    elseif ($_GET['st'] == 'success2') {
                        echo "A new employee has been added successfully.";
                    }
                    else
                    {
                        echo 'Something went wrong. Please try again.';
                    } ?>
                </div>
                <?php } ?>
            </div>

            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="table_id">
                    <thead class="table-light align-middle text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = mysqli_fetch_array($result1)) { ?>
                        <tr>
                        <td>
                        <div class="d-flex align-items-center bg-body p-3 my-3">
                        <div class="profile-pic lh-1">
                        <img src=".<?php echo $row['profile_pic_path'] ?>" class="img-fluid" width="100" height="100" style="border-radius: 50%;" alt="">
                        <br><br> <?php echo $row['full_name']; ?>
                        </div>
                        </div>
                    
                        </td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['birthday']; ?></td>
                        <td><?php echo $row['cell_no']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <div class="container px-0">
                            <div class="row g-0">
                                <div class="col">
                                <!-- Update Trigger Modal -->
                                <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['user_id']; ?>">
                                    <i class="bi bi-pencil-square me-1 d-none d-md-inline-block"></i> Edit
                                </button>                       
                                
                                </div>

                                <div class="w-100 my-2"></div>

                                <div class="col">
                                <!-- Delete Trigger Modal -->
                                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#del<?php echo $row['user_id']; ?>">
                                    <i class="bi bi-trash me-1 d-none d-md-inline-block"></i>Delete
                                </button>
                                
                                </div>
                            </div>
                            </div>
                        </td> 
                        <?php }?>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>




<script src="../admin/navbar.js">
        $(document).ready(function () {
      $('#table_id').DataTable();
    });
</script>