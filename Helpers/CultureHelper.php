<?php
class CultureHelper{

    public static $defaultLang = "en";

    public static $supportedLangs = array(
            "en" => "English",
            "de" => "Deutsch",
            "fr" => "Français"
    );

    public static function isSupportedLang(string $lang)
    {
        return isset(self::$supportedLangs[$lang]);
    }

    public static function getProperty($object, string $propertyName)
    {
        if(isset($_SESSION['lang']) && self::isSupportedLang($_SESSION['lang']))
            $localizedPropertyName = $propertyName.strtoupper($_SESSION['lang']);
        else
            $localizedPropertyName = $propertyName.strtoupper(self::$defaultLang);

        $array = (array) $object;
        return $array[$localizedPropertyName];
    }
}
?>