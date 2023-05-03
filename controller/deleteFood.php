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
            header('Location: ../restaurant/food.php');
        }
        else{
            echo 'loi xoa food';
        }
    }
    else{
        echo'ko xoa duoc food';
    }
?>