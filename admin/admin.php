<?php include "./php_admin/imports.php " ?>


<div class="navabar__grub">
  <div class="sidebar__navbar active">
        <span></span>
        <div class="px-3 py-4 position-relative">
        <?php include "./php_admin/admin_profile.php " ?>
          <hr>
          <ul class="sidebar__list--menu mt-5">
            <li><a href="../admin/admin.php" class="active"><i class="fa fa-cube mr-2 a" aria-hidden="true"></i>My Dashboard</a></li>
            <li><a href="../admin/Customer.php"><i class="fa fa-group mr-2 a" aria-hidden="true"></i>Customer</a></li>
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
        PAGE CONTENT
      </div>
    </div>
  </div>



  <script src="../admin/navbar.js"></script>