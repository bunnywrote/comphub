<?php
session_start();
define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));

require_once("Controllers/Controller.php");
require_once("Controllers/Widget.php");
require_once("Widgets/ShoppingCart.php");
require_once("Controllers/HomeController.php");
require_once("Controllers/AuthController.php");
require_once("Controllers/CategoryController.php");
require_once("Controllers/ProductController.php");
require_once("Controllers/PaymentController.php");
require_once("Controllers/CartController.php");
require_once("Controllers/SearchController.php");

require_once("Helpers/Helper.php");
require_once("Helpers/Localizer.php");
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
        case "signup":
            if(!isset($_SESSION['user'])){
                $controller = new AuthController();

                if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['email'])){
                    $controller->actionSignUp();
                }else{
                    $controller->actionSignUp($_POST);
                }
            }
            exit();
        case "signin":
            $controller = new AuthController();
            if(!isset($_SESSION['logged_in'])) {
                // user hasn't logged in
                if(!isset($_POST['name']) && !isset($_POST['password'])){
                    $controller->actionLogin();
                }else{
                    $controller->actionLogin($_POST['email'], $_POST['password']);
                }
            }else{
                // user has logged in
                $controller->actionProfile();
            }
            exit();
        case "logout":
            $controller = new AuthController();
            $controller->actionLogout();
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
            if(!isset($_SESSION["logged_in"])){
                $controller = new AuthController();
                $controller->actionLogin();
                exit();
            }
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
        case "payment":
            if(isset($_SESSION["logged_in"])){
                $controller = new PaymentController();
                $controller->index();
                exit();
            }
            break;
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