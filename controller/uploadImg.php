<?php
function upImg($img){
$target_dir = "../uploads/";
$target_file = $target_dir . basename($img["name"]);
$uploadOk = 1; // neu = 0 thi khong cho up
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Kiem tra xem co phai file anh khong
if(isset($_POST["submit"])) {
  $check = getimagesize($img["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Day khong phai anh";
    $uploadOk = 0;
  }
}

// neu filr ton tai roi khi set $uploadOk = 0
// if (file_exists($target_file)) {
//   echo "File da ton tai.";
//   $uploadOk = 0;
// }

// gioi han kich thuoc anh
// if ($img["size"] > 500000) {
//   echo "kich thuoc qua lon";
//   $uploadOk = 0;
// }

// // chi cho upfile jpg , png , jpeg , gif
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   $uploadOk = 0;
// }

// Neu uploadOk = 1 thi cho up
if ($uploadOk == 0) {
  return false;
} else {
  move_uploaded_file($img["tmp_name"], $target_file);
  return true;
}
}
?>