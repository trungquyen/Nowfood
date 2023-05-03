<?php
    function isAdmin($taikhoan,$matkhau){
        $conn = mysqli_connect('localhost','root','','nowfoodd');
        if(!$conn){
            die('Khong the ket noi toi Database');
        }
        $sql = "select * from admin where taikhoan = '$taikhoan' and matkhau = '$matkhau'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count>=1){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }
?>