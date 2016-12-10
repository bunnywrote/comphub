<?php
class User extends BaseEntity{
    private static $tableName = "users";

    public $id, $username, $firstName, $lastName, $password, $email;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(User $user){

        $query = "INSERT INTO " . self::$tableName . "(username, firstName, lastName, password, email) VALUES (?, ?, ?, ?, ?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'sssss',
            $user->username,
            $user->firstName,
            $user->lastName,
            $user->password,
            $user->email
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
        //exit();
        return $lastId;
    }

    public static function getUser($email, $password)
    {
        $hashPassword = Helper::getHash($password);
        $result = DB::doQuery('SELECT * FROM ' .self::$tableName . ' WHERE email ="'.$email.'" and password ="'.$hashPassword.'" LIMIT 1');

//        Helper::varDebug($result);

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }

    public static function getUserBySessId($sessId){

        $result = DB::doQuery(  'SELECT * FROM ' . self::$tableName . ' u '.
                                'LEFT JOIN user_sessions us on u.id = us.userId '.
                                'WHERE us.sessId ="'.$sessId.'" ORDER BY created DESC LIMIT 1');

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }

    public static function getByEmail($email)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName .' WHERE email ="'.$email.'" LIMIT 1');

//        Helper::varDebug($result);

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }
}
?>