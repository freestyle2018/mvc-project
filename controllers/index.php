<?php

// контролер
Class Controller_Index Extends Controller_Base {
    // шаблон
    public $layouts = "first_layouts";

    // экшен
    function index() {
        // номер страницы
        $page = (empty($_GET['page'])) ? '1' : $_GET['page'];

        $sort = new Sort();
        $sortirovka = $sort->get();

        $news = new Model_News();
        $NewsList = $news->getNewsLimit($page, $sortirovka[2]);
        $total = $news->getCountNews();
        $pagination = new Pagination($total, $page, $news::SHOW_BY_DEFAULT, '');

        $this->template->vars('sortirovka', $sortirovka);
        $this->template->vars('NewsList', $NewsList);
        $this->template->vars('total', $total);
        $this->template->vars('pagination', $pagination->get($sortirovka));
        $this->template->view('index');
    }
}