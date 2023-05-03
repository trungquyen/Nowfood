<?php
    session_start();
    if(isset($_SESSION['signinRestaurant'])){
        unset($_SESSION['signinRestaurant']);
        header('Location: ../restaurant/index.php');
    }
?>