<?php
    require_once("Models/Category.php");
    require_once("Helper.php");
    // $category = new Category();
    // $category->nameEN = "Server";
    // $category->nameDE = "Server";
    // $category->nameFR = "Serveur";
    // $category->parentId = 0;

   // Category::create($category);

   Helper::varDebug(Category::getAll());
?>