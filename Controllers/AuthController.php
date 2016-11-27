<?php
class AuthController extends Controller{
    protected $template;

    public function actionIndex()
    {
        if(!isset($_SESSION['logged_in']))
            $this->actionLogin();
    }

    public function actionLogin()
    {
        $this->template = "login";
        $this->getView("Auth", $this->template);
    }

    public function actionRegistration()
    {
        //todo implements
    }

    public function actionLogout()
    {
        //todo implements
    }
}
?>