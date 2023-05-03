<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Chi tiết món ăn</title>
</head>

<body>

    <?php include './partials/header.php' ?>

    <?php
    include '../model/food.php';
    $gmail = '';
    if (isset($_SESSION['loginSuccess'])) {
        $gmail = $_SESSION['loginSuccess'];
    }
    $id_monan = $_GET['product'];
    $sql = "SELECT * FROM `monan` WHERE id_monan = $id_monan ";
    $conn = connectDB();
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            $ten_monan = $row['ten_monan'];
            $gia = $row['gia'];
            $mota = $row['mota'];
            $id_nh = $row['id_nh'];
            if ($row['img']) {
                $img = "../uploads/".$row['img'];
              } else {
                $img = '../assets/img/noimg.jpg';
              }
        } else {
            header("location:error.php");
        }
    }

    $sql1 = "SELECT * FROM `tt_nhahang` WHERE id_nhahg = $id_nh";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1 == true) {
        $row1 = mysqli_fetch_assoc($result1);
        $ten_nhahg = $row1['ten_nhahg'];
        $diachi = $row1['diachi'];
    }

    ?>

    <div class="container-fluid" style="padding: 0 3%; margin-bottom: 160px; margin-top: 30px">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-5" style="padding: 20px 20px 20px 0; border-right: #adb5bd solid 1px;">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img style="height: 488px;" src="<?php echo $img; ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7" style="padding: 20px 0 0 20px;">
                <table class="table table-striped">
                    <tbody>
                        <?php
                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3" style="font-size: 1.5rem; color: #000"> Món ăn: </th>';
                        echo '<td class="col-sm-9 col-md-9 col-lg-9" style="font-size: 1.5rem;">'.$ten_monan.'.</td>';
                        echo '</tr>';
                        
                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3"> Giá: </th>';
                        echo '<td class="col-sm-9 col-md-9 col-lg-9">'.$row['gia'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3" style="color: #000">Thông tin: </th>';
                        echo'</tr>';

                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3"></i> Mô tả: </th>';
                        echo '<td class="col-sm-9 col-md-9 col-lg-9">'.$row['mota'].'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3"></i> Nhà hàng: </th>';
                        echo '<td class="col-sm-9 col-md-9 col-lg-9">'.$ten_nhahg.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<th scope="row" class="col-sm-3 col-md-3 col-lg-3"></i> Địa chỉ: </th>';
                        echo '<td class="col-sm-9 col-md-9 col-lg-9">'.$row1['diachi'].'</td>';
                        echo '</tr>';
                        ?>
                    </tbody>
                </table>
                <?php
                echo'<div class="col my-4">';
                    echo'<a class="btn btn-danger" href="pickorder.php?id='.$id_monan.'" role="button">Thêm vào giỏ hàng</a>';
                echo'</div>';
                ?>
            </div>


        </div>

    </div>




    <?php include './partials/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>