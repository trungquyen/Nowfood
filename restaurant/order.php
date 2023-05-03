<!-- Chức năng của nhà hàng-->
<?php
session_start();
if (!isset($_SESSION['signinRestaurant'])) {
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
    <title>Quản lý các đơn hàng</title>
</head>

<body>
    <!-- Table -->
    <div class="head">
        <a href="./order.php">Danh sách quản lý các đơn hàng</a>
    </div>
    <div class="insert-btn"><button type="button" id="insert" class="btn btn-success insert-button">Thêm</button>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Tổng tiền</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // phan trang + render
                include '../model/order.php';
                include '../controller/pagination.php';
                $itemSelect = 6;
                $countPage = countPageOrder($itemSelect);

                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                $start = $itemSelect * ($page - 1);

                //$end = $itemSelect*$page;

                $sqlSelectLimit = "select * from donhang limit $start , $itemSelect";
                $conn = connectDB();

                $result2 = mysqli_query($conn, $sqlSelectLimit);
                $i=1;
                while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                    echo '
                    <tr>
                        <form action="../controller/updateTicket.php" method="post" >
                        <td><input name="id_dh" class="item-input" style="width: 30px; font-size:19px; font-weight: 700;" readonly value="' . $i . '"></td>
                    
                        <td><input name="ten_ngd" class="item-input" type="text" readonly value ="' . $row[1] . '"></td>
                        <td><input name="ngaydat" class="item-input" type="text" readonly value ="' . $row[2] . '" ></td>
                        <td><input name="diachi" class="item-input" type="text" readonly value ="' . $row[3] . '"></td>
                        <td><input name="sdt" class="item-input" type="text" readonly value ="' . $row[4] . '"></td>
                        <td><input name="tongtien" class="item-input" readonly type="number" value ="' . $row[5] . '"></td>
                        <td>
                            <a href="#"><button type="button" class="btn btn-success btn-sm m-0 py-1 px-2">Xem chi tiết</button></a>
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
                    echo "<li class='page-item disabled'><a class='page-link' href='./order.php?page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='./order.php?page=$i'>$i</a></li>";
                }
            }
            if (isset($conn)) {
                mysqli_close($conn);
            }
            ?>


        </ul>
    </nav>
    <a href="./food.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-primary">Quản lý món ăn <i class="fas fa-arrow-circle-right"></i></button>
    </a>
    <a href="./info.php" class="next-page" style="margin-top: 30px">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-primary">Thông tin nhà hàng <i class="fas fa-arrow-circle-right"></i></button>
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