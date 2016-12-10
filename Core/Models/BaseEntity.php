<?php
require_once(ROOT . '\Core\DB.php');

abstract class BaseEntity{
    protected static $db;

    protected function __construct()
    {
        DB::getDbConnection();
        self::$db = DB::getInstance();
    }
}
?>