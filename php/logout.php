<?php

if (isset($_COOKIE['id'])) {
    unset($_COOKIE['id']);
    setcookie('id', '', time() - 3600, '/'); // empty value and old timestamp

    header("Location: ../index.php?st=logout");
    
}

if (isset($_COOKIE['id_admin'])) {
    unset($_COOKIE['id_admin']);
    setcookie('id_admin', '', time() - 3600, '/'); // empty value and old timestamp

    header("Location: ../index.php?st=logout");
    
}

if (isset($_COOKIE['id_seller'])) {
    unset($_COOKIE['id_seller']);
    setcookie('id_seller', '', time() - 3600, '/'); // empty value and old timestamp

    header("Location: ../index.php?st=logout");
    
}

?>
