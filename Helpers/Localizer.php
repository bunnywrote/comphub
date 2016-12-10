<?php

class Localizer{

    private static $localizer;

    public static function translate(string $value){
        if(!self::$localizer)
            self::$localizer = self::getLocalizer();

        return self::$localizer[$value] ?? $value;
    }

    private static function getLocalizer(){
        $file = file_get_contents('Resources/localization/'.$_SESSION['lang'].'.json');

        if($file)
            $result = json_decode($file, true);

        return $result;
    }
}