<?php
require_once(ROOT . '/Models/User.php');

class UserController extends Controller{
    protected $template;

    public function actionIndex()
    {
        if(!isset($_SESSION['user']))
            $this->actionLogin();
    }

    public function actionLogin()
    {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
            header("Location: /user/profile");
            die();
        }

        $this->viewBag['menuItems'] = Category::getFirstLevelCategories();

        if(!isset($_POST['email']) || !isset($_POST['password'])){
            $this->template = "login";
        }else{
            $login = $_POST['email'];
            $pass = $_POST['password'];

            $user = User::getUser($login, $pass);

            if($user !== null){
                //user exist in DB
                $sessid = Helper::generateSessId();
                Session::create($sessid, $user->id);

                $_SESSION['user'] = $user->username;
                $_SESSION['sessid'] = $sessid;
                $_SESSION['logged_in'] = true;

                $this->viewBag['user'] = $user;
                $this->template = "profile";
            }else{
                // user cannot be logged in
                $this->viewBag['errors'] = array(
                    "email or passwort is wrong"
                );
                $this->template = "login";
            }
        }

        $this->getView("User", $this->template);
    }

    public function actionSignup()
    {
        Helper::varDebug($_POST);
        $this->viewBag['menuItems'] = Category::getFirstLevelCategories();

        if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['email'])){
            $this->template = "signup";
            $this->getView("User", $this->template);
        }else{
            $errors = $this->formValidate($_POST);

            if (count($errors) !== 0){
                $this->viewBag["errors"] = $errors;
                $this->template = "signup";
            }else{
                $user = new User();
                $user->email = $_POST['email'];
                $user->password = Helper::getHash($_POST['password']);
                $user->username = $_POST['username'];
                $user->firstName = $_POST['firstName'];
                $user->lastName = $_POST['lastName'];
                $user->id = User::create($user);

                $this->template = "login";
            }

            $this->getView("User", $this->template);
        }
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        $_SESSION["logged_in"] = false;
        setcookie(session_name('sessid'),'',1);

        $this->template = "login";
        $this->getView("User", $this->template);
    }

    public function actionProfile()
    {
        if(isset($_SESSION['logged_in']) && !$_SESSION['logged_in']){
            header("Location: /user/login");
            die();
        }

        $this->template = "profile";
        $this->viewBag['menuItems'] = Category::getFirstLevelCategories();

        $user = User::getUserBySessId($_SESSION["sessid"]);

        $this->viewBag["user"] = $user;
        $this->viewBag["cartItems"] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $payment = Payment::getPaymentByUserId($user->id);

        //Helper::varDebug($payment);

        if($payment !== null)
            $this->viewBag['cartItems'] = CartItem::getItems($payment->cartId);

        //Helper::varDebug($this->viewBag);

        $this->getView("User", $this->template);
    }

    public function actionLang($params){
        $lang = $params[0];

        if(!CultureHelper::isSupportedLang($lang)){
            $lang = CultureHelper::$defaultLang;
        }

        setcookie('lang', $lang, '/');
        $_SESSION['lang'] = $lang;

        header("Location: ".$_SERVER["HTTP_REFERER"]);
        die();
    }

    private function formValidate($array){
        $errors = array();

        if (filter_var($array["email"], FILTER_VALIDATE_EMAIL)){
            if(User::getByEmail($array["email"]) !== null)
                $errors[] = "user with this email already exist";
        }else{
            $errors[] = "email is invalid";
        }

        if(strlen($array["username"]) <= 0)
            $errors[] = "username is too short";

        if(strlen($array["password"]) < 8)
            $errors[] = "password is too short";

        if(strlen($array["firstName"]) < 1)
            $errors[] = "first name is too short";

        if(strlen($array["lastName"]) < 1)
            $errors[] = "last name is too short";

        return $errors;
    }
}
?>