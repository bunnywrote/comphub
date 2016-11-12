<?php
require_once("BaseEntity.php");

class CartItem extends BaseEntity
{
    private static $tableName = "cart_items";

    public $id, $quantity;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(CartItem $cartItem)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(quantity) VALUES (?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'i',
            $cartItem->quantity
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

        while ($products = $result->fetch_object("CartItem"))
            var_dump($products);

        $result->close();
    }
}