<?php



// контролер
Class Controller_User Extends Controller_Base {
    // шаблон
    public $layouts = "first_layouts";



    // экшен
    function index() {
        $this->assertFalse(self::$auth->register('te22st@email.com', 'TecwV37-P@$$', 'TecwV37-P@$$')['error']);

        $info = "ИВАН";

        $this->template->vars('info', $info);
        $this->template->view('index');
    }
}
