<?php
class Session extends BaseEntity{
    private static $tableName = "user_sessions";

    public $id, $sessId, $cartId;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create($sessId, int $cartId){
        $query = "INSERT INTO " . self::$tableName . "(sessId, cartId) VALUES (?, ?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'si',
            $sessId,
            $cartId
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
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName .' WHERE sessId ="'.$sessId.'" LIMIT 1');
        
        Helper::varDebug($result);

        if($result != null){
            return $result->fetch_object("Session");
        }

        return null;
    }
}
?>