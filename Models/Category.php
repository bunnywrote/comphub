<?php
require_once("BaseEntity.php");

class Category extends BaseEntity{

    private static $tableName = "categories";

    public $id, $nameEN, $nameDE, $nameFR, $parentId; 

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(Category $category){

        $query = 
            "INSERT INTO ".self::$tableName." (nameEN, nameDE, nameFR, parentId) VALUES (?,?,?,?);";
        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param('sssi', 
            $category->nameEN, 
            $category->nameDE, 
            $category->nameFR, 
            $category->parentId);

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

    public static function getFirstLevelCategories()
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' WHERE parentId = 0');

        $categories = array();

        while($category = $result->fetch_object("Category"))
        {
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getAllByParentId($id)
    {
        if($id === 0) return null;

        //todo sanity
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' WHERE parentId='.$id);

        $categories = array();

        while($category = $result->fetch_object("Category"))
        {
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getAll()
    {
        $result = DB::doQuery('SELECT * FROM '.self::$tableName); 

        while ($category = $result->fetch_object("Category"))
        {
            $categories[] = $category;
        }
        return $categories;
    }
}
?>