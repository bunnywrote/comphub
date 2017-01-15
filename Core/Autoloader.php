<?php

if ($_SERVER['SERVER_NAME'] === "localhost")
    require_once ("Environment/dev.php");
else
    require_once ("Environment/prod.php");

require_once("Controllers/Controller.php");
require_once("Controllers/Widget.php");
require_once("Controllers/HomeController.php");
require_once("Controllers/UserController.php");
require_once("Controllers/CategoryController.php");
require_once("Controllers/ProductController.php");
require_once("Controllers/PaymentController.php");
require_once("Controllers/CartController.php");
require_once("Controllers/SearchController.php");

require_once("Widgets/ShoppingCart.php");
require_once("Widgets/Slider.php");
require_once("Widgets/TopSellerList.php");
require_once("Widgets/Breadcrumbs.php");

require_once("Helpers/Helper.php");
require_once("Helpers/Localizer.php");
require_once("Helpers/CultureHelper.php");
require_once("Helpers/UrlHelper.php");

require_once("Core/Router.php");

