<?php

class PaymentController extends Controller{
    protected $template;

    public function actionIndex(){
        $this->template = "index";

        $this->viewBag['topSeller'] = Product::getTopSeller();
        $this->viewBag['cartItems'] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $this->getView("Payment", $this->template);
    }

    public function actionShipping(){
        $this->template = "shipping";
        $this->viewBag['topSeller'] = Product::getTopSeller();

        Helper::varDebug($_POST);

        $this->getView("Payment", $this->template);
    }
}