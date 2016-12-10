<?php
require_once(ROOT . '/Models/User.php');

class AuthController extends Controller{
    protected $template;

    public function actionIndex()
    {
        if(!isset($_SESSION['user']))
            $this->actionLogin();
    }

    public function actionLogin($login = null, $pass = null)
    {
        if($login == null && $pass == null){
            $this->template = "login";
        }else{
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

        $this->getView("Auth", $this->template);
    }

    public function actionSignUp($array = null)
    {
        if($array == null){
            $this->template = "signup";
            $this->getView("Auth", $this->template);
        }else{
            $errors = $this->formValidate($array);

            if (count($errors) !== 0){
                $this->viewBag["errors"] = $errors;
                $this->template = "signup";
            }else{
                $user = new User();
                $user->email = $array['email'];
                $user->password = Helper::getHash($array['password']);
                $user->username = $array['username'];
                $user->firstName = $array['firstName'];
                $user->lastName = $array['lastName'];
                $user->id = User::create($user);

                //$this->viewBag['user'] = $user;
                $this->template = "login";
            }

            $this->getView("Auth", $this->template);
        }
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        $_SESSION["logged_in"] = false;
        setcookie(session_name('sessid'),'',1);

        $this->template = "login";
        $this->getView("Auth", $this->template);
    }

    public function actionProfile(){
        $user = User::getUserBySessId($_SESSION["sessid"]);
        $this->template = "profile";

        $this->viewBag["user"] = $user;
        $this->viewBag["cartItems"] = CartItem::getItemsWithProducts($_SESSION['sessid']);

        $payment = Payment::getPaymentByUserId($user->id);

        //Helper::varDebug($payment);

        if($payment !== null)
            $this->viewBag['cartItems'] = CartItem::getItems($payment->cartId);

        //Helper::varDebug($this->viewBag);

        $this->getView("Auth", $this->template);
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