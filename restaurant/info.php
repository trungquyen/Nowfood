<!-- Chức năng của nhà hàng-->
<?php
    session_start();
    if (!isset($_SESSION['signinRestaurant'])) {
        header('Location: ./index.php');
    }

    // phan trang + render
    include '../model/restaurant.php';
    $gmail = $_SESSION['signinRestaurant'];
    $sql = "select * from tt_nhahang where id_nhahg = (SELECT id FROM tk_nhahang WHERE gmail = '$gmail')";
    $conn = connectDB();

    $result2 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result2, MYSQLI_NUM);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <title>Thông tin nhà hàng</title>
</head>

<body>
    <!-- Table -->
    <div class="head">
        <a href="./info.php">Thông tin nhà hàng</a>
    </div>
    
    <div class="container">
        <form action="../controller/updateRestaurant.php" method="post" enctype="multipart/form-data">
            <div class="mb-3" style="display: none;">
                <label class="form-label">Id nhà hàng</label>
                <input type="text" class="form-control" readonly id="" name="id_nhahg" value="<?php echo $row[0]; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tên nhà hàng</label>
                <input type="text" class="form-control" id="" name="ten_nhahg" value="<?php echo $row[1]; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="" name="sdt" value="<?php echo $row[2]; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="" name="email" value="<?php echo $gmail; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="" name="diachi" value="<?php echo $row[4]; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Chủ nhà hàng</label>
                <input type="text" class="form-control" id="" name="chu_nhahg" value="<?php echo $row[5]; ?>">
            </div>
            
            <div class="insert-btn">
                <button type="submit" id="" class=" btn btn-danger">Cập nhập</button>
            </div>
        </form>
    </div>

    <a href="./order.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-light">Quản lý đơn hàng <i class="fas fa-arrow-circle-right"></i></button>
    </a>
    <a href="./food.php" class="next-page" style="margin-top: 30px">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-light">Quản lý món ăn<i class="fas fa-arrow-circle-right"></i></button>
    </a>
    <a href="../controller/signoutRestaurant.php" class="next-page" style="margin-top: 60px; margin-bottom:30px">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-danger">Đăng xuất</i></button>
    </a>

    <!-- Table -->
    <script src="../assets/libs/autosize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        autosize(document.querySelectorAll('textarea'));
    </script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>