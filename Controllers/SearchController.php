<?php
    define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));
    require_once(ROOT.'/Helpers/Helper.php');
    require_once(ROOT.'/Models/Product.php');
    require_once(ROOT.'/Models/SearchResult.php');

    if(isset($_GET['query'])){

        $product = new Product();
        $product->name = $_GET['query'];

        $products = Product::getProductByName($product->name);
        $searchResults = array();

        foreach ($products as $product){
            $searchResults[] = new SearchResult($product);
        }

        echo json_encode($searchResults);
    }

?>