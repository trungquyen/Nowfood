<?php
    // Cap nhat ticket
    include '../model/ticket.php';
    if(isset($_POST['id_ticket'])){
        $id = $_POST['id_ticket'];
        $tenkhach = $_POST['tenkhach'] ;
        $gmail = $_POST['gmail'];
        $hotel_name = $_POST['hotel_name'];
        $ngaydat = $_POST['ngaydat'];
        $ngayketthuc = $_POST['ngayketthuc'];
        $yeucau = $_POST['yeucau'];
        $chiphi = $_POST['chiphi'];
        $trangthai = false;
        isset($_POST['trangthai']) ? $trangthai = true : $trangthai = false;

        if(updateTicket($id,$tenkhach,$gmail,$hotel_name,$ngaydat,$ngayketthuc,$yeucau,$chiphi,$trangthai)){
            header('Location: ../admin/ticket.php');
        }
        else{
            echo 'loi cap nhat ticket';
        }
    }
    else{
        echo'thieu thong tin cap nhat ticket';
    }
?>