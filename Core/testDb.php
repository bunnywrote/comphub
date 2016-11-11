<?php
    require_once('db.php');
    require_once('Models/product.php');

    $objectDB = DB::getDbConnection();

    $prod = new Product(DB::getInstance());
    $allProducts = $prod->getAllProducts($objectDB);

    var_dump($allProducts);
?>