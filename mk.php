<?php
  if(isset($_POST['btnRegister']) && $_POST['gmail']){
    //B1 Gọi lại kết nối DB Sever
    require "dp.php";
    //Thực hiện truy vấn
    $result = mysqli_query($conn,"SELECT * FROM user WHERE gmail='" . $_POST['gmail'] . "'");
    //Xử lí kết quả
    //kiểm tra gmail được dùng hay chưa 
    if(mysqli_num_rows($result ) >= 0)
    {
      $token = md5($_POST['gmail']).rand(10,9999);
      //Lưu thông tin  vào CSDL 
      $gmail = $_POST['gmail'];//gửi dữ liệu từ client lên sever 
      //Yêu cầu người dùng nhấn vào để kích hoạt
      $link = "<a href='http://localhost/Nowfood/pass.php?key=".$gmail."&token=".$token."'>Nhấn vào đây</a>";
      //$link = "Chết rồi";
      //Gửi email
      include "send_email.php";
      if(sendEmailForAccountActive($gmail, $link)){
        echo"Vui lòng kiểm tra email của bạn để thay đổi mật khẩu ";
      }

    }else{
    echo "You have already registered with us. Check Your email box and verify email.";
    }
}


?>