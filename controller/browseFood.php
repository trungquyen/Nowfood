<?php
session_start();
if (!isset($_SESSION['signinAdmin'])) {
    header('Location: ../admin/index.php');
}
    // Cap nhat food
    include '../model/food.php';

    if(isset($_POST['id_monan']) && isset($_POST['id_nh'])){
        $id_monan = $_POST['id_monan'];
        $id_nh = $_POST['id_nh'];
        $duyet = 1;
        $success = "Duyệt thành công";

        if(browseFood($id_monan,$duyet)){
            $Notification="Duyệt món ăn thành công.";
            header("Location: ../admin/food.php?id_nhahg=$id_nh&&Notification=$Notification");
        }
        else{
            echo 'duyet food không thành công!';
        }
  
    }
    else{
        echo'duyet food không thành công';
    }
?>