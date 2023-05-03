<?php
    include '../model/restaurant.php';
    if(isset($_POST['id_nhahg'])){
        $id_nhahg = $_POST['id_nhahg'];
        $ten_nhahg = '';
        $sdt = '';
        $diachi = '';
        $email = "";
        $chu_nhahg = '';

        isset($_POST['ten_nhahg']) ? $ten_nhahg = $_POST['ten_nhahg'] : $ten_nhahg = '';
        isset($_POST['sdt']) ? $sdt = $_POST['sdt'] : $sdt = '';
        isset($_POST['diachi']) ? $diachi = $_POST['diachi'] : $diachi = '';
        isset($_POST['email']) ? $email = $_POST['email'] : $email = "";
        isset($_POST['chu_nhahg']) ? $chu_nhahg = $_POST['chu_nhahg'] : $chu_nhahg = '';

        if(updateRestaurant($id_nhahg,$ten_nhahg,$sdt,$diachi,$email,$chu_nhahg)){
            header('Location: ../restaurant/info.php');
        }
        else{
            echo 'loi cap nhat nha hang';
        }
    }
    else{
        echo'thieu thong tin nha hang';
    }
