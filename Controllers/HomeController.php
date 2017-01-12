<?php
require_once(ROOT.'/Models/Category.php');
require_once(ROOT.'/Models/Product.php');


class HomeController extends Controller {
    protected $template;

    public function actionIndex()
    {
        $this->template = "index";
        $this->viewBag['menuItems'] = Category::getFirstLevelCategories();

        $this->viewBag['categories'] = $this->mapCategoriesToUrls(Category::getAllByParentId());
        $this->viewBag['lastItems'] = Product::getLatestProducts();
        // TODO get top sellers from CartItem
        $this->viewBag['topSeller'] = Product::getTopSeller();

        if(isset($_SESSION['logged_in']))
        {
            $session = Session::getBySessId($_SESSION['sessid']);
            $payment = Payment::getPaymentByUserId($session->userId);
            if($payment !== null)
                $this->viewBag['cartItems'] = $session !== null ? CartItem::getItems($payment->cartId) : null;
        }

        $this->getView("Home", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Home", $this->template);
    }

    private function mapCategoriesToUrls($categories)
    {
        #TODO beautify
        foreach($categories as $key => $value){
            switch($_SESSION['lang']){
                case 'de':
                    $result[$value->nameDE] = "?type=category&id=".$value->id;
                    break;
                case 'fr':
                    $result[$value->nameFR] = "?type=category&id=".$value->id;
                    break;
                default:
                    $result[$value->nameEN] = "?type=category&id=".$value->id;
                    break;
            }
        }

        return $result;
    }
}
?>