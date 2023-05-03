<?php
    function countPageFood($num){
        $result = selectAllFood();
        $sum = mysqli_num_rows($result);
        $countPage = 0;
        if(!$sum){
            $sum = 0;
        }
        $countPage = ceil($sum / $num);
        return $countPage;
    }

    function countPageRestaurant($num){
        $result = selectAllRestaurant();
        $sum = mysqli_num_rows($result);
        $countPage = 0;
        if(!$sum){
            $sum = 0;
        }
        $countPage = ceil($sum / $num);
        return $countPage;
    }

    function countPageOrder($num){
        $result = selectAllOrder();
        $sum = mysqli_num_rows($result);
        $countPage = 0;
        if(!$sum){
            $sum = 0;
        }
        $countPage = ceil($sum / $num);

        return $countPage;
    }
    
?>
