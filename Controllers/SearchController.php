<?php
    require_once(ROOT.'/Controllers/Controller.php');
    require_once(ROOT.'/Helpers/Helper.php');
    require_once(ROOT.'/Models/Product.php');
    require_once(ROOT.'/Models/SearchResult.php');

class SearchController extends Controller
{

    public function doSearch($value)
    {

        if ($value) {

            $product = new Product();
            $product->name = $_GET['query'];

            $products = Product::getProductByName($product->name);
            $searchResults = array();

            foreach ($products as $product) {
                $searchResults[] = new SearchResult($product);
            }
            echo json_encode($searchResults);
        }
    }

}

?>