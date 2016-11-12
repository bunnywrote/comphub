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

        while ($product = $result->fetch_object("Cart"))
        {
            $products[] = $product;
        }
        return $products;
    }

}