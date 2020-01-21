<?php

class AppError extends AppController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->msg = 'We couldn\'t find the page you were looking for.';
        $this->view->render('error/index');
    }
}

?>