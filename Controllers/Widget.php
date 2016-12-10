<?php
abstract class Widget{

    public static $items;

    protected function getView($template){
        try {
            $file = ROOT . '/Views/Widgets/' . strtolower($template) . '.php';

            if (file_exists($file)) {
                self::render($file);
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
        }
        catch (customException $e) {
            echo $e->errorMessage();
        }
    }

    private function render($file)
    {
        ob_start();
        require $file ;
        ob_end_flush();
    }
}
?>