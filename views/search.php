<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/search.css">
    <title>Tìm kiếm</title>
</head>

<body>
    <?php
    include './partials/header.php';
    ?>

    <div class="container-fluid">
        <div class="col spaceSearch">
            <form action="./search.php" method="get" id="formSearch">
                <input type="search" placeholder="Tên món ăn" name="ten_monan" id="inputSearch">
                <button type="submit" id="submitSearch">Tìm kiếm</button>
            </form>
            <div class="listUserSearch">

                <?php
                include '../model/connectDB.php';
                if (isset($_GET['ten_monan'])) {
                    $con = connectDB();
                    $ten_monan = '%'.$_GET['ten_monan'] . '%';
                    $select = "select * from monan where ten_monan like '$ten_monan'";
                    $result = mysqli_query($con, $select);
                    $count = mysqli_num_rows($result);
                    if ($count >= 1) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            $img = '';
                            if ($row[5]) {
                                $img = 'src="../uploads/' . $row[5] . '"';
                            } else {
                                $img = 'src=../assets/img/noimg.jpg';
                            }
                            echo '
                        <a href="./food.php?product=' . $row[0] . '" class="userSearch">
                            <div class="nameSearch">' . $row[2] . '</div>
                            <img ' . $img . ' alt="avatar" srcset="" class="imgSearch">
                            <div class="mota">' . $row[4] . '</div>
                        </a>
                    
                    ';
                        }
                    }
                    else{
                        echo '<h1 style="color:white; margin-top: 80px;">Không có thông tin nào về khách sạn này</h1>';
                    }

                    mysqli_close($con);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include './partials/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>