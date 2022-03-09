<?php
include_once '../php/dbconnection.php';
session_start();

if (!isset($_COOKIE["id_admin"])) {
	echo("<script>console.log('No cookies ');</script>");
  $id_admin = "";
  header("Location: /pandi/404.html");

}else{
  $id_admin = $_COOKIE["id_admin"];
}


$info_admin = "SELECT * FROM account_seller WHERE seller_id ='$id_admin' ";
$query_admin = mysqli_query($con, $info_admin );
$personal_info = mysqli_fetch_array($query_admin);

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <!--using FontAwesome and for icons--------------->
<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
<link rel="stylesheet" href="./css_admin/seller.css">
