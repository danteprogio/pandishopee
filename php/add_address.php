<?php
include_once 'dbconnection.php';

if (isset($_REQUEST["add_address"])) {
    $user_id = $_COOKIE["id"];
    $recipient_name = $_POST["fname"];
    $number = $_POST["number"];
    $district = $_POST['address'];
    $street = $_POST['street'];

    //checking if all the variable have value
    if ($recipient_name == "" || $number == "" || $district == "" || $street == "") {
        echo "nothing";
    }
    else{
        $info = "INSERT INTO `address_customer`(`user_id`, `recipient_name`, `number`, `street`, `district`, `city`) VALUES ('$user_id','$recipient_name','$number','$street','$district','Pandi')";
        if (mysqli_query($con, $info)) {
            header("Location: ../profile.php?st1=accountupdated");
        }
        else{
            header("Location: ../profile.php?st1=notaccountupdated");
        }
    }

    }

 


?>