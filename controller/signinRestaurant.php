<?php
    session_start();
    // Dang nhap quyen nhà hàng
    include '../model/restaurant.php';
    if(isset($_POST['gmail']) && isset($_POST['password'])){
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];
        if(isRestaurant($gmail,$password)){
            $_SESSION['signinRestaurant'] = $gmail;
            if(isset($_SESSION['notify_admin'])){
                unset($_SESSION['notify_admin']);
            }
            header('Location: ../restaurant/food.php');
        }
        else{
            $_SESSION['notify_admin'] = 'Gmail hoặc mật khẩu không chính xác';
            header('Location: ../restaurant/index.php');
        }
    }
?>