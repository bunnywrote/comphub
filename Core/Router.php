<?php


class Router
{
    private $controller = null;
    private $action = null;
    private $params = array();

    public function __construct()
    {

        $this->parseUrl();

        if($this->controller === null){
            $controller = new HomeController();
            $controller->actionIndex();
        }

        if(class_exists($this->controller)){
            $controller = new $this->controller();

            if(method_exists($controller, $this->action) && is_callable(array($controller, $this->action))){
                if($this->params === null){
                    $controller->{$this->action}();
                }else{
                    call_user_func_array(array($controller, $this->action), array($this->params));
                }
            }else{
                $controller = new HomeController();
                $controller->actionError();
                //echo "method don't exist";
                die();
            }
        }else{
            $controller = new HomeController();
            $controller->actionError();
            //echo "controller don't exist";
            die();
        }
    }

    private function parseUrl(){
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $url = array_diff($url, array(''));
        $url = array_values($url);

        $this->controller = isset($url[0]) ? $this->getControllerName($url[0]) : null;
        $this->action = isset($url[1]) ? $this->getActionName($url[1]) : null;
        unset($url[0], $url[1]);
        $this->params = array_values($url);;
    }

    private function getControllerName(string $name){
        return ucfirst($name)."Controller";
    }

    private function getActionName(string $name){
        return "action".ucfirst($name);
    }
}