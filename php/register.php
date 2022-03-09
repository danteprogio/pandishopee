<?php
include_once 'dbconnection.php';

if (isset($_REQUEST["register"])) {
    $u_no = "select `user_id` from account_customer ORDER BY `user_id` DESC LIMIT 1";
    $query1 = mysqli_query($con, $u_no);
    $result = mysqli_fetch_array($query1);
    $user_id = $result['user_id'] + 1;


    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $birthday = $_POST["birthday"];
    $path = "./images/profile_picture/default.png";
    $info = "INSERT INTO `account_customer`(`Id`, `user_id`, `email`, `password`, `full_name`, `gender`, `cell_no`, `birthday`,`profile_pic_path`) VALUES ('','$user_id','$email','$password','$fullname','$gender','$number','$birthday','$path')";

    if (mysqli_query($con, $info)) {
        header("Location: ../index.php?st1=register");
    }
    else{
        header("Location: ../index.php?st1=notregister");
    }
}

if (isset($_REQUEST["seller_admin"])) {
    $u_no = "select `seller_id` from account_seller ORDER BY `seller_id` DESC LIMIT 1";
    $query1 = mysqli_query($con, $u_no);
    $result = mysqli_fetch_array($query1);
    $seller_id = $result['seller_id'] + 1;

    $store_name = $_POST["store_name"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $birthday = $_POST["birthday"];
    $path = "./images/profile_picture/default.png";
    $role = "seller";
    $info = "INSERT INTO `account_seller`(`id`, `seller_id`, `store_name`, `email`, `password`, `number`, `full_name`, `gender`,`birthday`, `role`,`profile`) VALUES ('','$seller_id','$store_name','$email','$password','$number','$fullname','$gender','$birthday','$role','$path')";

    if (mysqli_query($con, $info)) {
        header("Location: ../index.php?st1=register");
    }
    else{
        header("Location: ../index.php?st1=notregister");
    }
}

?>
