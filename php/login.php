<?php
include_once 'dbconnection.php';
session_start();

if (isset($_REQUEST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userpass = "SELECT * FROM account_customer WHERE email='$email' ";
    $query1 = mysqli_query($con, $userpass);
    $result = mysqli_fetch_array($query1);


    if ($result) {
        if ($result['email'] == $email && password_verify($password, $result['password'])) {
            setcookie('id', $result["user_id"], time() + (86400 * 30), "/");
            header("Location: ../index.php?st=login");

        
        }
        else{
            header("Location: ../index.php?st1=wronguserorpassword");
        }

       
        
    }else{
        header("Location: ../index.php?st1=wronguserorpassword");
    }
}


if (isset($_REQUEST["seller_admin"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userpass = "SELECT * FROM account_seller WHERE email='$email' ";
    $query1 = mysqli_query($con, $userpass);
    $result = mysqli_fetch_array($query1);


    if ($result) {
        if ( $result['role'] == "admin"   && $result['email'] == $email && password_verify($password, $result['password'])) {
            setcookie('id_admin', $result["seller_id"], time() + (86400 * 30), "/");
            header("Location: ../admin/admin.php");

        
        }
        elseif ($result['role'] == "seller"   && $result['email'] == $email && password_verify($password, $result['password'])){
            setcookie('id_seller', $result["seller_id"], time() + (86400 * 30), "/");
            header("Location: ../seller.php");
        }
        else{
            header("Location: ../index.php?st1=wronguserorpassword");
        }

       
        
    }else{
        header("Location: ../index.php?st1=wronguserorpassword");
    }
}




?>