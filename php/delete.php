<?php
include_once 'dbconnection.php';

// delete address
if (isset($_REQUEST['del_address'])) {
    $id = $_POST['id'];
    
    $info = "DELETE FROM `address_customer` WHERE `Id` ='$id'";

    if (mysqli_query($con, $info)) {
        header("Location: ../profile.php?st1=accountupdated");
    }
    else{
        header("Location: ../profile.php?st1=notaccountupdated");
    }
}



?>