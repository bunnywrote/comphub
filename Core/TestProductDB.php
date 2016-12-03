<?php

    require_once("Models/Product.php");

    $product = new Product();

    $product->name = "HP";
    $product->descrEN = "HP Sprectre Computer";
    $product->descrDE = "HP Sprectre Rechner";
    $product->descrFR = "HP Sprectre Ordinateur";
    $product->price = 2500;
    $product->brandId = 11;

    Product::create($product);
?>