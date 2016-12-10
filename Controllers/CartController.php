<?php
require_once (ROOT."/Models/Session.php");
require_once (ROOT."/Models/Cart.php");
require_once (ROOT."/Models/Payment.php");
require_once (ROOT."/Models/CartItem.php");

class CartController extends Controller
{
    protected $template;

    public function actionIndex(int $id)
    {
        $this->template = "index";

        $this->getView("Cart", $this->template);
    }

    public function getCartById(int $id)
    {
        // return array of class Cart with all joined attributes
        return Cart::getById($id);
    }

    public function addToCart(int $productId, int $quantity)
    {
        // session doesn't exist
        $session = Session::getBySessId($_SESSION['sessid']);

         Helper::varDebug($session);

        if($session !== null){
            $payment = Payment::getPaymentByUserId($session->userId);
        }

        Helper::varDebug($payment);
//        exit();

        // user hasn't payment
        if(!isset($payment)){
            $cart = new Cart();
            $cart->totalCost = 22222; #TODO calculate total cost
            $cartId = Cart::create($cart);

            $payment = new Payment();
            $payment->userId = $session->userId;
            $payment->cartId = $cartId;
            $payment->amount = $cart->totalCost;
            Payment::create($payment);
        }else{
            $cart = Cart::getById($payment->cartId);
        }

        $cartItem = new CartItem();
        $cartItem->cartId = isset($cartId) ? $cartId : $cart->id;
        $cartItem->productId = $productId; #TODO check if product exist
        $cartItem->quantity = $quantity;

        Helper::varDebug($payment);
        Helper::varDebug($cart);
        Helper::varDebug($cartItem);
       // exit();

        Cart::add($cartItem);
        return true;
    }
}
?>