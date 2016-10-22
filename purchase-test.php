<?php
    var_dump($_GET);

    if(empty($_GET['price']) || empty($_GET['count'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else{
        $price = $_GET['price'];
        $count = $_GET['count'];
        $totalPrice = $price * $count;

        echo $totalPrice;
    }