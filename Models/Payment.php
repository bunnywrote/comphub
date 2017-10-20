<?php
require_once("BaseEntity.php");

class Payment extends BaseEntity
{
    private static $tableName = "payments";

    public $id, $type, $amount, $userId, $cartId, $paid, $gift;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create(Payment $payment)
    {
        $query = "INSERT INTO " . self::$tableName . "(type, amount, userId, cartId, gift) VALUES (?,?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'siiii',
            $payment->type,
            $payment->amount,
            $payment->userId,
            $payment->cartId,
            $payment->gift
        );

        if(!$success){
            die(DB::getDbConnection()->error);
            return false;
        }
        $preparedQuery->execute();
    }

    public static function update(Payment $payment)
    {
        $query = "UPDATE ".self::$tableName." SET type='".$payment->type.
                 "', paid=".$payment->paid.", gift=".$payment->gift." WHERE id=".$payment->id;
        $result = DB::doQuery($query);
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