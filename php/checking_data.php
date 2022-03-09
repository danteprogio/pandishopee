<?php

include_once 'dbconnection.php';
//  checking if the password thet the user input is in data base
if(isset($_POST['old_pass']))
{   

    
    if (!isset($_COOKIE["id_seller"])) {
        $user_id = $_COOKIE['id'];
        $checkdata=" SELECT `password` FROM `account_customer` WHERE `user_id`='$user_id' ";
        $query = mysqli_query($con, $checkdata);
        $result = mysqli_fetch_array($query);
        
        $old_pass =$_POST['old_pass'];
    
        if(password_verify($old_pass, $result['password']))
        {   
            echo "<span style='color: green;'> Correct Password.</span>";
            
        }
        else
        {
        
            echo "<span style='color: red;'>Wrong Password.</span>";
        }
        exit();

        
        
    }else{
        $id_seller = $_COOKIE["id_seller"];
        $checkdata=" SELECT `password` FROM `account_seller` WHERE `seller_id`='$id_seller' ";
        $query = mysqli_query($con, $checkdata);
        $result = mysqli_fetch_array($query);
        
        $old_pass =$_POST['old_pass'];
    
        if(password_verify($old_pass, $result['password']))
        {   
            echo "<span style='color: green;'> Correct Password.</span>";
            
        }
        else
        {
        
            echo "<span style='color: red;'>Wrong Password.</span>";
        }
        exit();
    }
}
?>