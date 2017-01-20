<?php
require_once("BaseEntity.php");

class CartItem extends BaseEntity
{
    private static $tableName = "cart_items";

    public $id, $cartId, $productId, $quantity;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(CartItem $cartItem)
    {
        $query =
            "INSERT INTO " . self::$tableName . " (productId, cartId, quantity) VALUES (?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        if($preparedQuery){
            $cartId =    (int)$cartItem->cartId;
            $productId = (int)$cartItem->productId;
            $quantity = (int)$cartItem->quantity;

            $success = $preparedQuery->bind_param(
                'iii',
                $productId,
                $cartId,                
                $quantity           
            );

            if(!$success){
                die("ERROR: ".DB::getDbConnection()->error);
                return false;
            }

            $preparedQuery->execute();
        }else{
            die(__CLASS__."; $preparedQuery = ".$preparedQuery);
        }
    }

    public static function update(CartItem $cartItem)
    {
        $quantity = $cartItem->quantity;
        $id = $cartItem->id;

        $result = DB::doQuery("UPDATE ".self::$tableName." SET quantity = ".$quantity." WHERE id=".$id);
    }

    public function get($id)
    {
        return DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);
    }

    public static function getItem(int $productId, int $cartId)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.
                                ' WHERE productId='.$productId.' AND cartId='.$cartId.' LIMIT 1');

//        Helper::varDebug($result);
//        exit();

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }

    public static function getItems(int $cartId)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' ci'.
                                ' JOIN products p ON p.id = ci.productId'.
                                ' WHERE quantity > 0 AND cartId='.$cartId);

        $cartItems = array();

        while ($cartItem = $result->fetch_object(__CLASS__))
            $cartItems[] = $cartItem;

        return $cartItems;
    }

    public static function getItemsWithProducts(string $sessId){

        $result = DB::doQuery('SELECT ci.*, pr.* FROM '.self::$tableName.' ci 
                                JOIN carts c on ci.cartid = c.id
                                JOIN payments p on p.cartId = c.id
                                JOIN user_sessions us on us.userId = p.userId
                                JOIN products pr on pr.id = ci.productId
                                where ci.quantity > 0 AND us.sessid ="'.$sessId.'" and p.paid = 0');

        $cartItems = array();

        while ($cartItem = $result->fetch_object("CartItem"))
            $cartItems[] = $cartItem;

        return $cartItems;
    }
}
?>