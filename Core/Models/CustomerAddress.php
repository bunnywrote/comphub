<?php
require_once("BaseEntity.php");

class CustomerAddress extends BaseEntity
{
    private static $tableName = "customer_address";

    public $custId, $addressId;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(CustomerAddress $customerAddress)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(custId, addressId) VALUES (?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'ii',
            $customerAddress->custId,
            $customerAddress->addressId
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

        while ($address = $result->fetch_object("CustomerAddress"))
            var_dump($address);

        $result->close();
    }
}