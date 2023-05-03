<?php
     session_start();
     if(isset($_SESSION['loginSuccess'])){
         header('Location: ../index.php');
     }
    // Dang ki tai khoan
    include '../model/connectDB.php';
    include '../send-email/sendEmail.php';

    // Kiem tra neu ton tai email , password duoc gui len thi se kiem tra trong db
    // Trong db neu chua co gmail nay thi them vao voi status = false , gui email xac nhap nguoi dung , nuoi dung xac nhan status = true

    if(isset($_POST['gmail']) && isset($_POST['password'])){
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        $conn = connectDB();       
        $sql = "select * from user where gmail = '$gmail'";

        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count <= 0){
            $status = false;
            // Ma hoa mat khau truoc khi luu len db
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            
            // Tao 1 code de lam link kich hoat tai khoan
            $key = (string)rand(0,1000);

            $code = password_hash($key,PASSWORD_DEFAULT);

            //tao 1 tai khoan voi status = false , code de kich hoat duoc ma hoa , key luu tren db , code gui ve client
            $sql2 = "insert into user (gmail,password,status,code) values ('$gmail','$password_hash','$status','$key')";
            $result2 = mysqli_query($conn,$sql2);
            //gui email kich hoat cho client
            if($result2==true){
                $title = '[Kích hoạt tài khoản]';
                $bodyContent = "<a 
                style='background-color:darkgreen;color:white;'
                href = 'http://localhost/Nowfood/controller/authentication.php/?gmail=$gmail&code=$code' >
                Click vào đây để xác nhận tài khoản $gmail của bạn</a>";

                sendEmail($gmail,$title,$bodyContent);
                $_SESSION['notify_signup'] = 'Đã gửi email xác thực tài khoản , bạn hãy kiểm tra hộp thư của mình';
                header('Location: ../views/signin.php');
            }
            else{
                $_SESSION['notify_signup'] = 'Lỗi hệ thống, đăng ký không thành công';
                header('Location: ../views/signup.php');
            }
        }
        else{
            $_SESSION['notify_signup'] = 'Tài khoản này đã tồn tại';
            header('Location: ../views/signup.php');
        }
        mysqli_close($conn);
    }
