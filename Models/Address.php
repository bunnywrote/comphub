<?php
require_once("BaseEntity.php");

class Address extends BaseEntity
{
    private static $tableName = "address";

    public $id, $userId, $street, $city, $state, $zip;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Address $address)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(userId, street, city, state, zip) VALUES (?,?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'isssi',
            $address->userId,
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

    public function getByUserId($id)
    {
        $result =  DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE userId = ' . $id.' LIMIT 1');

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }

    public function getAllAddresses()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($address = $result->fetch_object("Address"))
        {
            $addresses[] = $address;
        }
        return $addresses;
    }

}
?>