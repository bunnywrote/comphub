<?php

class ShoppingCart extends Widget{

    public static function widget($values){
        self::$items = $values;
        self::getView(__CLASS__);
    }

    private static function groupById($array)
    {
        $result = array();
        foreach ($array as $key => $value)
        {
            $result[$value->productId][] = $value;
        }
        return $result;
//        Helper::varDebug($result);
    }
}