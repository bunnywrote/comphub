<?php
require_once (ROOT."/Models/Session.php");
require_once (ROOT."/Models/Cart.php");
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

    //TODO remove
    public function getLastNotPaidCartById(int $id)
    {
        // return cart with payment
        return Cart::getNotPaidCartById($id);
    }

    public function addToCart(int $productId, int $quantity)
    {
        // session doesn't exist
        if(isset($_SESSION['sessid'])){
            $session = Session::getBySessId($_SESSION['sessid']);

             Helper::varDebug($session);

            if($session !== null)
                $cart = Cart::getNotPaidCartById((int) $session->cartId);
        }
        
        // cart doesn't exist
        if(!isset($cart))
        {
            $cart = new Cart();
            $cart->totalCost = 22222; #TODO calculate total cost
            $cartId = Cart::create($cart);  
            
            if ($session == null) 
                Session::create($_SESSION['sessid'], $cartId);     
        }

        $cartItem = new CartItem();
        $cartItem->cartId = $cartId != null ? $cartId : $cart->id;
        $cartItem->productId = $productId; #TODO check if product exist
        $cartItem->quantity = $quantity;

        Helper::varDebug($cart);        
        Helper::varDebug($cartId);        
        Helper::varDebug($cartItem);        
        exit();

        Cart::add($cartItem);
        return true;
    }
}
?>