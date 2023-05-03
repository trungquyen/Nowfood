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

    function selectAllOrder(){
        $conn = connectDB();
        $sql = 'select * from donhang';
        $result = mysqli_query($conn,$sql);
        return $result;
        mysqli_close($conn);
    }


    function insertOrder($ten_ngd,$ngaydat,$diachi,$sdt,$tongtien,$id_nd,$id_nhahag){
        $conn = connectDB();
        $sql = "INSERT INTO donhang ( ten_ngd,ngaydat,diachi,sdt,tongtien,id_nd,id_nhahag) 
        VALUES ('$ten_ngd','$ngaydat','$diachi','$sdt','$tongtien','$id_nd','$id_nhahag')";
        $result = mysqli_query($conn,$sql);
        if($result==true){
            return true;
        }
        else{
            return false;
        }
        mysqli_close($conn);
    }

    // function updateTicket($id,$tenkhach,$gmail,$hotel_name,$ngaydat,$ngayketthuc,$yeucau,$chiphi,$trangthai){
    //     $conn = connectDB();
    //     $sql = "UPDATE ticket SET tenkhach='$tenkhach',gmail='$gmail',hotel_name='$hotel_name',ngaydat='$ngaydat',ngayketthuc='$ngayketthuc',
    //     yeucau='$yeucau',chiphi='$chiphi',trangthai= '$trangthai' WHERE id = $id";
    //     $result = mysqli_query($conn,$sql);
    //     if($result==true){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    //     mysqli_close($conn);
    // }

    // function deleteTicket($id){
    //     $conn = connectDB();
    //     $sql = "DELETE FROM `ticket` WHERE id=$id";
    //     $result = mysqli_query($conn,$sql);
    //     if($result==true){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    //     mysqli_close($conn);
    // }

    
    // Tính chi phí của vé dựa trên số ngày khách đặt
    // function sumChiPhi($chiphi_hotel , $ngaybatdau , $ngayketthuc){
        
    // }
?>