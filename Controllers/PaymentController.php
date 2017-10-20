<?php

require_once (ROOT."/Models/Address.php");

class PaymentController extends Controller{
    protected $template;

    public function actionIndex()
    {
        if(!$_SESSION['logged_in']){
            header("Location: /user/login/");
            die();
        }

        $this->template = "index";

        $this->viewBag['topSeller'] = Product::getTopSeller();
        $this->viewBag['cartItems'] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $this->getView("Payment", $this->template);
    }

    public function actionShipping()
    {
        if(!$_SESSION['logged_in']){
            header("Location: /user/login/");
            die();
        }

        $user = User::getUserBySessId($_SESSION["sessid"]);
        $payment = Payment::getPaymentByUserId($user->userId);

        if(isset($_POST["payment"]))
            $payment->type = $_POST["payment"];

        if(isset($_POST["gift"]))
            $payment->gift = 1;

        Payment::update($payment);

        $this->template = "shipping";
        $this->viewBag['topSeller'] = Product::getTopSeller();



        $this->getView("Payment", $this->template);
    }

    public function actionConfirm()
    {
        if(!$_SESSION['logged_in']){
            header("Location: /user/login/");
            die();
        }

        $user = User::getUserBySessId($_SESSION["sessid"]);

        $address = new Address();
        $address->userId = $user->userId;
        $address->city      = $_POST["city"];
        $address->street    = $_POST["street"];
        $address->state     = $_POST["state"];
        $address->zip       = $_POST["zip"];

        Address::create($address);

        $this->template = "confirm";
        $this->viewBag['topSeller'] = Product::getTopSeller();
        $this->viewBag['cartItems'] = CartItem::getItemsWithProducts($_SESSION['sessid']);
        $this->viewBag['address'] = $_POST;

        $this->getView("Payment", $this->template);
    }

    public function actionOrder()
    {
        //Helper::varDebug($_POST);

        $this->template = "order";

        $user = User::getUserBySessId($_SESSION["sessid"]);
        $payment = Payment::getPaymentByUserId($user->userId);
        $payment->paid = 1;
        Payment::update($payment);
        $this->viewBag['topSeller'] = Product::getTopSeller();

        $this->getView("Payment", $this->template);
    }
}