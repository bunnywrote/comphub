<?php
class Session extends BaseEntity{
    private static $tableName = "user_sessions";

    public $id, $userId, $lang, $created;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create($sessId, int $userId){
        $query = "INSERT INTO " . self::$tableName . "(sessId, userId, lang, created) VALUES (?, ?, ?, ?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $date = date('Y-m-d H:i:s', time());

        $success = $preparedQuery->bind_param(
            'siss',
            $sessId,
            $userId,
            $_SESSION["lang"],
            $date
        );

        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        }
        $preparedQuery->execute();
        
        // Helper::varDebug($preparedQuery);
        // Helper::varDebug(DB::getDbConnection());

        $lastId = $preparedQuery->insert_id;

        Helper::varDebug($lastId);

        return $lastId;
    }

    public static function getBySessId(string $sessId)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName .' WHERE sessId ="'.$sessId.'" ORDER BY created DESC LIMIT 1');
        
        //Helper::varDebug($result);

        if($result != null){
            return $result->fetch_object("Session");
        }

        return null;
    }
}