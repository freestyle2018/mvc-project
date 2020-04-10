<?php

// контролер
Class Controller_Index Extends Controller_Base {
    // шаблон
    public $layouts = "first_layouts";

    // экшен
    function index() {

        $filter = new Filter();
        $auth = new Authentication();
        $authentication = $auth->index();

        // номер страницы и сортировка
        $page = $filter->out('int',(empty($_GET['page']) ? '1' : $_GET['page']));
        $sort_get = $filter->out('string',(empty($_GET['sort']) ? '' : $_GET['sort']));

        $sort = new Sort();
        $sortirovka = $sort->get($sort_get);

        $news = new Model_News();
        $NewsList = $filter->doXssClean($news->getNewsLimit($page, $sortirovka[2]));

        $total = $news->getCountNews();
        $pagination = new Pagination($total, $page, $news::SHOW_BY_DEFAULT, '');

        $this->template->vars('authentication', $authentication);
        $this->template->vars('page', $page);
        $this->template->vars('sortirovka', $sortirovka);
        $this->template->vars('NewsList', $NewsList);
        $this->template->vars('total', $total);
        $this->template->vars('pagination', $pagination->get($sortirovka));
        $this->template->view('index');
    }
}