<?php

// контролер
Class Controller_Add Extends Controller_Base {
    // шаблон
    public $layouts = "first_layouts";

    // экшен
    function index() {
        $model = new Model_Users();

        $zadachiInfo = $model->get_Zadachi();

        $this->template->vars('Zadachi', $zadachiInfo);

        $this->template->view('index');
    }
}
