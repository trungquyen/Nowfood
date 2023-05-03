<?php
    function connectDB(){
        $conn = mysqli_connect('localhost','root','','nowfoodd');
        if($conn){
            return $conn;
        }
        else{
            die('Khong the ket noi toi Database');
        }
    }

    function selectAllFood(){
        $conn = connectDB();
        $sql = 'select * from monan';
        $result = mysqli_query($conn,$sql);
        return $result;
        
        mysqli_close($conn);
    }

    function insertFood($id_nh,$ten_monan,$gia,$mota,$img){
        $conn = connectDB();
        $sql = "INSERT INTO monan ( id_nh ,ten_monan, gia, mota,img) 
        VALUES ('$id_nh','$ten_monan','$gia','$mota','$img')";
        echo $sql;
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }
    function insertFoodNoImg($id_nh,$ten_monan,$gia,$mota){
        $conn = connectDB();
        $sql = "INSERT INTO monan ( id_nh ,ten_monan, gia, mota) 
        VALUES ('$id_nh','$ten_monan','$gia','$mota')";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function updateFood($id_monan,$ten_monan,$gia,$mota,$img,$duyet){
        $conn = connectDB();
        $sql = "UPDATE monan SET ten_monan='$ten_monan',gia= '$gia',mota='$mota',img = '$img',duyet='$duyet' WHERE id_monan = $id_monan";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }
    function updateFoodNoImg($id_monan,$ten_monan,$gia,$mota,$duyet){
        $conn = connectDB();
        $sql = "UPDATE monan SET ten_monan='$ten_monan',gia= '$gia',mota='$mota',duyet='$duyet' WHERE id_monan = $id_monan";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function browseFood($id_monan,$duyet){
        $conn = connectDB();
        $sql = "UPDATE monan SET duyet='$duyet' WHERE id_monan = $id_monan";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function deleteFood($id_monan){
        $conn = connectDB();
        $sql = "DELETE FROM `monan` WHERE id_monan=$id_monan";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function searchFood($ten_monan){
        $conn = connectDB();
        $sql = "select * from monan where ten_monan = '$ten_monan'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count>=1){
            return $result;
        }
        else{
            echo 'loi tim kiem du lieu tu bang monan'; 
        }
        mysqli_close($conn);
    }
?>