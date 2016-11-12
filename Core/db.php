<?php

class DB {
    const   HOST = "localhost",
            USER = "root",
            PW = "",
            DB_NAME = "comphub";
            
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
        $db->dbConnection = new mysqli(self::HOST, self::USER, self::PW, self::DB_NAME);
        
        if(mysqli_connect_errno()){
            die("Failed to connect to MySQL: " . mysqli_connect_error());
            exit();
        }

        $db->dbConnection->set_charset('utf-8');
        return $db;
    }

    public static function getDbConnection()
    {
        try{
            $db = self::initConnection();
            return $db->dbConnection;
        }catch(Exception $ex){
            die("I was unable to open a connection to the database. " . $ex->getMessage());
            return null;
        }
    }

    public static function doQuery($sql){
<<<<<<< HEAD
=======
//        var_dump($sql);
>>>>>>> 833a5a85dc7ab90cca6ec9a08ba867c0de0e531a
        return self::getInstance()->getDbConnection()->query($sql);
    }

    private function __construct(){
    }
    
    private function __clone(){
    }
}
?>