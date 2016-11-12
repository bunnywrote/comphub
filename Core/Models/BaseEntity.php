<?php
require_once("db.php");

abstract class BaseEntity{
    protected static $db;

    protected function __construct()
    {
        DB::getDbConnection();
        self::$db = DB::getInstance();
    }
}
?>