<?php
//Kết nối tới Database
    $host='localhost';
    $username='root';
    $password='';
    $dbname = "nowfoodd";
    $conn=mysqli_connect($host,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>