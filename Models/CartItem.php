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

        Helper::varDebug($preparedQuery);

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

    public function update()
    {
        //TODO implement
    }

    public function get($id)
    {
        return DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);
    }

    public function getAllProducts()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($product = $result->fetch_object("CartItem"))
        {
            $products[] = $product;
        }
        return $products;
    }

}
?>