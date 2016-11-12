<?php
require_once("BaseEntity.php");

class Brand extends BaseEntity
{
    private static $tableName = "brands";

    public $id, $name, $categoryId;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Brand $brand)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(name, categoryId) VALUES (?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'si',
            $brand->name,
            $brand->categoryId
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

    public function getAllAddresses()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($brand = $result->fetch_object("Brand"))
        {
            $brands[] = $brand;
        }
        return $brands;
    }

}
?>