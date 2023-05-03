<?php
    session_start();
    if(isset($_SESSION['loginSuccess'])){
        header('Location: ../index.php');
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
    <title>Đăng nhập</title>
</head>

<body>


    <div class="container-fluid">
        <div class="main row">

            <form id="formSign" class="form-center col-sm-5" action="../controller/signin.php" method="POST">
                <div class="row mb-2">
                    <label for="inputGmail" class="col-sm-2 col-form-label">Gmail</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputGmail" name="gmail" placeholder="Nhập email" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                </div>
                <!-- <div class="row mb-2">
                    <div class="col-sm-9 offset-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkRemember">
                            <label class="form-check-label" for="checkRemember">
                                Nhớ
                            </label>
                        </div>
                    </div>
                </div> -->
                <span class="notify" id="notify">
                    <?php
                    if (!isset($_SESSION['notify_signin'])) {
                        $_SESSION['notify_signin'] = '';
                    }
                    echo $_SESSION['notify_signin'];
                    ?>
                </span>
                <span class="notify">
                    <?php
                    echo $_GET['Notification'];
                    ?>
                </span>
                <div class="footer-form">
                    <button type="submit" id="btnSubmit" class="btn btn-danger">Đăng nhập</button>
                    <a href="../mail.php"><button type="button" class="btn btn-light">Quên mật khẩu</button></a>
                    <a href="./signup.php"><button type="button" class="btn btn-light">Tạo tài khoản</button></a>
                    <a href="../index.php"><button type="button" class="btn btn-light">Về trang chủ</button></a>
                </div>
            </form>

        </div>
    </div>

    <script src="../assets/js/formSignIn.js"></script>

</body>

</html>