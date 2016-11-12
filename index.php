<?php
session_start();
define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));

require_once("Controllers/Controller.php");
require_once("Controllers/HomeController.php");
require_once("Controllers/CategoryController.php");
require_once("Controllers/ProductController.php");

require_once("Helpers/Helper.php");

$controller;

if(!isset($_SESSION['lang']))
    $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

//Routing
if(count($_GET) > 0){
    switch ($_GET['type']){
        case "category":
            $controller = new CategoryController();
            $controller->actionIndex($_GET['id']);
            exit();
        case "product":
            $controller = new ProductController();
            $controller->actionIndex($_GET['id']);
            exit();
        default:
            $controller = new HomeController();
            $controller->actionError();
            exit();
    }
}
$controller = new HomeController();
$controller->actionIndex();
?>