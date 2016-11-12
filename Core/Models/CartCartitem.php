<?php
require_once("BaseEntity.php");

class CartCartitem extends BaseEntity
{
    private static $tableName = "cart_cartitem";

    public $cartId, $cartItemId, $active;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(CartCartitem $cartCartitem)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(cartId, cartItemId, active) VALUES (?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        // TODO boolean!
        $success = $preparedQuery->bind_param(
            'iib',
            $cartCartitem->cartId,
            $cartCartitem->cartItemId,
            $cartCartitem->active
        );

        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        }
        $preparedQuery->execute();
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

        while ($product = $result->fetch_object("CartCartitem"))
        {
            $products[] = $product;
        }
        return $products;
    }

}
?>