<?php
abstract class Controller{
    public $viewBag;

    protected function getView($viewFolder, $template){
        try {
            $file = ROOT . '/Views/'.$viewFolder.'/' . strtolower($this->template) . '.php';

            if (file_exists($file)) {
                $this->render($file);
            } else {
                throw new Exception('Template ' . $template . ' not found!');
            }
        }
        catch (Exception $e) {
            echo $e->errorMessage();
        }
    }

    protected function render($file)
    {
        ob_start();
        require $file ;            
        ob_end_flush();
    }
}
?>