<?php
    session_start();
    if(isset($_SESSION['signinAdmin'])){
        unset($_SESSION['signinAdmin']);
        header('Location: ../admin/index.php');
    }
?>