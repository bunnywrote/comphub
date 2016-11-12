<?php
class Helper{

    public static function varDebug($value)
    {
        echo("<pre>");
        var_dump($value);
        echo("</pre>");
    }

    public static function getProductUrl(int $id)
    {
        return "?type=product&id=".$id;
    }
}
?>