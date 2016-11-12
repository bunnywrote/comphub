<?php
require_once("BaseEntity.php");

class Address extends BaseEntity
{
    private static $tableName = "address";

    public $id, $street, $city, $state, $zip;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Address $address)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(street, city, state, zip) VALUES (?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'sssi',
            $address->street,
            $address->city,
            $address->state,
            $address->zip
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

        while ($addresses = $result->fetch_object("Address"))
            var_dump($addresses);

        $result->close();
    }
}