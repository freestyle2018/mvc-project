<?php



// контролер
Class Controller_Auth Extends Controller_Base {
    // шаблон
    public $layouts = "auth";

    // экшен
    function index()
    {
        $auth = new Authentication();
        $authentication = $auth->index();

        $auth = ($authentication["auth"] === true) ? '1' : '0';
        $status = $authentication["status"];


        $this->template->vars('auth', $auth);
        $this->template->vars('status', $status);
        $this->template->view('index');
    }

}
