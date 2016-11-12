<?php
    require_once(ROOT.'\Core\Models\BaseEntity.php');

class Product extends BaseEntity
{
    private static $tableName = "products";

    public $id, $name, $descrEN, $descrDE, $descrFR, $price, $brandId, $categoryId;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Product $product)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(name, descrEN, descrDE, descrFR, price, brandId, categoryId) VALUES (?,?,?,?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'ssssiii',
            $product->name,
            $product->descrEN,
            $product->descrDE,
            $product->descrFR,
            $product->price,
            $product->brandId,
            $product->categoryId
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

        while ($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return $products;
    }

}
?>