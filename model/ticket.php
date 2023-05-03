<?php
    function connectDB(){
        $conn = mysqli_connect('localhost','root','','hotel');
        if($conn){
            return $conn;
        }
        else{
            die('Khong the ket noi toi Database');
        }
    }

    function selectAllTicket(){
        $conn = connectDB();
        $sql = 'select * from ticket';
        $result = mysqli_query($conn,$sql);
        return $result;
        mysqli_close($conn);
    }


    function insertTicket($tenkhach,$gmail,$hotel_name,$ngaydat,$ngayketthuc,$yeucau,$chiphi,$trangthai,$id_hotel,$id_user){
        $conn = connectDB();
        $sql = "INSERT INTO ticket ( tenkhach, gmail, hotel_name, ngaydat, ngayketthuc, yeucau, chiphi, trangthai , id_hotel , id_user) 
        VALUES ('$tenkhach','$gmail','$hotel_name','$ngaydat','$ngayketthuc','$yeucau','$chiphi','$trangthai','$id_hotel','$id_user')";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function updateTicket($id,$tenkhach,$gmail,$hotel_name,$ngaydat,$ngayketthuc,$yeucau,$chiphi,$trangthai){
        $conn = connectDB();
        $sql = "UPDATE ticket SET tenkhach='$tenkhach',gmail='$gmail',hotel_name='$hotel_name',ngaydat='$ngaydat',ngayketthuc='$ngayketthuc',
        yeucau='$yeucau',chiphi='$chiphi',trangthai= '$trangthai' WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    function deleteTicket($id){
        $conn = connectDB();
        $sql = "DELETE FROM `ticket` WHERE id=$id";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    
    // Tính chi phí của vé dựa trên số ngày khách đặt
    function sumChiPhi($chiphi_hotel , $ngaybatdau , $ngayketthuc){
        
    }
?>