<?php
    // Them hotel
    include '../model/food.php';
    include '../controller/uploadImg.php';
    if(isset($_POST['ten_monan'])){

        $id_nh = '';
        $ten_monan = '';
        $gia = '';
        $mota = '';

        isset($_POST['id_nh']) ? $id_nh = $_POST['id_nh'] : $id_nh = '';
        isset($_POST['ten_monan']) ? $ten_monan = trim($_POST['ten_monan'] , ' ') : $ten_monan = '';
        isset($_POST['gia']) ? $gia = $_POST['gia'] : $gia = '';
        isset($_POST['mota']) ? $mota = $_POST['mota'] : $mota = '';
        if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
            $img = $_FILES['img'];
            if(insertFood($id_nh,$ten_monan,$gia,$mota,$img['name']) && upImg($img)){
                $Notification="Thêm món ăn thành công. Đang chờ duyệt.";
                header("Location: ../restaurant/food.php?Notification=$Notification");
            }
            else{
                echo 'loi them Food';
            }
        }
        // else{
        //     insertFoodNoImg($id_nh,$ten_monan,$gia,$mota);
        //     header('Location: ../restaurant/food.php');
        // }
    }
    else{
        echo'thieu thong tin Food';
    }
