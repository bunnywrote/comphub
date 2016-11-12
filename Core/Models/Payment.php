<?php
require_once("BaseEntity.php");

class Payment extends BaseEntity
{
    private static $tableName = "payments";

    public $id, $type, $amount, $custId, $cartId;

    public function __construct()
    {
        parent::__construct();
        echo(__CLASS__);
    }

    public static function create(Payment $payment)
    {
        $query =
            "INSERT INTO " . self::$tableName . "(type, amount, custId, cartId) VALUES (?,?,?,?)";

        $preparedQuery = DB::getDbConnection()->prepare($query);

        $success = $preparedQuery->bind_param(
            'siii',
            $payment->type,
            $payment->amount,
            $payment->custId,
            $payment->cartId
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

    public function get($id){
        return DB::doQuery('SELECT * FROM ' . self::$tableName . ' WHERE id = ' . $id);
    }

    public function getAllPayments()
    {
        $result = DB::doQuery('SELECT * FROM ' . self::$tableName);

        while ($payment = $result->fetch_object("Payment"))
        {
            $payments[] = $payment;
        }
        return $payments;
    }

}
?>