<?php
require_once("BaseEntity.php");

class Cart extends BaseEntity
{
    private static $tableName = "carts";

    public $id, $totalCost;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(Cart $cart)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(totalCost) VALUES (?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'i',
            $cart->totalCost
        );

        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        }
        $preparedQuery->execute();
        
        // Helper::varDebug($preparedQuery);
        // Helper::varDebug(DB::getDbConnection());

        $lastId = $preparedQuery->insert_id;

        Helper::varDebug($lastId);

        return $lastId;
    }

    public static function add(CartItem $cartItem)
    {
        #TODO check if cartItem with the productId has been added
        CartItem::create($cartItem); 
    }

    public function update(int $cartId, int $productId, int $quantity)
    {
        $product = Product::getById($productId); 
        
        if($product != null){
            
        }
    }

    public static function getById(int $cartId)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $cartId .' LIMIT 1');

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }

    public static function getNotPaidCartById(int $id)
    {
        Helper::varDebug($id);

        $result = DB::doQuery(  ' SELECT * FROM ' .self::$tableName. ' c'.
                                ' JOIN payments p ON p.cartId = c.id'. 
                                ' WHERE p.paid = 0 and c.id ='.$id. 
                                ' LIMIT 1');

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;

        // Helper::varDebug($result);
        // exit();
        // $carts = array();

        // while ($cart = $result->fetch_object("Cart"))
        //     $carts[] = $cart;

        // return $carts;
    }

    public static function getByIdWithProperties($id)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName .' c '.
                                ' JOIN cart_items ci ON ci.cartId = c.id
                                JOIN products p ON p.id = ci.productId
                                WHERE c.id ='.$id);
        
        $carts = array();

        while ($cart = $result->fetch_object("Cart"))
            $carts[] = $cart;

        return $carts;
    }

    // public static function getItems(int $cartId)
    // {
    //     'SELECT * FROM user_sessions us JOIN cart_items ci ON ci.cartId = us.cartId JOIN products p ON p.id = ci.productId WHERE sessId='63z105vp8k7tjq6qn3g1gf0u7nm8gsao''
    //     $result = DB::doQuery('SELECT * FROM '.self::$tableName.' c'.
    //                             ' JOIN cart_items ci ON ci.cartId ='.$cartId.
    //                             ' JOIN products p ON p.id = ci.productId'.
    //                             ' WHERE  ')
    // }
}