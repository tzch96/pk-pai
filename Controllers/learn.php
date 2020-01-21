<?php

class Learn extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('learn/index');
    }
}

?>