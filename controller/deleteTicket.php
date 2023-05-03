<?php
session_start();
    // Xoa ticket
    include '../model/ticket.php';
    if(isset($_GET['id_ticket'])){
        $id = $_GET['id_ticket'];
        if(deleteTicket($id)){
            header('Location: ../admin/ticket.php');
        }
        else{
            $_SESSION['err'] = 'Lỗi, không thể xóa vé';
            header('Location: ../views/error.php');
        }
    }
    else{
        echo'thieu thong tin xoa ticket';
    }
?>