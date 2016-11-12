<?php
<<<<<<< HEAD
session_start();
define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));

require_once("Controllers/Controller.php");
require_once("Controllers/HomeController.php");
require_once("Controllers/CategoryController.php");
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

//by default to home
$controller = new HomeController();
$controller->actionIndex();
=======
    include('header.php');
    define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));
    include(ROOT.'\Core\Models\Product.php');

    $products = Product::getAllProducts();
?>

<main>
    <section>
        <?php
            foreach($products as $key=>$value):
                echo '
                    <article>
                        <div class="article-image">
                            <image src="assets/images/placeholder.png">
                        </div>
                        <div class="article-description">
                            <span><h2>'.$value->name.'</h2></span>
                            <span>Price: '.$value->price.' CHF</span>
                            <p>Article specification: '.$value->descrEN.'</p>
                        </div>
                        <div class="article-buy">
                            <form action="/finance/purchase.php" method="get">
                                <p><label>Count</label></p>
                                <p>
                                    <input type="number" name="count" min="1" value="1" required>
                                </p>
                                <input type="hidden" name="price" value='.$value->price.'>
                                <input type="hidden" name="id" value='.$value->name.'>
                                <input class="btn" type="submit" value="Buy">
                            </form>
                        </div>
                    </article>
                ';
            endforeach;
        ?>
    </section>
    <aside>
        <div class="user-login">
            <form action="login.php" method="post">
                <div class="login-input">      
                    <input name="name" type="text" placeholder="Name" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <div class="login-input">      
                    <input name="password" type="password" placeholder="Password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                </div>
                <input class="btn" type="submit" name="Send">
            </form>
        </div>
    </aside>
</main>
<?php 
    include('footer.php')
>>>>>>> 833a5a85dc7ab90cca6ec9a08ba867c0de0e531a
?>