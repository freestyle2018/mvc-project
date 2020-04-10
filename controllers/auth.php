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

        $text = ($authentication === true) ? '1' : '0';

        $this->template->vars('text', $text);
        $this->template->view('index');
    }

}
