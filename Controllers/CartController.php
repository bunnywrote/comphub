<?php
require_once (ROOT."/Models/Session.php");
require_once (ROOT."/Models/Cart.php");
require_once (ROOT."/Models/Payment.php");
require_once (ROOT."/Models/CartItem.php");

class CartController extends Controller
{
    protected $template;

    public function actionIndex()
    {
        $this->template = "index";

        if(isset($_SESSION['sessid']))
            $this->viewBag['cartItems'] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $this->getView("Cart", $this->template);
    }

    public function actionAdd($params = null){

        if(isset($_POST['price']) && isset($_POST['id'])){
            $productId = ($_POST['id']);
            $quantity = ($_POST['count']);
        }else{
            $productId = $params[0];
            $quantity = 1;
        }

        // session doesn't exist
        $session = Session::getBySessId($_SESSION['sessid']);

//        Helper::varDebug($session);
//        exit();

        if($session !== null){
            $payment = Payment::getPaymentByUserId($session->userId);
        }

//        Helper::varDebug($payment);
//        exit();

        // user hasn't payment
        if(!isset($payment)){
            $cart = new Cart();
            $cartId = Cart::create($cart);

            $payment = new Payment();
            $payment->userId = $session->userId;
            $payment->cartId = $cartId;
            $payment->amount = $cart->totalCost;
            $payment->paid = 0;
            $payment->gift = 0;
            Payment::create($payment);
        }else{
            $cart = Cart::getById($payment->cartId);
            $cartId = $cart->id;
        }

        $cartItem = CartItem::getItem($productId, $cartId);



        if($cartItem === null){
            $cartItem = new CartItem();
            $cartItem->cartId = $cartId;
            $cartItem->productId = $productId; #TODO check if product exist
            $cartItem->quantity = $quantity;
            Cart::add($cartItem);
        }else{
            $cartItem->quantity += $quantity;

//            Helper::varDebug($cartItem);
//            exit();

            CartItem::update($cartItem);
        }

//        Helper::varDebug($payment);
//        Helper::varDebug($cart);
//        Helper::varDebug($cartItem);
//         exit();


        header("Location: ".$_SERVER["HTTP_REFERER"]);
        die();
    }

    //GET /cart/remove/{productId}
    public function actionRemove($params)
    {
        Helper::varDebug($params);

        $productId = (int)$params[0];

        if($_SESSION['logged_in'])
        {
            $session = Session::getBySessId($_SESSION['sessid']);
            $payment = Payment::getPaymentByUserId($session->userId);
            $cart = Cart::getById($payment->cartId);
            $cartItem = CartItem::getItem($productId, $cart->id);

            if(is_int($productId) && $cartItem !== null)
            {
                $cartItem->quantity -= $cartItem->quantity > 0 ? 1 : 0;
                CartItem::update($cartItem);
            }
        }

        header("Location: ".$_SERVER["HTTP_REFERER"]);
        die();
    }

    //GET /cart/delete/{productId}
    public function actionDelete($params)
    {
        $productId = (int)$params[0];

        if($_SESSION['logged_in'])
        {
            $session = Session::getBySessId($_SESSION['sessid']);
            $payment = Payment::getPaymentByUserId($session->userId);
            $cart = Cart::getById($payment->cartId);
            $cartItem = CartItem::getItem($productId, $cart->id);

            if(is_int($productId) && $cartItem !== null)
            {
                $cartItem->quantity = 0;
                CartItem::update($cartItem);
            }
        }

        header("Location: ".$_SERVER["HTTP_REFERER"]);
        die();
    }

    public function getCartById(int $id)
    {
        // return array of class Cart with all joined attributes
        return Cart::getById($id);
    }
}
?>