<?php
session_start();
if (!isset($_SESSION['signinRestaurant'])) {
    header('Location: ../restaurant/index.php');
}
    // Xoa food
    include '../model/food.php';
    if(isset($_GET['id_monan'])){
        $id_monan = $_GET['id_monan'];
        if(deletefood($id_monan)){
            $Notification="Xoá món ăn thành công.";
            header("Location: ../restaurant/food.php?Notification=$Notification");
        }
        else{
            echo 'loi xoa food';
        }
    }
    else{
        echo'ko xoa duoc food';
    }
?>