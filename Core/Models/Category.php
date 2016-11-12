<?php
require_once("BaseEntity.php");

class Category extends BaseEntity{
    private static $tableName = "categories";

    public $id, $nameEN, $nameDE, $nameFR, $parentId; 


    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Category $category){
        //TODO implement

        var_dump($category);

        $query = 
        "INSERT INTO ".self::$tableName." (nameEN, nameDE, nameFR, parentId) VALUES (?,?,?,?);";

        $preparedQuery = DB::getDbConnection()->prepare($query);
        
        var_dump($preparedQuery);
        
        $success = $preparedQuery->bind_param('sssi', 
            $category->nameEN, 
            $category->nameDE, 
            $category->nameFR, 
            $category->parentId);
        
        var_dump($success);
        
        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        } 
        $preparedQuery->execute();
        // return self::$db::doQuery($query);
    }

    public function update()
    {
        //TODO implement
    }

    public function get(){
        //TODO implement
    }

    public function getAllProducts()
    {
        // var_dump($this->db);
        return $this->db::doQuery('SELECT * FROM '.$this->tableName);
    }
}
?>