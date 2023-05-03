<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Lỗi...</title>
</head>
<body>
    
    <div class="text-center" style="height: 42rem;">
        <div class="container">
            <p><i class="fal fa-bug" style="font-size: 20rem; margin-top:8%; color: #adb5bd;"></i></p>
            <br>
            <?php
                session_start();
                if(!isset($_SESSION['err'])){
                    $_SESSION['err'] = 'Rất tiếc, <br> Hệ thống đang có lỗi gì đó...';
                }
                echo '<p style="color: #adb5bd;">'.$_SESSION["err"].'</p>';
            ?>
            <a class="btn btn-warning" href="../index.php" role="button"><button style="color: inherit; background-color:inherit; border:none;" type="submit"><i class="fal fa-home-lg"></i>Trang chủ</button></a>
        </div>
    </div>
</body>
</html>

