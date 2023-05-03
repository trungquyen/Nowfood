<?php
if(isset($_POST['btnRegister']) && $_POST['gmail'])
{
  //B1 Gọi lại kết nối DB Sever
require "dp.php";
//Thực hiện truy vấn
$result = mysqli_query($conn,"SELECT * FROM user WHERE gmail='" . $_POST['gmail'] . "'");
//Xử lí kết quả
//kiểm tra gmail 
if(mysqli_num_rows($result ) > 0)
{
//Lưu thông tin mk  vào CSDL 
$gmail = $_POST['gmail'];
$pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql  = "UPDATE user set password ='$pass'  where gmail='$gmail'";
mysqli_query($conn, $sql);
}else{
    echo "
    Please check your gmail account again";
    }

      //Kiểm tra xem Mật khẩu đã được cập nhật chưa   
 if($row['password']=$pass){
  $Notification="Bạn đã đổi mật khẩu thành công";
  header("location: ./views/signin.php?Notification=$Notification");
}else{
$error="Bạn chưa cập nhật mật khẩu của mình . Vui lòng kiểm tra lại";
header("location: qmk.php?error=$error");
}
}
?>