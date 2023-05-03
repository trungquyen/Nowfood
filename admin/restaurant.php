<!-- Chức năng của người quản lý ứng dụng -->
<?php
session_start();
if (!isset($_SESSION['signinAdmin'])) {
    header('Location: ./index.php');
}
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
    <title>Danh sách nhà hàng</title>
</head>

<body>
    <!-- Table -->
    <div class="head">
        <a href="./dashboard.php">Danh sách nhà hàng Nowfood</a>
    </div>
    <div class="insert-btn"><button type="button" id="insert" class="btn btn-danger insert-button">Thêm</button>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên nhà hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Chủ nhà hàng</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // phan trang + render
                include '../model/restaurant.php';
                include '../controller/pagination.php';
                $itemSelect = 6;
                $countPage = countPageRestaurant($itemSelect);

                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                $start = $itemSelect * ($page - 1);

                //$end = $itemSelect*$page;

                $sqlSelectLimit = "select * from tt_nhahang limit $start , $itemSelect";
                $conn = connectDB();

                $result2 = mysqli_query($conn, $sqlSelectLimit);
                $i=1;

                while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                    echo '
                <tr>
                    <form action="../controller/updateHotel.php" method="post" enctype="multipart/form-data">
                    <td style="display: none;"><input name="id_hotel" class="item-input" style="width: 30px; font-size:19px; font-weight: 700;" readonly value="' . $row[0] . '"/></td>
                    <td><input class="item-input" style="width: 30px; font-size:19px; font-weight: 700;" disabled value="' . $i . '"/></td>
                    
                    <td><textarea name="ten_nhahg" class="item-input" type="text"> ' . $row[1] . ' </textarea></td>
                    <td><textarea name="sdt" class="item-input" type="text"> ' . $row[2] . ' </textarea></td>
                    <td><textarea name="email" class="item-input" type="text"> ' . $row[3] . ' </textarea></td>
                    <td><textarea name="diachi" class="item-input" type="text"> ' . $row[4] . ' </textarea></td>
                    <td><textarea name="chu_nhahg" class="item-input" type="text"> ' . $row[5] . ' </textarea></td>
                    <td>
                        <a href="../admin/food.php?id_nhahg=' . $row[0] . '"><button type="button" class="btn btn-light btn-sm m-0 py-1 px-2">Xem món ăn</button></a>
                        <a href="../admin/order.php?id_nhahg=' . $row[0] . '"><button type="button" class="btn btn-light btn-sm m-0 py-1 px-2">Xem đơn hàng</button></a>
                        <button type="submit" class="btn btn-danger btn-sm m-0 py-1 px-2 mr-1">Cập nhật</button>
                        <a href="#"><button type="button" class="btn btn-light btn-sm m-0 py-1 px-2">Xóa</button></a>
                    </td>
                    </form>
                </tr>
                ';
                $i++;
                }

                ?>

            </tbody>


        </table>
    </div>

    <nav class="page-nav" aria-label="...">
        <ul class="pagination pagination-lg">
            <?php
            for ($i = 1; $i <= $countPage; $i++) {

                if (isset($_GET['page']) && $i == $_GET['page']) {
                    echo "<li class='page-item disabled'><a class='page-link' href='./dashboard.php?page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='./dashboard.php?page=$i'>$i</a></li>";
                }
            }
            if (isset($conn)) {
                mysqli_close($conn);
            }
            ?>


        </ul>
    </nav>
    <!-- <a href="./food.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-primary">Quản lý đồ ăn <i class="fas fa-arrow-circle-right"></i></button>
    </a> -->
    <a href="./order.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px; margin-top: 20px" class="btn btn-light">Quản lý đơn hàng<i class="fas fa-arrow-circle-right"></i></button>
    </a>
    <a href="../controller/signoutAdmin.php" class="next-page" style="margin-top: 60px; margin-bottom:30px">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-danger">Đăng xuất</i></button>
    </a>


    <div class="modal" id="modal">
        <form class="form-restaurant" id="form" action="../controller/inserRestaurant.php" enctype="multipart/form-data" method="post">
            <input type="file" style="display: none;" name="img" id="img-insert">
            <input type="text" placeholder="Email" name="gmail">
            <input type="text" placeholder="Mật khẩu" name="password">
            <button type="submit" class="btn btn-danger">Thêm tài khoản nhà hàng</button>
        </form>
    </div>

    <!-- Table -->
    <script src="../assets/libs/autosize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        autosize(document.querySelectorAll('textarea'));
    </script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>