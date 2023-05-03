<?php
session_start();
if (isset($_SESSION['signinAdmin'])) {
    header('Location: ./dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/formSign.css">
    <style>
        body{
            background-image: url('../assets/img/background_body_2.jpeg');
            
        }
    </style>
    <title>Đăng nhập</title>
</head>

<body">


    <div class="container-fluid">
        <div class="main row">

            <form id="formSign" class="form-center col-sm-5" action="../controller/signinAdmin.php" method="POST">
                <div class="row mb-2">
                    <label for="inputGmail" class="col-sm-2 col-form-label">Tài khoản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputGmail" name="taikhoan" placeholder="Nhập tài khoản" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword" name="matkhau" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                <span class="notify" id="notify">
                    <?php
                    if (!isset($_SESSION['notify_admin'])) {
                        $_SESSION['notify_admin'] = '';
                    }
                    echo $_SESSION['notify_admin'];
                    ?>
                </span>
                <div class="footer-form">
                    <button type="submit" id="btnSubmit" class="btn btn-success">Đăng nhập</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
