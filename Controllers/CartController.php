<?php
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

    public function getLastNotPaidCartById(int $id)
    {
        // return cart with payment
        return Cart::getNotPaidCartById($id);
    }

    public function addToCart(int $productId, int $quantity)
    {
        if(isset($_SESSION['cartId'])){
            $cart = $this->getLastNotPaidCartById((int) $_SESSION['cartId']);

            if($cart != null){
                //Add to existed cart
                $cartItem = new CartItem();
                $cartItem->cartId = $cart->id;
                $cartItem->productId = $productId; #TODO check if product exist
                $cartItem->quantity = $quantity;

                CartItem::create($cartItem); #TODO check if cartItem with the productId has been added
                return true;
            }
        }
        //todo create new cart and add product
        $cart = new Cart();
        $cart->totalCost = 22222;
        
        $cartId = Cart::create($cart);

        $cartItem = new CartItem();
        $cartItem->cartId = $cartId;
        $cartItem->productId = $productId; #TODO check if product exist
        $cartItem->quantity = $quantity;

        CartItem::create($cartItem); #TODO check if cartItem with the productId has been added

        return true;
    }
}
?>