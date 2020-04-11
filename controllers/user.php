<?php



// контролер
Class Controller_User Extends Controller_Base {
    // шаблон
    public $layouts = "first_layouts";

    // экшен
    function index() {
        $info = "ИВАН";

        $this->template->vars('info', $info);
        $this->template->view('index');
    }


    function regist() {
        $filter = new Filter();
        $auth = new Authentication();
        $authentication = $auth->index();

        $email = empty($_POST['email']) ? '' : $_POST['email'];
        $pass = empty($_POST['pass']) ? '' : $_POST['pass'];
        $pass2 = empty($_POST['pass2']) ? '' : $_POST['pass2'];

        if($email != '' && $pass != '' && $pass2 != ''){
            $data = self::$auth->register($email, $pass, $pass2);
            $this->template->vars('message', $data["message"]);
        }
        else if ($email = '') {
            $this->template->vars('message', "Not all fields are filled!");
        }
        else {
            $this->template->vars('message', "");
        }

        $this->template->vars('authentication', $authentication["auth"]);
        $this->template->vars('email', $filter->doXssClean($email));
        $this->template->view('regist');
    }


    function login() {
        session_start();
        $filter = new Filter();
        $auth = new Authentication();
        $authentication = $auth->index();

        $error = empty($_GET['error']) ? '' : $_GET['error'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        $pass = empty($_POST['pass']) ? '' : $_POST['pass'];

        if($email != '' && $pass != ''){
            $data = self::$auth->login($email, $pass);

            if($data["error"] != 1) {
                $_SESSION["email"] = $email;
            }

            $this->template->vars('message', $data["message"]);
        }
        else if ($email = '') {
            $this->template->vars('message', "Not all fields are filled!");
        }
        else {
            $this->template->vars('message', "");
        }

        $this->template->vars('authentication', $authentication["auth"]);
        $this->template->vars('error', $filter->doXssClean($error));
        $this->template->vars('email', $filter->doXssClean($email));
        $this->template->view('login');
    }

    function info() {
        $auth = new Authentication();
        $authentication = $auth->index();

        if($authentication["auth"] === true) {
            $this->template->vars('text', "Текст видный после авторизации!");
        }

        $this->template->vars('authentication', $authentication["auth"]);
        $this->template->view('info');
    }

    function out() {
        $auth = new Authentication();
        $authentication = $auth->out();

        $this->template->vars('authentication', $authentication);
        $this->template->view('out');
    }

}
