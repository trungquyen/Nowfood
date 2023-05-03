<?php
    session_start();
    if(isset($_SESSION['loginSuccess'])){
        header('Location: ../index.php');
    }
    // Dang nhap
    include '../model/connectDB.php';
    include '../send-email/sendEmail.php';

    if(isset($_POST['gmail']) && isset($_POST['password'])){
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        $conn = connectDB();       
        $sql = "select password from user where gmail = '$gmail'";

        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            // Lay mat khau ma hoa tren db ve so sanh voi du lieu nguoi dung nhap
            $row = mysqli_fetch_array($result,MYSQLI_NUM);
            $password_hash = $row[0];
            if(password_verify($password,$password_hash)){
                // check status , neu false thi bat xac thuc , neu true thi chuyen vao home
                $sql2 = "select status , code from user where gmail = '$gmail'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($result2,MYSQLI_NUM);
                $status = $row2[0];
                $code = password_hash($row2[1],PASSWORD_DEFAULT);

                //neu dang nhap thanh cong thi huy 2 bien session thong bao
                if($status==true){
                    if(isset($_SESSION['notify_signin'])){
                        unset($_SESSION['notify_signin']);
                    }
                    if(isset($_SESSION['notify_signup'])){
                        unset($_SESSION['notify_signup']);
                    }
                    $_SESSION['loginSuccess'] = $gmail;
                    header('Location: ../index.php');
                }
                else{ // gui lai email kich hoat tai khoan
                    $title = '[Kích hoạt tài khoản]';
                    $bodyContent = "<a 
                    style='background-color:darkgreen;color:white;'
                    href = 'http://localhost:88/Hotel/controller/authentication.php/?gmail=$gmail&code=$code' >
                    Click vào đây để xác nhận tài khoản $gmail của bạn</a>";

                    sendEmail($gmail,$title,$bodyContent);
                    $_SESSION['notify_signin'] = 'Đã gửi email xác thực tài khoản , bạn hãy kiểm tra hộp thư của mình';
                    header('Location: ../views/signin.php');
                }
            }
            else{
                $_SESSION['notify_signin'] = 'Sai tài khoản hoặc mật khẩu';
                header('Location: ../views/signin.php');
            }
        }
        else{
            $_SESSION['notify_signin']='Tài khoản này không tồn tại';
            header('Location: ../views/signin.php');

        }
        mysqli_close($conn);
    }
?>