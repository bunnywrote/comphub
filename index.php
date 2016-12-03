<?php
session_start();
define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));

require_once("Controllers/Controller.php");
require_once("Controllers/HomeController.php");
require_once("Controllers/AuthController.php");
require_once("Controllers/CategoryController.php");
require_once("Controllers/ProductController.php");
require_once("Controllers/CartController.php");
require_once("Controllers/SearchController.php");

require_once("Helpers/Helper.php");
require_once("Helpers/CultureHelper.php");

$controller;

// Helper::varDebug($_GET);
// Helper::varDebug($_COOKIE);

if(!isset($_COOKIE['sessid']) && !isset($_SESSION['sessid'])){
    $sessId = Helper::generateSessId();
    setcookie("sessid", $sessId);
    $_SESSION["sessid"] = $sessId;
}

//Helper::varDebug($_SESSION);

if(isset($_COOKIE['lang'])){
    $_SESSION['lang'] = $_COOKIE['lang'];
}

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}

//Routing
if(count($_GET) > 0){
    switch ($_GET['type']){
        case "login":
            if(!isset($_SESSION['logged_in'])){
                $controller = new AuthController();
                $controller->actionLogin();
            }
            exit();
        case "category":
            $controller = new CategoryController();
            $controller->actionIndex($_GET['id']);
            exit();
        case "product":
            $controller = new ProductController();
            $controller->actionIndex($_GET['id']);
            exit();
        case "search":
            $controller = new SearchController();
            $controller->doSearch($_GET['query']);
            exit();
        case "cart":
            if(isset($_POST['id']) && isset($_POST['count'])){
                $productId = (int)$_POST['id'];
                $quantity = (int)$_POST['count'];

                $controller = new CartController();
                $cart = $controller->addToCart($productId, $quantity);

                header("Location: ".$_SERVER["HTTP_REFERER"]);
                die();
            }else{
                die("$_POST is empty");
            }
            exit();
        case "lang":
            if(isset($_GET['value'])){
                if(CultureHelper::isSupportedLang($_GET['value'])){
                    $lang = $_GET['value'];
                }else{
                    $lang = CultureHelper::$defaultLang;
                }

                setcookie('lang', $lang);
                $_SESSION['lang'] = $lang;

                header("Location: ".$_SERVER["HTTP_REFERER"]);
                die();
            }
            else{
                die("incorrect lang");
            }
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