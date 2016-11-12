<?php
    require_once("Models/Category.php");

    $category = new Category();
    $category->nameEN = "PC";
    $category->nameDE = "Einzelplatzrechner";
    $category->nameFR = "Ordinateur";
    $category->parentId = 0;

    Category::create($category);
?>