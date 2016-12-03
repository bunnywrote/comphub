<?php
require_once("BaseEntity.php");

class Property extends BaseEntity
{
    private static $tableName = "properties";

    public $id, $nameEN, $nameDE, $nameFR, $unitID;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(Property $property)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(nameEN, nameDE, nameFR, unitID) VALUES (?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'sssi',
            $property->nameEN,
            $property->nameDE,
            $property->nameFR,
            $property->unitID
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

    public function getById($id)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);

        $properties = array();

        while($property = $result->fetch_object("Property"))
        {
            $properties[] = $property;
        }
        return $properties;
    }

    public function getAllProducts()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($property = $result->fetch_object("Property"))
        {
            $properties[] = $property;
        }
        return $properties;
    }

}
?>