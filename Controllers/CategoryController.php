<?php
require_once (ROOT."/Models/Product.php");

class CategoryController extends Controller
{
    protected $template;

    public function actionIndex(int $id)
    {
        $this->template = "index";

        $this->viewBag['categories'] = $this->mapCategoriesToUrls(Category::getAllByParentId($id));
        $this->viewBag['products'] = Product::getByCategoryId($id);
        $this->viewBag['cartItems'] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $this->getView("Category", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Category", $this->template);
    }

    private function mapCategoriesToUrls($categories)
    {
        $result = array();
        
        //TODO beautify
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