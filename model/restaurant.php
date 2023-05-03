<?php
    function isRestaurant($gmail,$password){
        $conn = mysqli_connect('localhost','root','','nowfoodd');
        if(!$conn){
            die('Khong the ket noi toi Database');
        }
        $sql = "select * from tk_nhahang where gmail = '$gmail' and password = '$password'";
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

    function connectDB(){
        $conn = mysqli_connect('localhost','root','','nowfoodd');
        if($conn){
            return $conn;
        }
        else{
            die('Khong the ket noi toi Database');
        }
    }

    function selectAllRestaurant(){
        $conn = connectDB();
        $sql = 'select * from tt_nhahang';
        $result = mysqli_query($conn,$sql);
        return $result;
        
        mysqli_close($conn);
    }

    

    function selectInfoRestaurant(){
        $conn = connectDB();
        $sql = 'select * from tt_nhahang';
        $result = mysqli_query($conn,$sql);
        return $result;
        
        mysqli_close($conn);
    }

    function updateRestaurant($id_nhahg,$ten_nhahg,$sdt,$diachi,$email,$chu_nhahg){
        $conn = connectDB();
        $sql = "UPDATE tt_nhahang SET ten_nhahg='$ten_nhahg',sdt= '$sdt',diachi='$diachi',email='$email',chu_nhahg='$chu_nhahg' WHERE id_nhahg = $id_nhahg";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }
?>