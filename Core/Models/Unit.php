<?php
require_once("BaseEntity.php");

class Unit extends BaseEntity
{
    private static $tableName = "units";

    public $id, $nameEN, $nameDE, $nameFR;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Unit $unit)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(nameEN, nameDE, nameFR) VALUES (?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'sss',
            $unit->nameEN,
            $unit->nameDE,
            $unit->nameFR
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

    public function getAllUnits()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($unit = $result->fetch_object("Unit"))
        {
            $units[] = $unit;
        }
        return $units;
    }
}