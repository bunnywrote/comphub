<?php
require_once("BaseEntity.php");

class Category extends BaseEntity{

    private static $tableName = "categories";

    public $id, $nameEN, $nameDE, $nameFR, $parentId; 

    public function __construct()
    {
        parent::__construct();
    }

<<<<<<< HEAD:Models/Category.php
    public static function create(Category $category){

        $query = 
        "INSERT INTO ".self::$tableName." (nameEN, nameDE, nameFR, parentId) VALUES (?,?,?,?);";
=======
    public static function create(Category $category)
    {
        $query =
            "INSERT INTO ".self::$tableName." (nameEN, nameDE, nameFR, parentId) VALUES (?,?,?,?);";
>>>>>>> 833a5a85dc7ab90cca6ec9a08ba867c0de0e531a:Core/Models/Category.php

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

    public static function getAllByParentId($id = 0)
    {
        //todo sanity
        $result = DB::doQuery('SELECT * FROM '.self::$tableName.' WHERE parentId='.$id);

        $categories = array();

        while($category = $result->fetch_object("Category")){
            $categories[] = $category;
        }
        return $categories;
    }

    public static function getAll()
    {
<<<<<<< HEAD:Models/Category.php
        $result = DB::doQuery('SELECT * FROM '.self::$tableName); 
        while($category = $result->fetch_object("Category")){
=======
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($category = $result->fetch_object("Category"))
        {
>>>>>>> 833a5a85dc7ab90cca6ec9a08ba867c0de0e531a:Core/Models/Category.php
            $categories[] = $category;
        }
        return $categories;
    }
}
?>