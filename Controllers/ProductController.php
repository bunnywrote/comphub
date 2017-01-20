<?php
class ProductController extends Controller{
    protected $template;

    public function actionShow($params){

        $id = $params[0];
        $this->template = "index";

        $this->viewBag['menuItems'] = Category::getFirstLevelCategories();
        $this->viewBag['product'] = Product::getByIdWithProperty($id);

        if(isset($_SESSION['logged_in']))
        {
            $session = Session::getBySessId($_SESSION['sessid']);
            $payment = Payment::getPaymentByUserId($session->userId);
            if($payment !== null)
                $this->viewBag['cartItems'] = $session !== null ? CartItem::getItems($payment->cartId) : null;
        }

        $this->getView("Product", $this->template);
    }

    public function actionError()
    {
        $this->template = "error";

        $this->getView("Product", $this->template);
    }
}
?>