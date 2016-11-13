<?php
class CultureHelper{

    public static $defaultLang = "en";

    public static $supportedLangs = array(
            "en" => "English",
            "de" => "Deutsch",
            "fr" => "Français"
    );

    public static function isSupportedLang($lang)
    {
        return isset(self::$supportedLangs[$lang]);
    }
}
?>