<?php

class DB {

    private static $instance;
    private $dbConnection;

    public static function getInstance()
    {
        if(!self::$instance)
            self::$instance = new DB();

        return self::$instance;
    }

    private static function initConnection()
    {
        $db = self::getInstance();
        $db->dbConnection = new mysqli($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASS"], $_ENV["DB_NAME"]);

        if(mysqli_connect_errno()){
            die("Failed to connect to MySQL: " . mysqli_connect_error());
            exit();
        }
        $db->dbConnection->set_charset('utf8');
        return $db;
    }

    public static function getDbConnection()
    {
        try{
            $db = self::initConnection();
            return $db->dbConnection;
        }catch(Exception $ex){
            die("It was unable to open a connection to the database. " . $ex->getMessage());
            return null;
        }
    }

    public static function doQuery($sql){
         //Helper::varDebug($sql);
        return self::getInstance()->getDbConnection()->query($sql);
    }

    private function __construct(){
    }
    
    private function __clone(){
    }
}
?>