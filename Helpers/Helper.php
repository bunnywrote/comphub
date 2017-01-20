<?php
class Helper{

    public static function varDebug($value)
    {
        echo("<pre>");
        var_dump($value);
        echo("</pre>");
    }

    public static function generateSessId()
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 5)), 0, 32);
    }

    public static function getHash(string $str)
    {
        return hash('ripemd128', $str);
    }
}
?>