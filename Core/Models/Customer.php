<?php
require_once("BaseEntity.php");

class Customer extends BaseEntity
{
    private static $tableName = "customers";

    public $id, $username, $firstName, $lastName, $password, $email;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Customer $customer)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(username, firstName, lastName, password, email) VALUES (?,?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'sssss',
            $customer->username,
            $customer->firstName,
            $customer->lastName,
            $customer->password,
            $customer->email
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

    public function getAllCustomers()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($customers = $result->fetch_object("Customer"))
            var_dump($customers);

        $result->close();
    }
}