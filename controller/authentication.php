<?php
    session_start();
    // Xac thuc tai khoan
    include '../model/connectDB.php';
    if(isset($_GET['gmail']) && isset($_GET['code'])){
        $conn = connectDB();

        // lay gmail , code duoc truyen tu URL
        $gmail = $_GET['gmail'];
        $code_url = $_GET['code'];

        $sql = "select code from user where gmail = '$gmail'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_NUM);

        $code_db = $row[0];

        // kiem tra code o url va trong db trung nhau thi se set status = true
        // status = true thi user co the dang nhap tai khoan
        if(password_verify($code_db,$code_url)){
            $status = true;
            $sql2 = "UPDATE user SET status =  $status WHERE gmail = '$gmail'";
            $result2 = mysqli_query($conn,$sql2);
            if($result2){
                $_SESSION['notify_signin'] = 'Kích hoạt thành công , mời bạn đăng nhập';
                header('Location: http://localhost/Nowfood/views/signin.php');
            }
            else{
                echo'Kich hoat khong thanh cong';
            }
        }
        else{
            echo'Kich hoat khong thanh cong';
        }
        mysqli_close($conn);
    }else{
        die('<h1>Truy cap that bai, duong dan nay khong ton tai</h1>');
    }
?>