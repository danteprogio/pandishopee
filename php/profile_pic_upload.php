<?php
include_once 'dbconnection.php';

// uploading image to the folder images/profile
if (isset($_REQUEST["upload_profile"])) {

    if ($_FILES["avatar-1"]["name"] == "") {
        header("Location: ../profile.php");

    }
    else{
        $target_dir = "../images/profile_picture/";
        $target_file = $target_dir . basename($_FILES["avatar-1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       
    
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["avatar-1"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            header("Location: ../profile.php?st1=notaccountupdated");
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["avatar-1"]["tmp_name"], $target_file)) {
            
                
                // removing 1st character
                $path = substr($target_file, 1);
                
                
                if (!isset($_COOKIE["id_seller"])) {
                    $id = $_COOKIE['id'];
                    $update_profile_picture = "UPDATE `account_customer` SET `profile_pic_path`='$path' WHERE `user_id`= '$id'";
                    $query1 = mysqli_query($con, $update_profile_picture);
                }else{
                  $id_seller = $_COOKIE["id_seller"];
                  $update_profile_picture = "UPDATE `account_seller` SET `profile`='$path' WHERE `seller_id`= '$id_seller'";
                  $query1 = mysqli_query($con, $update_profile_picture);
                }
               
                
                header("Location: ../profile.php?st1=accountupdated");
    
            } else {
                header("Location: ../profile.php?st1=notaccountupdated");
            }
        }
    }
  
    
    
}
else
{
    header("Location: ../profile.php?st1=notaccountupdated");
}

?>