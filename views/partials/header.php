<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="../assets/css/header.css">
<nav id="navbar-pc" class="navbar navbar-expand-md navbar-light sticky-top " style="background-color: #e3f2fd;">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item item-head">
                    <a id="trangchu" class="nav-link btn-danger text-white ms-1" href="../index.php">
                        <img src="../assets/img/Nowfood.png" alt="" class="nav-link-img">
                        Nowfood
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li>
                    <form action="./search.php" method="GET" class="input-group search_mb">
                    <input type="text" class="form-control" placeholder="Nhập tên món ăn" aria-label="search" name="ten_monan">
                    <a class="btn btn-danger text-white" href="#" role="button"><button style="color:; background-color:#fa8477; border:none;" type="submit">Tìm kiếm</button></a>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="./order.php" class="btn btn-info" style="color: blue;" href="#" role="button"><i class="fas fa-cart-plus"></i> Đơn hàng</a>
                    <?php
                    if (!isset($_SESSION['loginSuccess'])) {
                        echo '
                <a style="color: white;" class="btn btn-success" href="./signin.php" role="button">Đăng nhập</a>
                <a style="color: white;" class="btn btn-primary" href="./signup.php" role="button">Đăng ký</a>
                ';
                    } else {
                        echo '<a style="color: white;" class="btn btn-danger me-2" href="../controller/signout.php" role="button">Đăng xuất</a>';
                    }
                    ?>
                </li>

            </ul>
        </div>
    </div>
</nav>

<nav id="navbar-mb" class="navbar navbar-expand-md navbar-light sticky-top " style="background-color: #fa8477;">
    <div class="dropdown">
        <button class="btn btn-danger dropdown-toggle ms-2" type="button" id="dropdownMenu2" style="width:148px" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <!-- <li><a class="dropdown-link" href="./ticket.php"><button class="dropdown-item" type="button">Đăt hàng</button></a></li> -->
            <li><a class="dropdown-link" href="./search.php"><button class="dropdown-item" type="button">Tìm kiếm</button></a></li>
            <?php
            if (!isset($_SESSION['loginSuccess'])) {
                echo '
          <li  ><a class="dropdown-link" href="./signin.php" ><button class="dropdown-item" type="button">Đăng nhập</button></a></li>
          <li  ><a class="dropdown-link" href="./signup.php"><button class="dropdown-item" type="button">Đăng ký</button></a></li>
                ';
            } else {
                echo '<li  ><a class="dropdown-link" href=../controller/signout.php><button class="dropdown-item" type="button">Đăng xuất</button></a></li>';
            }
            ?>

        </ul>
    </div>
    <a style="font-size:20px ; text-decoration: none; color: black; position:absolute; top:0; right:0; margin-top:8px;" href="../index.php"><button style="width:148px;" class="btn btn-danger me-2">Trang chủ</button></a>
</nav>