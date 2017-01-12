<?php
    require_once(ROOT.'/Models/BaseEntity.php');

class Product extends BaseEntity
{
    private static $tableName = "products";

    public $id, $name, $descrEN, $descrDE, $descrFR, $price, $brandId, $categoryId;

    public function __construct()
    {
        parent::__construct();
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

    public static function getById($id)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return count($products) > 0 ? $products[0] : null;
    }

    public static function getByIdWithProperty($id)
    {
        $result = DB::doQuery('SELECT p.* FROM '.self::$tableName.' p 
                                LEFT JOIN product_properties pp ON p.id = pp.prodId
                                LEFT JOIN properties pr ON pp.propId = pr.id
                                where p.id = '.$id);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }

//        Helper::varDebug($products);
//        exit();

        return count($products) > 0 ? $products[0] : null;
    }

    public static function getByCategoryId($id)
    {
        $result = DB::doQuery('SELECT p.* FROM '.self::$tableName.' p 
                                JOIN categories c on p.categoryId = c.id
                                WHERE c.id = '.$id.' OR c.parentId = '.$id);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return $products;
    }

    public static function getProductByName($name)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' WHERE name like \'%'.$name.'%\'');

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return $products;
    }

    public static function getProductByRam($value)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' p 
                                JOIN product_properties pp ON p.id = pp.prodId
                                JOIN properties pr ON pp.propId = pr.id
                                JOIN units u ON pr.unitID = u.id
                                where pr.nameEN = "RAM Capacity" AND u.value = '.$value);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return count($products) > 0 ? $products[0] : null;
    }

    public static function  getProductByHdd($value)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' p 
                                JOIN product_properties pp ON p.id = pp.prodId
                                JOIN properties pr ON pp.propId = pr.id
                                JOIN units u ON pr.unitID = u.id
                                where pr.nameEN = "HDD Capacity" AND u.value = '.$value);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return count($products) > 0 ? $products[0] : null;
    }

    public static function getLatestProducts(int $count = 3)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' 
                                WHERE created <> 0
                                ORDER BY created DESC
                                LIMIT '.$count);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return $products;
    }

    public static function getTopSeller(int $count = 4)
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' 
                                WHERE created <> 0
                                ORDER BY name
                                LIMIT '.$count);

        $products = array();

        while($product = $result->fetch_object("Product"))
        {
            $products[] = $product;
        }
        return $products;
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