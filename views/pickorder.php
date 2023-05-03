<?php
session_start();
if (!isset($_SESSION['loginSuccess'])) {
    header('Location: ./signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/pickticket.css">
    <style>
        tr,
        th,
        td {
            color: white;
        }
    </style>
    <title>Đặt đơn hàng</title>
</head>

<body>
    <!-- chỗ này để tiến hành insert thông tin vé vào bảng ticket với thông tin người dùng chọn,
    ở đây sẽ có 1 vài thông tin có sẵn cua khách sạn như tên khách sạn , thông tin gmail của người dùng không phải nhập ,
    mấy thông tin này lấy từ GET[id_hotel] (được truyền từ trang detail) và SESSION[signinSuccess] (gmail) ,
    sau khi ấn đặt vé ở đây thì thêm vào bảng ticket và gửi email cái thông tin vé vừa đặt cho họ 
 -->
    <?php
    include './partials/header.php';
    ?>

    <?php
    include '../model/food.php';
    $conn = connectDB();
    $gmail = $_SESSION['loginSuccess'];
    $sql_2 = "select id from `user` where gmail = '$gmail'";
    $result_2 = mysqli_query($conn, $sql_2);
    $row2 = mysqli_fetch_assoc($result_2);
    $id = $row2['id'];




    //Nếu không có id sản phẩm được truyền trên url thì sẽ 
    if (isset($_GET['id'])) {
        $id_monan = $_GET['id'];
        $sql = "SELECT * FROM `monan` WHERE id_monan = $id_monan ";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);
                $id_nh = $row['id_nh'];
                $ten_monan = $row['ten_monan'];
                $gia = $row['gia'];
                $img_name = $row['img'];
                $img = "../uploads/$img_name";
            } else {
                header("Location: error.php");
            }
        }
    } //else {
    //     $nameHotel = 'Bạn chưa chọn khách sạn';
    //     $phoneHotel = 'Bạn chưa chọn khách sạn';
    //     $place = 'Bạn chưa chọn khách sạn';
    //     $soluongphong = 'Bạn chưa chọn khách sạn';
    //     $nhahang = 0;
    //     $phonghop = 0;
    //     $damcuoi = 0;
    //     $massage = 0;
    //     $mota = 'Bạn chưa chọn khách sạn';
    //     $trangthai = 0;
    //     $img = "../assets/img/noimg.jpg";
    // }


    ?>

    <nav>
        <div class="container">
            <div class="text-center my-4">
                <h1 style="color: #000; font-style:italic">Điền nội dung đơn hàng
                </h1>
            </div>
            <div class="row" style="color:white;">

                <div class="col-xs-12 col-sm-7">
                    <h3 class="h2 subtitle sub_booking" style="background-color: !important;color: #000!important;padding: 10px;">Thông tin đơn hàng</h3>
                    <div class="fieldcontain">
                        <form method="post" id="form_order" action="../controller/insertOrder.php">
                            
                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label text-dark">Họ và Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ten_ngd" name="ten_ngd">
                                </div>
                            </div>
                            
                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label text-dark">Ngày đặt</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="ngaydat" name="ngaydat" value="2023-04-13">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label text-dark">Địa chỉ </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="diachi" name="diachi" value="null">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label text-dark">Số điện thoại </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sdt" name="sdt" value="null">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label text-dark">Tổng tiền (VNĐ)</label>
                                <div class="col-sm-10">
                                    <input id="tongtien" placeholder="" name="tongtien" type="number" readonly class="form-control txtContactNotes">
                                </div>
                                <input type="number" name="id_nd" style="display: none;" readonly value="<?php echo $id; ?>">
                                <input type="number" id="id_nh_ajax" name="id_nhahg" style="display: none;"  readonly value="<?php echo $id_nh; ?>">

                            </div>
                            <div class="form-group row my-4">
                                <button type="submit" id="btn-submit" class="btn btn-danger">Đặt</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <h3 class="h2 subtitle sub_booking" style="background-color: !important;color: #000!important;padding: 10px;">Thông tin món ăn</h3>
                    <div class="food_info" style="width: 100%;">
                        <img id="img_food" class="col-sm-6 my-2 mx-2 img-fluid" src="<?php echo $img; ?>" alt="img hotel">
                        <div class="food-body col-sm-6">
                            <h4 class="card-title">
                                <?php echo $ten_monan  ?>
                            </h4>
                            <div class="my-2">
                                <label class="card-text">Giá: </label>
                                <input class="bg-light" style="width:50%" readonly id="gia" name="gia" type="number" value="<?php echo $gia  ?>">
                            </div>
                            <div class="my-2" >
                                <label class="card-text">Số lượng: </label>
                                <div class="buttons_added">
                                    <input class="minus is-form" type="button" onclick="handleMinus()" value="-">
                                    <input aria-label="quantity" readonly class="input-qty" max="100" min="1" onchange="myFunction()" id="soluong" name="soluong" type="number" value="1">
                                    <input class="plus is-form" type="button" onclick="handlePlus()" value="+">
                                </div>
                                <!-- <input aria-label="quantity" class="" style="width:70%" max="" min="1" id="soluong" name="soluong" type="number" value="1"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <?php
    include './partials/footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.7/dayjs.min.js"></script>



    <script src="../assets/js/ajaxPickTicket.js"></script>
</body>

</html>