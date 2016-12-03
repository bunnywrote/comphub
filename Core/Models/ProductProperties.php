<?php
require_once("BaseEntity.php");

class ProductProperties extends BaseEntity
{
    private static $tableName = "product_properties";

    public $prodId, $propId;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(ProductProperties $productProperties)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(prodId, propId) VALUES (?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'ii',
            $productProperties->prodId,
            $productProperties->propId
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
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);

        $properties = array();

        while($property = $result->fetch_object("Product"))
        {
            $properties[] = $property;
        }
        return $properties;
    }

    public function getAllProducts()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($property = $result->fetch_object("ProductProperties"))
        {
            $properties[] = $property;
        }
        return $properties;
    }

}
?>