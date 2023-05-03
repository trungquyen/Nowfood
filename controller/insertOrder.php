<?php
session_start();
    include '../model/order.php';
    if(isset($_POST['ten_ngd'])){

        $ten_ngd = "";
        $diachi = "";
        $sdt = "";   
        $tongtien = 0;    
    
        isset($_POST['ten_ngd']) ? $ten_ngd = $_POST['ten_ngd'] : $ten_ngd = '';
        $ngaydat = $_POST['ngaydat'];
        isset($_POST['diachi']) ? $diachi = $_POST['diachi'] : $diachi = '';
        isset($_POST['sdt']) ? $sdt = $_POST['sdt'] : $sdt = "";
        isset($_POST['tongtien']) ? $tongtien = $_POST['tongtien'] : $tongtien = 0;
        $id_nd = $_POST['id_nd'];
        $id_nhahag = $_POST['id_nhahg'];
        
        if(insertOrder($ten_ngd,$ngaydat,$diachi,$sdt,$tongtien,$id_nd,$id_nhahag)){
            header('Location: ../views/order.php');
        }
        else{
            $_SESSION['err'] = 'Lỗi, không thể đặt đơn';
            header('Location: ../views/error.php');
        }
    }
    else{
        echo'thieu thong tin';
    }
?>

