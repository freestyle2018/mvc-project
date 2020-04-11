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
        $filter = new Filter();
        $authentication = $auth->index();
        $model = new Model_Users();

        if($authentication["auth"] === true) {
            $users = $model->get_Users();
            $this->template->vars('Users', $filter->doXssClean($users));

            $this->template->vars('text', "Текст видный после авторизации!");
        }

        $this->template->vars('authentication', $authentication["auth"]);
        $this->template->vars('status', $authentication["status"]);

        $this->template->view('info');
    }

    function add() {
        $auth = new Authentication();
        $filter = new Filter();
        $model = new Model_Users();

        $name = $filter->out('string',(empty($_POST['name']) ? '' : $_POST['name']));
        $email = $filter->out('email',(empty($_POST['email']) ? '' : $_POST['email']));
        $category = $filter->out('string',(empty($_POST['category']) ? '' : $_POST['category']));

        $authentication = $auth->index();

        if($name != "" && $email != "" && $category != ""){
            if($authentication["auth"] === true) {
                $proverka = $model->add_Users($name, $email, $category);

                if($proverka === true){
                    $this->info();
                }
            }
        }
        else{
            $this->template->vars('error', "Not all fields are filled!");
        }

        $this->template->vars('name', $filter->doXssClean($name));
        $this->template->vars('email', $filter->doXssClean($email));
        $this->template->vars('category', $filter->doXssClean($category));

        if(!isset($proverka)){
            $this->template->vars('authentication', $authentication["auth"]);
            $this->template->view('add');
        }

    }

    function delete() {
        $auth = new Authentication();
        $filter = new Filter();
        $model = new Model_Users();

        $authentication = $auth->index();

        $user_id = $filter->out('int',(empty($_GET['user_id']) ? '' : $_GET['user_id']));

        if($authentication["auth"] === true && $authentication["status"] === "admin") {
            $model->delete_Users($user_id);
        }

        $this->info();
    }

    function out() {
        $auth = new Authentication();
        $authentication = $auth->out();

        $this->template->vars('authentication', $authentication);
        $this->template->view('out');
    }

}
