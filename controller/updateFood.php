<?php
session_start();
if (!isset($_SESSION['signinRestaurant'])) {
    header('Location: ../restaurant/index.php');
}
    // Cap nhat food
    include '../model/food.php';
    include './uploadImg.php';

    if(isset($_POST['id_monan'])){
        $id_monan = $_POST['id_monan'];
        $ten_monan = '';
        $gia = '';
        $mota = '';
        $duyet = 0;
        $ten_monan = $_POST['ten_monan'] ;

        isset($_POST['gia']) ? $gia = $_POST['gia'] : $gia = '';
        isset($_POST['mota']) ? $mota = $_POST['mota'] : $mota = '';

        if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
            $img = $_FILES['img'];
            if(updateFood($id_monan,$ten_monan,$gia,$mota,$img['name'],$duyet) && upImg($img)){
                $Notification="Cập nhập món ăn thành công. Đang chờ duyệt.";
                header("Location: ../restaurant/food.php?Notification=$Notification");
            }
            else{
                echo 'loi cap nhat food';
            }
        }
        else{
            updateFoodNoImg($id_monan,$ten_monan,$gia,$mota,$duyet);
            $Notification="Cập nhập món ăn thành công. Đang chờ duyệt.";
            header("Location: ../restaurant/food.php?Notification=$Notification");
        }

        
    }
    else{
        echo'thieu thong tin cap nhat food';
    }
?>