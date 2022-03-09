<?php
include_once 'dbconnection.php';
// up date basic information 
if (isset($_REQUEST["submit"])) {

    
    if (!isset($_COOKIE["id_seller"])) {
        $id = $_COOKIE['id'];
        $fname = $_POST["fname"];
        $email = $_POST["email"];
        $gender = $_POST['gender'];
        $number = $_POST['number'];
        $birthday = $_POST["birthday"];
    
        $info = "UPDATE `account_customer` SET `email`='$email',`full_name`='$fname',`gender`='$gender',`cell_no`='$number',`birthday`='$birthday' WHERE `user_id` = '$id'";
    
        if (mysqli_query($con, $info)) {
            header("Location: ../profile.php?st1=accountupdated");
        }
        else{
            header("Location: ../profile.php?st1=notaccountupdated");
        }
       
    }else{
      $id_seller = $_COOKIE["id_seller"];
      $fname = $_POST["fname"];
      $email = $_POST["email"];
      $gender = $_POST['gender'];
      $number = $_POST['number'];
      $birthday = $_POST["birthday"];
  
      $info = "UPDATE `account_seller` SET `email`='$email',`full_name`='$fname',`gender`='$gender',`number`='$number',`birthday`='$birthday' WHERE `seller_id` = '$id_seller'";
  
      if (mysqli_query($con, $info)) {
          header("Location: ../seller_profile.php?st1=accountupdated");
      }
      else{
          header("Location: ../seller_profile.php?st1=notaccountupdated");
      }
    }




}

// change password
if (isset($_REQUEST["save_new_pass"])) {

    
    if (!isset($_COOKIE["id_seller"])) {
        $id = $_COOKIE['id'];
        $new_password = password_hash($_POST['cn_pass'], PASSWORD_DEFAULT);
       
    
        $info = "UPDATE `account_customer` SET `password`='$new_password'WHERE `user_id` = '$id'";
    
        if (mysqli_query($con, $info)) {
            header("Location: ../profile.php?st1=accountupdated");
        }
        else{
            header("Location: ../profile.php?st1=notaccountupdated");
        }
       
    }else{
      $id_seller = $_COOKIE["id_seller"];
      $new_password = password_hash($_POST['cn_pass'], PASSWORD_DEFAULT);
       
    
      $info = "UPDATE `account_seller` SET `password`='$new_password'WHERE `seller_id` = '$id_seller'";
  
      if (mysqli_query($con, $info)) {
          header("Location: ../seller_profile.php?st1=accountupdated");
      }
      else{
          header("Location: ../seller_profile.php?st1=notaccountupdated");
      }
     
    }
}




?>