<?php
abstract class Widget{

    public static $items;

    protected static function getView($template){
        try {
            $file = ROOT . '/Views/Widgets/' . strtolower($template) . '.php';

            if (file_exists($file)) {
                self::render($file);
            } else {
                throw new Exception('Template ' . $template . ' not found!');
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private static function render($file)
    {
        ob_start();
        require $file ;
        ob_end_flush();
    }
}