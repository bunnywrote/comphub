<?php
require_once("BaseEntity.php");

class Payment extends BaseEntity
{
    private static $tableName = "payments";

    public $id, $type, $amount, $userId, $cartId;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(Payment $payment)
    {
        $query = "INSERT INTO " . self::$tableName . "(type, amount, userId, cartId) VALUES (?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'siii',
            $payment->type,
            $payment->amount,
            $payment->userId,
            $payment->cartId
        );

        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        }
        $preparedQuery->execute();
    }

    public static function getPaymentByUserId(int $userId)
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE userId = ' . $userId .' and paid = 0 LIMIT 1');

        if($result != null){
            return $result->fetch_object(__CLASS__);
        }

        return null;
    }
}
?>