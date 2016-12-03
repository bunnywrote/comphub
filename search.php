<?php
    define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));
    require_once("Helpers/Helper.php");
    require_once("Models/Product.php");

    $product = new Product();
    $product->name = "HP";

    Helper::varDebug(Product::getProductByName($product->name));
?>