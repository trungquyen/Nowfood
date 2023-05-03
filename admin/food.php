<!-- Chức năng của nhà hàng-->
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
    <title>Danh sách món ăn</title>
</head>

<body>
    <!-- Table -->
    <div class="head">
        <a>Danh sách quản lý món ăn</a>
    </div>
    <div class="container">
        <h4>
            <?php 
                if(!isset($_GET['Notification'])){
                    $Noti = '';
                }else{
                    $Noti = $_GET['Notification'];
                } 
                echo $Noti;
            ?>
        </h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên món ăn</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mô tả</th>

                </tr>
            </thead>

            <tbody>
                <?php
                // phan trang + render
                include '../model/food.php';
                include '../controller/pagination.php';
                $itemSelect = 10;
                $countPage = countPageFood($itemSelect);

                if (isset($_GET['id_nhahg'])) {
                    $id_nhahg = $_GET['id_nhahg'];
                }

                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }

                $start = $itemSelect * ($page - 1);

                //$end = $itemSelect*$page;

                $sqlSelectLimit = "select * from monan where id_nh = $id_nhahg limit $start , $itemSelect";
                $conn = connectDB();

                $result2 = mysqli_query($conn, $sqlSelectLimit);
                $i=1;

                while ($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                    $img = '';
                    $duyet = $row2[6];
                    if ($row2[5]) {
                        $img = '<img src="../uploads/' . $row2[5] . '" alt="img" class="preview-img" />';
                    } else {
                        $img = '<img src="../assets/img/noimg.jpg" alt="img" class="preview-img"/>';
                    }
                    echo '
                    <tr>
                        <td style="display: none;"><input name="id_monan" class="item-input" style="width: 30px; font-size:19px; font-weight: 700;" readonly value="' . $row2[0] . '"/></td>
                        <td><input class="item-input" style="width: 30px; font-size:19px; font-weight: 700;" disabled value="' . $i . '"/></td>
                        <td><input name="img" id="file-' . $row2[0] . ' readonly " class="input-img" type="file"/>
                        <label for="file-' . $row2[0] . '" class="label-img" id="label-' . $row2[0] . '">
                        ' . $img . '
                        </label>
                        </td>
                        <td><textarea name="ten_monan" readonly class="item-input" type="text"> ' . $row2[2] . ' </textarea></td>
                        <td><textarea name="gia" readonly class="item-input" type="text"> ' . $row2[3] . ' </textarea></td>
                        <td><textarea name="mota" readonly class="item-input" type="text"> ' . $row2[4] . ' </textarea></td>';
                        if($duyet == 0){
                            echo '
                            <td>
                            <form action="../controller/browseFood.php" method="post" enctype="multipart/form-data">
                                    <input name="id_monan" class="item-input" style="display: none; width: 30px; font-size:19px; font-weight: 700;" readonly value="' . $row2[0] . '"/>
                                    <input name="id_nh" class="item-input" style="display: none; width: 30px; font-size:19px; font-weight: 700;" readonly value="' . $row2[1] . '"/>
                                    <button type="submit" class="btn btn-primary btn-sm m-0 py-1 px-2 mr-1">Duyệt món ăn</button>
                                </form>
                            </td>';
                        }
                    echo '<td>
                            <a href="#"><button type="button" class="btn btn-danger btn-sm m-0 py-1 px-2">Xóa</button></a>
                        </td>
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
                    echo "<li class='page-item disabled'><a class='page-link' href='./food.php?id_nhahg=$id_nhahg&page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='./food.php?id_nhahg=$id_nhahg&page=$i'>$i</a></li>";
                }
            }
            if (isset($conn)) {
                mysqli_close($conn);
            }
            ?>


        </ul>
    </nav>
    <a href="./order.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-primary">Quản lý đơn hàng <i class="fas fa-arrow-circle-right"></i></button>
    </a>
    <!-- <a href="./ticket.php" class="next-page">
        <button type="button" style="height: 50px; margin-right:20px; font-size: 18px;" class="btn btn-primary"> <i class="fas fa-arrow-circle-right"></i></button>
    </a> -->
    <a href="../controller/signoutAdmin.php" class="next-page" style="margin-top: 60px; margin-bottom:30px">
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